<div id="page-content" class="page-wrapper clearfix">
    <?php
    if (count($dashboards) && !get_setting("disable_dashboard_customization_by_clients")) {
        echo view("dashboards/dashboard_header");
    }

    echo announcements_alert_widget();

    app_hooks()->do_action('app_hook_dashboard_announcement_extension');
    ?>
    <div class="">
        <?php echo view("patrons/info_widgets/index"); ?>
    </div>

    <?php if ($show_project_info) { ?>
        <div class="">
            <?php echo view("patrons/projects/index"); ?>
        </div>
    <?php } ?>

</div>