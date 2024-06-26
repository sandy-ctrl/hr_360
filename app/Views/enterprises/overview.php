<div class="clearfix default-bg">

    <div class="row" style="background-color: #F5F5F5;">
        <div class="col-md-6">
            <div class="card project-activity-section dashboard-card-restructure">
                <div class="card-header">
                    <h4><?php echo app_lang('activity'); ?></h4>
                </div>
                <?php echo view("enterprises/history/index"); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                
                <div class="col-md-6 col-sm-12">
                    <?php echo view("enterprises/project_task_pie_chart"); ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?php echo view("enterprises/project_progress_chart_info"); ?>
                </div>

                <?php if ($can_add_remove_project_members) { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php echo view("enterprises/project_members/index"); ?>
                    </div>  
                <?php } ?>

                <?php if (get_setting('module_project_timesheet')) { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php echo view("enterprises/widgets/total_hours_worked_widget"); ?>
                    </div>
                <?php } ?>

                <div class="col-md-12 col-sm-12 project-custom-fields">
                    <?php echo view('enterprises/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                </div>

                <?php if ($project_info->estimate_id) { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php echo view("enterprises/estimates/index"); ?>
                    </div> 
                <?php } ?>

                <?php if ($project_info->order_id) { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php echo view("enterprises/orders/index"); ?>
                    </div>
                <?php } ?>

                <?php if ($can_access_clients && $project_info->project_type === "client_project") { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php echo view("enterprises/client_contacts/index"); ?>
                    </div>  
                <?php } ?>

                <div class="col-md-12 col-sm-12">
                    <?php echo view("enterprises/project_description"); ?>
                </div>

            </div>
        </div>        
    </div>
</div>