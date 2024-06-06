<div class="card bg-white dashboard-card-restructure">
    <div class="card-header">
        <!-- <i data-feather="grid" class="icon-16"></i> --> &nbsp;<?php echo app_lang("reminder"); ?>
    </div>
    <div class="row pb10 pt10">
        <div class="col-md-7 col-7 col-sm-12">
            <div class="pt30" style="padding: 20px 0px 30px;">
                <div class="b-r">
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <button class="btn remainder-icon-restructure"><?= date('d'); ?></button>
                        </div>
                        <div class="col-md-8 col-8">
                            <h3 class="mt-0 mb-1 strong text-center"><?php echo $reminders_of_today; ?></h3>
                            <div class="text-truncate text-center"><?php echo (($reminders_of_today > 1) ? app_lang("reminders") : app_lang("reminder")) . " " . app_lang("today"); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-5 col-sm-12">
            <div class="pl0 mt5 p30 event-remainder-restructure">
                <div class="mt-0 mb-1 text-truncate text-center"><!-- <i data-feather='bell' class='icon text-danger'></i>  --><span class="ml5 strong"><?php echo app_lang("next_reminder"); ?></span></div>
                <div class="text-truncate text-center next-event-restructure">
                    <?php
                    if ($next_reminder) {

                        $today = get_today_date();
                        $tomorrow = get_tomorrow_date();

                        if ($next_reminder->start_date === $today) {
                            echo format_to_time($next_reminder->start_date . " " . $next_reminder->start_time, false); //If reminder is today, then show only time.
                        } else if ($next_reminder->start_date === $tomorrow) {
                            echo app_lang("tomorrow"); //If reminder is tomorrow, show only tomorrow.
                        } else {
                            echo format_to_date($next_reminder->start_date, false); //Otherwise, show the date only.
                        }
                        echo "<br>";
                        //show reminder
                        $context_info = get_reminder_context_info($next_reminder);
                        $context_url = get_array_value($context_info, "context_url");
                        echo " <span title='" . $next_reminder->title . "'>" . ($context_url ? anchor($context_url, $next_reminder->title) : link_it($next_reminder->title)) . "</span>";
                    } else {
                        echo "<span class='text-off'>" . app_lang("no") . " " . strtolower(app_lang("reminder")) . "</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>