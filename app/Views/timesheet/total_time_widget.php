<div class="box <?php echo ($show_projects_count && ($show_total_hours_worked || $show_total_project_hours)) ? 'border-top' : ''; ?>">

    <?php if ($show_total_hours_worked) { ?>
        <div class="box-content <?php echo $show_total_project_hours ? 'border-end' : ''; ?>">
            <div class="card-body ">
                <h3 class="open-time-heading a" ><?php echo $total_hours_worked; ?></h3>
                <span class="profile-name fw-bold "><?php echo app_lang("total_hours_worked"); ?></span>
            </div>
        </div>
    <?php } ?>

    <?php if ($show_total_project_hours) { ?>
        <div class="box-content">
            <div class="card-body ">
                <h3 class="open-time-heading a"><?php echo $total_project_hours; ?></h3>
                <span class="profile-name fw-bold "><?php echo app_lang("total_project_hours"); ?></span>
            </div>
        </div>
    <?php } ?>

</div>