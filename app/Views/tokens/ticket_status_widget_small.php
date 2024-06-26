<?php
$card = "";
$link = "";
if ($status == "new") {
    $card = "orange";
    $link = get_uri("tokens/index/open");
} else if ($status == "open") {
    $card = "coral";
    $link = get_uri("tokens/index/open");
} else if ($status == "closed") {
    $card = "success";
    $link = get_uri("tokens/index/closed");
}
?>

<a href="<?php echo $link; ?>" class="white-link">
    <div class="card dashboard-icon-widget">
        <div class="card-body">
            <div class="widget-icon bg-<?php echo $card; ?>">
                <i data-feather="life-buoy" class="icon"></i>
            </div>
            <div class="widget-details">
                <h1><?php echo $total_tickets; ?></h1>
                <span class="bg-transparent-white"><?php echo app_lang($status . "_tickets"); ?></span>
            </div>
        </div>
    </div>
</a>