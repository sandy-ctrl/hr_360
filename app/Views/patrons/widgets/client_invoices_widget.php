<?php
$card = "";
$widget_title = "";
$link = "";
if ($widget_type == "has_unpaid_invoices") {
    $card = "bg-orange";
    $widget_title = app_lang("clients_has_unpaid_invoices");
    $link = "has_unpaid_invoices";
} else if ($widget_type == "has_partially_paid_invoices") {
    $card = "bg-orange";
    $widget_title = app_lang("clients_has_partially_paid_invoices");
    $link = "has_partially_paid_invoices";
} else if ($widget_type == "has_overdue_invoices") {
    $card = "bg-orange";
    $widget_title = app_lang("clients_has_overdue_invoices");
    $link = "has_overdue_invoices";
}

$progress = 0;
if ($total_clients) {
    $progress = round($total / $total_clients * 100);
}
?>

<a class="client-widget-link " data-filter="<?php echo $link; ?>" href="<?php echo get_uri("patrons/index/clients_list#$link"); ?>">
    <div class="card bg-white dashboard-card-restructure" >
        <div class="card-header text-default">           
            <strong><?php echo $widget_title; ?></strong>
        </div>
        <div class="card-body ">
            <div class="clearfix" >
                <span class="text-off float-start mt-3 text-default"><?php echo $progress . "% " . app_lang("of_total_clients"); ?></span>
                <h1 class="float-end text-danger m0-restructure"><?php echo $total; ?></h1>
            </div>
            <div class="progress mt5" style="height: 6px;"  title='<?php echo $progress; ?>%'>
                <div class="progress-bar <?php echo $card; ?>" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</a>