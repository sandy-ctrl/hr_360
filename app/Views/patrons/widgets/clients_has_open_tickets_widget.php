<?php
$progress = 0;
if ($total_clients) {
    $progress = round($clients_has_open_tickets / $total_clients * 100);
}
?>

<a class="client-widget-link" data-filter="has_open_tickets" href="<?php echo get_uri("patrons/index/clients_list#has_open_tickets"); ?>">
    <div class="card bg-white dashboard-card-restructure">
        <div class="card-header text-default">
            <strong><?php echo app_lang("clients_has_open_tickets"); ?></strong>
        </div>
        <div class="card-body p20 p20-reconstructed" >
      
            <div class="clearfix " >
                <span class="text-off float-start mt-3 text-default"><?php echo $progress . "% " . app_lang("of_total_clients"); ?></span>
                <h1 class="float-end m0 text-danger m0-restructure"><?php echo $clients_has_open_tickets; ?></h1>
            </div>
            <div class="progress mt5" style="height: 6px;"  title='<?php echo $progress; ?>%'>
                <div class="progress-bar bg-orange" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</a>