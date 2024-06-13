<div class="tab-content">
    <?php echo form_open(get_uri("unit_members/save_job_info/"), array("id" => "job-info-form", "class" => "general-form dashed-row white", "role" => "form")); ?>

    <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
    <div class="card">
        <div class=" card-header">
            <h4><?php echo app_lang('job_info'); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="job_title" class="control-label"><?php echo app_lang('job_title'); ?></label>
                            <?php
                            echo form_input(array(
                                "id" => "job_title",
                                "name" => "job_title",
                                "value" => $job_info->job_title,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('job_title')
                            ));
                            ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="salary" class="control-label"><?php echo app_lang('salary'); ?></label>
                            <?php
                            echo form_input(array(
                                "id" => "salary",
                                "name" => "salary",
                                "value" => $job_info->salary ? to_decimal_format($job_info->salary) : "",
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('salary')
                            ));
                            ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="salary_term" class="control-label"><?php echo app_lang('salary_term'); ?></label>
                            <?php
                            echo form_input(array(
                                "id" => "salary_term",
                                "name" => "salary_term",
                                "value" => $job_info->salary_term,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('salary_term')
                            ));
                            ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date_of_hire" class="control-label"><?php echo app_lang('date_of_hire'); ?></label>
                            <?php
                            echo form_input(array(
                                "id" => "date_of_hire",
                                "name" => "date_of_hire",
                                "value" => $job_info->date_of_hire,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('date_of_hire'),
                                "autocomplete" => "off"
                            ));
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($login_user->is_admin || $can_manage_team_members_job_information) { ?>
            <div class="card-footer rounded-0">
                <button type="submit" class="btn btn-primary btn-sales-action float-end"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
            </div>
        <?php } ?>

    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#job-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, {duration: 10000});
                window.location.href = "<?php echo get_uri("unit_members/view/" . $user_id); ?>" + "/job_info";
            }
        });
        $("#job-info-form .select2").select2();

        setDatePicker("#date_of_hire");

    });
</script>    