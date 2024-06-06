<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed  clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer" >
            <?php
            $tab_view['active_tab'] = "cron_job";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent" >

            <div class="card">
                <div class="card-header">
                    <h4><?php echo app_lang("cron_job"); ?></h4>
                </div>
                <div class="card-body general-form dashed-row">
                    <div class="form-group clearfix">
                        <div class="row">
                            <label for="cron_job_link" class=" col-md-2"><?php echo app_lang('cron_job_link'); ?></label>
                            <div class=" col-md-10">
                                <?php
                                echo get_uri("cron");
                                ?>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group clearfix">
                        <div class="row">
                            <label for="last_cron_job_run" class=" col-md-2"><?php echo app_lang('last_cron_job_run'); ?></label>
                            <div class=" col-md-10">
                                <?php
                                $status_class = "bg-dark";
                                $last_cron_job_time = get_setting('last_cron_job_time');
                                if ($last_cron_job_time) {
                                    $text = format_to_datetime(date('Y-m-d H:i:s', $last_cron_job_time));

                                    //show success color if last execution time is less then 60 min
                                    if (round(abs($last_cron_job_time - strtotime(get_current_utc_time())) / 60) <= 60) {
                                        $status_class = "bg-success";
                                    }
                                } else {
                                    $text = app_lang('never');
                                    $status_class = "bg-danger";
                                }

                                echo "<span class='badge $status_class large'>" . $text . "</span>";
                                ?>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group clearfix">
                        <div class="row">
                            <label for="recommended_execution_intervals" class=" col-md-2"><?php echo app_lang('recommended_execution_interval'); ?></label>
                            <div class=" col-md-10">
                                Every 10 minutes
                            </div>
                        </div>
                    </div> 
                    <div class="form-group clearfix">
                        <div class="row">
                            <label  class=" col-md-2">cPanel Cron Job Command *</label>
                            <div class=" col-md-10">
                                <div>
                                    <?php echo "<pre>wget -q -O- " . get_uri("cron") . "</pre>"; ?>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>

        </div>
    </div>
</div>

<script>
      // 5 june harshal
      document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menuButton');
        var menuContainer = document.getElementById('menuContainer');
        var mainContent = document.getElementById('mainContent');

        menuButton.addEventListener('click', function() {
            if (menuContainer.style.display === 'none' || menuContainer.style.display === '') {
                menuContainer.style.display = 'block';
                mainContent.classList.add('reduced-width');
            } else {
                menuContainer.style.display = 'none';
                mainContent.classList.remove('reduced-width');
            }
            const iconHTML = menuButton.innerHTML;
            const newIcon = iconHTML.includes('chevron-right') ? 'chevron-left' : 'chevron-right';
            menuButton.innerHTML = `<i data-feather="${newIcon}" class="border border-dark setting-arrow mr5"></i>`;
            feather.replace();
        });
    });
</script>
