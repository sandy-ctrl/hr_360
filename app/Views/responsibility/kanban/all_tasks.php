<div id="page-content" class="page-wrapper pb0 clearfix grid-button all-tasks-kanban-view">

    <ul id="kanban-task-tab" class="nav nav-tabs bg-white title nav-tabs-restructure" role="tablist"> <!--nav-tabs-restructure by harshal 7 june -->
        <li class="title-tab all-tasks-kanban"><h4 class="pl15 pt10 pr15"><?php echo app_lang("tasks"); ?></h4></li>

        <?php echo view("responsibility/tabs", array("active_tab" => "tasks_kanban", "selected_tab" => "")); ?>       

        <div class="tab-title clearfix no-border">
            <div class="title-button-group">
                <?php
                if ($login_user->user_type == "staff") {
                    echo modal_anchor("", "<i data-feather='edit-2' class='icon-16'></i> " . app_lang('batch_update'), array("class" => "btn btn-default text-white hide batch-update-btn", "title" => app_lang('batch_update')));
                    echo js_anchor("<i data-feather='x' class='icon-16'></i> " . app_lang("cancel_selection"), array("class" => "hide btn btn-default batch-cancel-btn"));
                }
                if ($can_create_tasks) {
                    echo modal_anchor(get_uri("responsibility/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_multiple_tasks'), array("class" => "btn btn-default", "title" => app_lang('add_multiple_tasks'), "data-post-add_type" => "multiple"));
                    echo modal_anchor(get_uri("responsibility/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_task'), array("class" => "btn btn-default", "title" => app_lang('add_task')));
                }
                ?>
            </div>
        </div>
    </ul>
    <div class="bg-white" id="js-kanban-filter-container">
       <div id="kanban-filters"></div>
    </div>

    <div id="load-kanban"></div>
</div>

<script>
    $(document).ready(function () {
        window.scrollToKanbanContent = true;
    });
</script>

<?php echo view("responsibility/batch_update/batch_update_script"); ?>
<?php echo view("responsibility/kanban/all_tasks_kanban_helper_js"); ?>
<?php echo view("responsibility/quick_filters_helper_js"); ?>