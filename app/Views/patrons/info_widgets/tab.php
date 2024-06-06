<?php
$card = "";
$icon = "";
$value = "";
$link = "";

$view_type = "client_dashboard";
if ($login_user->user_type == "staff") {
    $view_type = "";
}

if (!is_object($client_info)) {
    $client_info = new stdClass();
    $client_info->id = 0;
    $client_info->total_projects = 0;
    $client_info->invoice_value = 0;
    $client_info->currency_symbol = "$";
    $client_info->payment_received = 0;
}


if ($tab == "projects") {
    $card = "dashboard-clock-card";
    $card_icon = "icon-clock-restructure";
    $icon = "grid";
    if (property_exists($client_info, "total_projects")) {
        $value = to_decimal_format($client_info->total_projects);
    }
    if ($view_type == "client_dashboard") {
        $link = get_uri('enterprises/index');
    } else {
        $link = get_uri('patrons/view/' . $client_info->id . '/projects');
    }
} else if ($tab == "total_invoiced") {
    $card = "dashboard-task-widget-restructure";
    $card_icon = "icon-task-restructure";
    $icon = "file-text";
    if (property_exists($client_info, "invoice_value")) {
        $value = to_currency($client_info->invoice_value, $client_info->currency_symbol);
    }
    if ($view_type == "client_dashboard") {
        $link = get_uri('bills/index');
    } else {
        $link = get_uri('patrons/view/' . $client_info->id . '/invoices');
    }
} else if ($tab == "payments") {
    $card = "dashboard-event-widget-restructure";
    $card_icon = "icon-event-restructure";
    $icon = "check-square";
    if (property_exists($client_info, "payment_received")) {
        $value = to_currency($client_info->payment_received, $client_info->currency_symbol);
    }
    if ($view_type == "client_dashboard") {
        $link = get_uri('Bill_payments/index');
    } else {
        $link = get_uri('patrons/view/' . $client_info->id . '/payments');
    }
} else if ($tab == "due") {
    $card = "dashboard-due-widget-restructure";
    $card_icon = "icon-due-restructure";
    $icon = "compass";
    if (property_exists($client_info, "invoice_value")) {
        $value = to_currency(ignor_minor_value($client_info->invoice_value - $client_info->payment_received), $client_info->currency_symbol);
    }
    if ($view_type == "client_dashboard") {
        $link = get_uri('bills/index');
    } else {
        $link = get_uri('patrons/view/' . $client_info->id . '/invoices');
    }
}
?>

<a href="<?php echo $link; ?>" class="white-link">
    <div class="card dashboard-icon-widget">
        <div class="card-body <?= $card; ?>">
            <div class="mt5 bg-transparent-white"><?php echo app_lang($tab); ?></div>
            <div class="widget-icon">
                <i data-feather="<?php echo $icon; ?>" class="icon <?= $card_icon; ?>"></i>
            </div>
            <div class="widget-details">
                <h1><?php echo $value; ?></h1>
            </div>
        </div>
    </div>
</a>