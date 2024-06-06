<div id="js-clock-in-out" class="card dashboard-icon-widget clock-in-out-card">
    <div class="card-body dashboard-clock-card">
        <?php
            if (isset($clock_status->id)) {
                $in_time = format_to_time($clock_status->in_time);
                $in_datetime = format_to_datetime($clock_status->in_time);
                echo "<div class='mt5 bg-transparent-white bg-transparent-white-restructure' title='$in_datetime'>" . app_lang('clock_started_at') . " : $in_time</div>";
                
            } else {
                echo "<div class='mt5 bg-transparent-white bg-transparent-white-restructure'>" . app_lang('you_are_currently_clocked_out') . "</div>";
            }
        ?>
        <div class="widget-icon <?php echo (isset($clock_status->id)) ? '' : ''; ?>">
            <i data-feather="clock" class="icon icon-clock-restructure"></i>
        </div>
        <div class="widget-details">
            <?php
            if (isset($clock_status->id)) {
                echo modal_anchor(get_uri("timesheet/note_modal_form"), "<i data-feather='log-out' class='icon-16'></i> " . app_lang('clock_out'), array("class" => "btn btn-default clock-btn-default-restructure", "title" => app_lang('clock_out'), "id" => "timecard-clock-out", "data-post-id" => $clock_status->id, "data-post-clock_out" => 1));

                
            } else {
                echo ajax_anchor(get_uri("timesheet/log_time"), "<i data-feather='log-out' class='icon-16'></i> " . app_lang('clock_in'), array("class" => "btn btn-default spinning-btn clock-btn-default-restructure", "title" => app_lang('clock_in'), "data-inline-loader" => "1", "data-closest-target" => "#js-clock-in-out"));
            }
            ?>
        </div>
    </div>
</div>