<?php
$total_points = $projects_info->total_points;
$completed_points = $projects_info->completed_points;

$progress = $total_points ? round(($completed_points / $total_points) * 100) : 0;
?>
<div class="card bg-white dashboard-card-restructure">
    <div class="card-header">
        <!-- <i data-feather="grid" class="icon-16"></i> --> &nbsp;<?php echo app_lang("projects_overview"); ?>
    </div>
    <div class="rounded-bottom pt-2">
        <div class="box">
            <div class="box-content">
                <a href="<?php echo get_uri('enterprises/all_projects/1'); ?>" class="text-default">
                    <div class="pt-3 pb10" style="padding: 1rem 0px;">
                        <div class="">
                            <h4 class="strong mb-1 mt-0" style="color: #FE5F10;"><?php if($count_project_status->open > 1 && $count_project_status->open < 10 ) { echo "0"; } echo $count_project_status->open; ?></h4>
                            <span><?php echo $open_status_text; ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-content">
                <a href="<?php echo get_uri('enterprises/all_projects/3'); ?>" class="text-default">
                    <div class="pt-3 pb10 text-center">
                        <div>
                            <h4 class="strong mb-1 mt-0" style="color: #FE5F10;"><?php if($count_project_status->hold > 1 && $count_project_status->hold < 10 ) { echo "0"; } echo $count_project_status->hold; ?></h4>
                            <span><?php echo $hold_status_text; ?></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-content">
                <a href="<?php echo get_uri('enterprises/all_projects/2'); ?>" class="text-default">
                    <div class="pt-3 pb10 text-end" style="padding: 1rem 0px;">
                        <div class="">
                            <h4 class="strong mb-1 mt-0" style="color: #FE5F10;"><?php if($count_project_status->completed > 1 && $count_project_status->completed < 10 ) { echo "0"; } echo $count_project_status->completed; ?></h4>
                            <span><?php echo $completed_status_text; ?></span>
                        </div>
                    </div>
                </a>
            </div>            
        </div>

        <div class="container project-overview-widget project-overview-widget-restructures">
            <div class="">
                <div class="progress-graph">
                    <div class="progress-bar-graph" role="progressbar" style="width:<?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100">
                    </div>
                    <span class="progress-tooltip"><?php echo app_lang("progress"); ?> <?php echo $progress; ?>%</span>
                </div>
            </div>
        </div>
    </div>
</div>