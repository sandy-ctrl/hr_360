<a href="<?php echo get_uri('events'); ?>" class="white-link" >
    <div class="card dashboard-icon-widget">
        <div class="card-body dashboard-event-widget-restructure">
            <div class="mt5 bg-transparent-white"><?php echo app_lang("events_today"); ?></div>
            <div class="widget-icon">
                <i data-feather="calendar" class="icon icon-event-restructure"></i>
            </div>
            <div class="widget-details event-widget-details-restucture">
                <h1><?php if($total < 10){ echo "0"; } echo $total; ?></h1>
            </div>
        </div>
    </div>
</a>