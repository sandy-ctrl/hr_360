<?php
$progress_members_clocked_in = 0;
$progress_members_clocked_out = 0;

if ($total_team_members) {
    $progress_members_total_member = round($total_team_members / $total_team_members * 100);
    $progress_members_leave_member = round($on_leave_today / $total_team_members * 100);
    $progress_members_clocked_in = round($members_clocked_in / $total_team_members * 100);
    $progress_members_clocked_out = round($members_clocked_out / $total_team_members * 100);
}
?>
<div class="card bg-white dashboard-card-restructure">
    <div class="card-header">
        <!-- <i data-feather="users" class="icon-16"></i> --> &nbsp;<?php echo app_lang("team_members_overview"); ?>
    </div>
    <div class="rounded-bottom" style="padding-bottom: 0.5rem;">
        <div class="box box-restructured">
            <div class="row">
                <a href="<?php echo get_uri('unit_members/index'); ?>" class="text-default">
                    <div class="col-md-12 col-12 pt-0 pb-2">
                        <h4 class="" style="color: #7E7474;"><?php echo app_lang("team_members"); ?> 
                            <span class="mt-0 mb-1 strong float-end"><?php echo $total_team_members; ?></span>
                        </h4>                    
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="progress h7 w-100 m-auto mb-0" title='<?php echo $progress_members_total_member; ?>%'>
                            <div class="progress-bar bg-orange-restructured" role="progressbar" style="width: <?php echo $progress_members_total_member; ?>%;" aria-valuenow="<?php echo $progress_members_total_member; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="box box-restructured">
            <div class="row">
                <a href="<?php echo get_uri('vacates/index/all_applications'); ?>" class="text-default">
                    <div class="col-md-12 col-12 pt-0 pb-2">
                        <h4 class="" style="color: #7E7474;"><?php echo app_lang("on_leave_today"); ?> 
                            <span class="mt-0 mb-1 strong float-end"><?php echo $on_leave_today; ?></span>
                        </h4>                    
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="progress h7 w-100 m-auto mb-1" title='<?php echo $progress_members_leave_member; ?>%'>
                            <div class="progress-bar bg-orange-restructured" role="progressbar" style="width: <?php echo $progress_members_leave_member; ?>%;" aria-valuenow="<?php echo $progress_members_leave_member; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="box box-restructured">
            <div class="row">
                <a href="<?php echo get_uri('attendance/index/members_clocked_in'); ?>" class="text-default">
                    <div class="col-md-12 col-12 pt-0 pb-2">
                        <h4 class="" style="color: #7E7474;"><?php echo app_lang("members_clocked_in"); ?> 
                            <span class="mt-0 mb-1 strong float-end"><?php echo $members_clocked_in; ?></span>
                        </h4>                    
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="progress h7 w-100 m-auto mb-1" title='<?php echo $progress_members_clocked_in; ?>%'>
                            <div class="progress-bar bg-orange-restructured" role="progressbar" style="width: <?php echo $progress_members_clocked_in; ?>%;" aria-valuenow="<?php echo $progress_members_clocked_in; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="box box-restructured">
            <div class="row">
                <a href="<?php echo get_uri('attendance/index/clock_in_out'); ?>" class="text-default">
                    <div class="col-md-12 col-12 pt-0 pb-2">
                        <h4 class="" style="color:  #7E7474;"><?php echo app_lang("members_clocked_out"); ?> 
                            <span class="mt-0 mb-1 strong float-end"><?php echo $members_clocked_out; ?></span>
                        </h4>                    
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="progress h7 w-100 m-auto mb-1" title='<?php echo $progress_members_clocked_out; ?>%'>
                            <div class="progress-bar bg-orange-restructured" role="progressbar" style="width: <?php echo $progress_members_clocked_out; ?>%;" aria-valuenow="<?php echo $progress_members_clocked_out; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>