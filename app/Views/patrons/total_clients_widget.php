<a href="<?php echo get_uri("patrons/index/clients_list#all_clients"); ?>" class="white-link">
    <div class="card  dashboard-clock-card"  >
        <div class="card-body ">
        
        <div class="mt5 bg-transparent-white"><?php echo app_lang("total_clients"); ?></div>
            <div class="widget-icon bg-coral "  >
                <i style="color:#178adf" data-feather="briefcase" class="icon "></i>
                <!-- <i style="color:#178adf" class="fa-light fa-user-group"></i> -->
            </div>
            <div class="widget-details">
                <h1 style="color:#178adf" ><?php echo $total; ?></h1>
            </div>
        </div>
    </div>
</a>