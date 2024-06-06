<?php
$card = "";
$icon = "";
$value = "";
$lang = "";
$link = "";

if ($type == "invoices") {
    $lang = app_lang("total_invoiced");
    $card = "bg-primary";
    $icon = "file-text";
    $value = to_currency($invoices_info->invoices_total);
    $link = get_uri('bills/index');
} else if ($type == "payments") {
    $lang = app_lang("payments");
    $card = "bg-success";
    $icon = "check-square";
    $value = to_currency($invoices_info->payments_total);
    $link = get_uri('Bill_payments/index');
} else if ($type == "due") {
    $lang = app_lang("due");
    $card = "bg-coral";
    $icon = "compass";
    $dueAmt = ignor_minor_value($invoices_info->due);
    if ($dueAmt >= 100000) {
        $dueAmt = round($dueAmt / 100000); // Divide by 100,000 and append 'L'
        $dueLabel = "L";
    } elseif ($dueAmt >= 1000) {
        $dueAmt = round($dueAmt / 1000); // Divide by 1,000 and append 'K'
        $dueLabel = "K";
    } else {
        $dueAmt = $dueAmt; // If less than 1000, return as is
        $dueLabel = "";
    }
    $value = to_currency(ignor_minor_value($dueAmt)).$dueLabel;
    $link = get_uri('bills/index');
} else if ($type == "draft") {
    $lang = app_lang("draft_invoices_total");
    $card = "bg-orange";
    $icon = "file-text";
    $value = to_currency($invoices_info->draft_total);
    $link = get_uri('bills/index');
} else if ($type == "draft_count") {
    $lang = app_lang("draft_invoices");
    $card = "bg-orange";
    $icon = "file-text";
    $value = $invoices_info->draft_count;
    $link = get_uri('bills/index');
}
?>

<a href="<?php echo $link; ?>" class="white-link">
    <div class="card  dashboard-icon-widget">
        <div class="card-body dashboard-due-widget-restructure">
            <div class="mt5 bg-transparent-white"><?php echo $lang; ?></div>
            <div class="widget-icon <?php echo $card ?>">
                <i data-feather="<?php echo $icon; ?>" class="icon icon-due-restructure"></i>
            </div>
            <div class="widget-details due-widget-details-restucture">
                <h1><?php echo $value; ?></h1>
            </div>
        </div>
    </div>
</a>