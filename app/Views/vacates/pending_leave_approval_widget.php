<a href="<?php echo get_uri('vacates/index'); ?>" class="white-link">
    <div class="card dashboard-icon-widget">
        <div class="card-body">
            <div class="widget-icon bg-orange">
                <i data-feather="log-out" class="icon"></i>
            </div>
            <div class="widget-details">
                <h1><?php echo $total; ?></h1>
                <span class="bg-transparent-white"><?php echo app_lang("pending_leave_approval"); ?></span>
            </div>
        </div>
    </div>
</a>