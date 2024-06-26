<?php

namespace App\Controllers;

use App\Libraries\Paypal;

//don't extend this controller from Pre_loader 
//because this will be called by Paypal 
//and login check is not required since we'll validate the data

class Paypal_redirect extends App_Controller {

    protected $Paypal_ipn_model;

    function __construct() {
        parent::__construct();
        $this->Paypal_ipn_model = model('App\Models\Paypal_ipn_model');
    }

    function index($payment_verification_code = "") {
        if (!$payment_verification_code) {
            show_404();
        }

        $paypal_ipn_info = $this->Paypal_ipn_model->get_one_payment_where($payment_verification_code);
        if (!$paypal_ipn_info) {
            show_404();
        }

        if (!count($_GET)) {
            show_404();
        }

        $paypal = new Paypal();
        $payment = $paypal->is_valid_ipn($_GET);
        if (!$payment) {
            show_404();
        }

        //so, the payment is valid
        //save the payment
        //set login user id = contact id for future processing
        $client_user = new \stdClass();
        $client_user->id = $paypal_ipn_info->contact_user_id;
        $client_user->user_type = "client";
        $payment_id = get_array_value($_GET, "paymentId");
        $invoice_id = $paypal_ipn_info->invoice_id;

        $invoice_payment_data = array(
            "invoice_id" => $invoice_id,
            "payment_date" => get_current_utc_time(),
            "payment_method_id" => $paypal_ipn_info->payment_method_id,
            "note" => "",
            "amount" => get_array_value($payment->transactions, 0)->amount->total,
            "transaction_id" => $payment_id,
            "created_at" => get_current_utc_time(),
            "created_by" => $client_user->id,
        );

        //check if already a payment done with this transaction
        $existing = $this->Bill_payments_model->get_one_where(array("transaction_id" => $payment_id));
        if ($existing->id) {
            show_404();
        }

        $invoice_payment_id = $this->Bill_payments_model->ci_save($invoice_payment_data);
        if (!$invoice_payment_id) {
            show_404();
        }

        //as receiving payment for the invoice, we'll remove the 'draft' status from the invoice 
        $this->Bills_model->update_invoice_status($invoice_id);

        log_notification("invoice_payment_confirmation", array("invoice_payment_id" => $invoice_payment_id, "invoice_id" => $invoice_id), "0");

        log_notification("invoice_online_payment_received", array("invoice_payment_id" => $invoice_payment_id, "invoice_id" => $invoice_id), $client_user->id);

        //delete the ipn data
        $this->Paypal_ipn_model->delete_permanently($paypal_ipn_info->id);

        $verification_code = $paypal_ipn_info->verification_code;
        if ($verification_code) {
            $redirect_to = "pay_invoice/index/$verification_code";
        } else {
            $redirect_to = "invoices/preview/$invoice_id";
        }

        $this->session->setFlashdata("success_message", app_lang("payment_success_message"));
        app_redirect($redirect_to);
    }

}

/* End of file Paypal_redirect.php */
/* Location: ./app/controllers/Paypal_redirect.php */