<a href="<?php echo get_uri('tasks/all_tasks#my_open_tasks'); ?>" class="white-link" >
    <div class="card dashboard-icon-widget">
        <div class="card-body dashboard-task-widget-restructure">
            <div class="mt5 bg-transparent-white"><?php echo app_lang("my_open_tasks"); ?></div>
            <div class="widget-icon">
                <i data-feather="list" class="icon icon-task-restructure"></i>
            </div>
            <div class="widget-details task-widget-details-restucture">
                <h1><?php if($total < 10){ echo "0"; } echo $total; ?></h1>
            </div>
        </div>
    </div>
</a>