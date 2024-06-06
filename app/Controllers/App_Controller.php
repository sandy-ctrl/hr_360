<?php

/*
 * This controller load all the related things to run this app.
 * Extend this controller to load prerequisites only.
 */

namespace App\Controllers;

use App\Libraries\Template;
use App\Libraries\Google;
use CodeIgniter\Controller;

class App_Controller extends Controller {

    protected $template;
    public $session;
    public $form_validation;
    public $parser;
    //creation of dynamic property is deprecated in php 8.2
    public $Settings_model;
    public $Users_model;
    public $Unit_model;
    public $Attendance_model;
    public $Vacate_types_model;
    public $Vacate_applications_model;
    public $Schedules_model;
    public $Notices_model;
    public $Memos_model;
    public $Patrons_model;
    public $Enterprises_model;
    public $Milestones_model;
    public $Responsibility_status_model;
    public $Responsibility_model;
    public $Project_comments_model;
    public $Activity_logs_model;
    public $Project_files_model;
    public $Notations_model;
    public $Project_members_model;
    public $Token_types_model;
    public $Tokens_model;
    public $Token_comments_model;
    public $Elements_model;
    public $Bills_model;
    public $Bill_items_model;
    public $Bill_payments_model;
    public $Payment_methods_model;
    public $Email_templates_model;
    public $Roles_model;
    public $Posts_model;
    public $Timesheets_model;
    public $Budgets_model;
    public $Budget_categories_model;
    public $Taxes_model;
    public $Social_links_model;
    public $Notification_settings_model;
    public $Notifications_model;
    public $Custom_fields_model;
    public $Evaluation_forms_model;
    public $Evaluation_requests_model;
    public $Custom_field_values_model;
    public $Evaluations_model;
    public $Evaluation_items_model;
    public $General_files_model;
    public $Todo_model;
    public $Client_groups_model;
    public $Dashboards_model;
    public $Lead_status_model;
    public $Lead_source_model;
    public $Arrangement_items_model;
    public $Arrangements_model;
    public $Arrangement_status_model;
    public $Labels_model;
    public $Verification_model;
    public $Item_categories_model;
    public $Contracts_model;
    public $Contract_items_model;
    public $Evaluation_comments_model;
    public $Proposals_model;
    public $Proposal_items_model;
    public $Checklist_template_model;
    public $Checklist_groups_model;
    public $Project_status_model;
    public $Membership_model;
    public $Subscription_items_model;
    public $Schedule_tracker_model;
    public $Proposal_comments_model;

    public function __construct() {
        //main template to make frame of this app
        $this->template = new Template();

        //load helpers
        helper(array('url', 'file', 'form', 'language', 'general', 'date_time', 'app_files', 'widget', 'activity_logs', 'currency', 'reports'));

        //models
        $models_array = $this->get_models_array();
        foreach ($models_array as $model) {
            $this->$model = model("App\Models\\" . $model);
        }

        $login_user_id = $this->Users_model->login_user_id();

        //assign settings from database
        $settings = $this->Settings_model->get_all_required_settings($login_user_id)->getResult();
        foreach ($settings as $setting) {
            config('Rise')->app_settings_array[$setting->setting_name] = $setting->setting_value;
        }

        $users = $this->Users_model->get_one($login_user_id);

        //assign language
        $language = isset($users->language) && $users->language ? $users->language : get_setting("language");
        service('request')->setLocale($language);

        $this->session = \Config\Services::session();
        $this->form_validation = \Config\Services::validation();
        $this->parser = \Config\Services::parser();

        $landing_page = get_setting("landing_page");
        $request = request();
        if ($landing_page && $request->getUri() == base_url()) {
            app_redirect($landing_page);
        }
    }

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        parent::initController($request, $response, $logger); //don't edit this line
    }

    private function get_models_array() {
        return array(
            'Settings_model',
            'Users_model',
            'Unit_model',
            'Attendance_model',
            'Vacate_types_model',
            'Vacate_applications_model',
            'Schedules_model',
            'Notices_model',
            'Memos_model',
            'Patrons_model',
            'Enterprises_model',
            'Milestones_model',
            'Responsibility_status_model',
            'Responsibility_model',
            'Project_comments_model',
            'Activity_logs_model',
            'Project_files_model',
            'Notations_model',
            'Project_members_model',
            'Token_types_model',
            'Tokens_model',
            'Token_comments_model',
            'Elements_model',
            'Bills_model',
            'Bill_items_model',
            'Bill_payments_model',
            'Payment_methods_model',
            'Email_templates_model',
            'Roles_model',
            'Posts_model',
            'Timesheets_model',
            'Budgets_model',
            'Budget_categories_model',
            'Taxes_model',
            'Social_links_model',
            'Notification_settings_model',
            'Notifications_model',
            'Custom_fields_model',
            'Evaluation_forms_model',
            'Evaluation_requests_model',
            'Custom_field_values_model',
            'Evaluations_model',
            'Evaluation_items_model',
            'General_files_model',
            'Todo_model',
            'Client_groups_model',
            'Dashboards_model',
            'Lead_status_model',
            'Lead_source_model',
            'Arrangement_items_model',
            'Arrangements_model',
            'Arrangement_status_model',
            'Labels_model',
            'Verification_model',
            'Item_categories_model',
            'Contracts_model',
            'Contract_items_model',
            'Evaluation_comments_model',
            'Proposals_model',
            'Proposal_items_model',
            'Checklist_template_model',
            'Checklist_groups_model',
            'Project_status_model',
            'Membership_model',
            'Subscription_items_model',
            'Proposal_comments_model',
            'Schedule_tracker_model'
        );
    }

    //validate submitted data
    protected function validate_submitted_data($fields = array(), $return_errors = false) {
        $final_fields = array();

        foreach ($fields as $field => $validate) {
            //we've to add permit_empty rule if the field is not required
            if (strpos($validate, 'required') !== false) {
                //this is required field
            } else {
                //so, this field isn't required, add permit_empty rule
                $validate .= "|permit_empty";
            }

            $final_fields[$field] = $validate;
        }

        if (!$final_fields) {
            //no fields to validate in this context, so nothing to validate
            return true;
        }

        $validate = $this->validate($final_fields);

        if (!$validate) {
            if (ENVIRONMENT === 'production') {
                $message = app_lang('something_went_wrong');
            } else {
                $validation = \Config\Services::validation();
                $message = $validation->getErrors();
            }

            if ($return_errors) {
                return $message;
            }

            echo json_encode(array("success" => false, 'message' => json_encode($message)));
            exit();
        }
    }

    /**
     * download files. If there is one file then don't archive the file otherwise archive the files.
     * 
     * @param string $directory_path
     * @param string $serialized_file_data 
     * @return download files
     */
    protected function download_app_files($directory_path, $serialized_file_data) {
        $file_exists = false;
        if ($serialized_file_data) {
            require_once(APPPATH . "ThirdParty/nelexa-php-zip/vendor/autoload.php");
            $zip = new \PhpZip\ZipFile();

            $files = unserialize($serialized_file_data);
            $total_files = count($files);

            //for only one file we'll download the file without archiving
            if ($total_files === 1) {
                helper('download');
            }

            $file_path = getcwd() . '/' . $directory_path;

            foreach ($files as $file) {
                $file_name = get_array_value($file, 'file_name');
                $output_filename = remove_file_prefix($file_name);
                $file_id = get_array_value($file, "file_id");
                $service_type = get_array_value($file, "service_type");

                if ($service_type) {
                    $file_data = "";

                    if ($service_type == "google") {
                        //google drive file
                        $google = new Google();
                        $file_data = $google->download_file($file_id);
                    } else if (defined('PLUGIN_CUSTOM_STORAGE')) {
                        try {
                            $file_data = app_hooks()->apply_filters('app_filter_get_file_content', array(
                                "file_info" => $file,
                                "output_filename" => $output_filename,
                            ));
                        } catch (\Exception $ex) {
                            log_message('error', '[ERROR] {exception}', ['exception' => $ex]);
                        }
                    }

                    if (!$file_data) {
                        continue;
                    }

                    //if there exists only one file then don't archive the file otherwise archive the file
                    if ($total_files === 1) {
                        return $this->response->download($output_filename, $file_data);
                    } else {
                        $zip->addFromString($output_filename, $file_data);
                        $file_exists = true;
                    }
                } else {
                    $path = $file_path . $file_name;
                    if (file_exists($path)) {

                        //if there exists only one file then don't archive the file otherwise archive the file
                        if ($total_files === 1) {
                            return $this->response->download($path, NULL)->setFileName($output_filename);
                        } else {

                            $zip->addFile($path, $output_filename);
                            $file_exists = true;
                        }
                    }
                }
            }
        }

        if ($file_exists) {
            $zip->outputAsAttachment(app_lang('download_zip_name') . '.zip');
            $zip->close();
        } else {
            die(app_lang("no_such_file_or_directory_found"));
        }
    }

    //get currency dropdown list
    protected function _get_currency_dropdown_select2_data() {
        $currency = array(array("id" => "", "text" => "-"));
        foreach (get_international_currency_code_dropdown() as $value) {
            $currency[] = array("id" => $value, "text" => $value);
        }
        return $currency;
    }

}
