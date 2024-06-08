<?php
$card = "";
$widget_title = "";
$link = "";
$filter = "";
if ($widget_type == "logged_in_today") {
    $card = "bg-primary";
    $widget_title = app_lang("contacts_logged_in_today");
    $link = "contacts_logged_in_today";
    $filter = "logged_in_today";
    $style = "background: #FFE7DB; !important"; 
    $count_color = "color:#EC591B";
    $icon_color = "color:#EC591B";
} else if ($widget_type == "logged_in_seven_days") {
    $card = "bg-info";
    $widget_title = app_lang("contacts_logged_in_last_seven_days");
    $link = "contacts_logged_in_last_seven_days";
    $filter = "logged_in_seven_days";
    $style = "background: #C9E4DE  !important";
    $count_color = "color:#308370";
    $icon_color = "color:#308370";
}
?>
            <!-- <i data-feather="check-circle" class="icon-18 me-2"></i> -->
<a class="contact-widget-link" data-filter="<?php echo $filter; ?>" href="<?php echo get_uri("patrons/index/clients_list#$filter"); ?>">
    <div class="card dashboard-task-widget-restructure">
        <div class="card-body" style="<?php echo $style ?>">
        <div class="mt5 bg-transparent-white"><?php echo $widget_title; ?></div>
            <div class="widget-icon " style="padding-left: 0px;">
                <i style="<?php echo $icon_color?>" data-feather="check-circle" class="icon"></i>
            </div>
            <div class="widget-details">
                <h1 style="<?php echo $count_color ?>" ><?php echo $contacts_count; ?></h1>
             
            </div>
        </div>
    </div>
</a>