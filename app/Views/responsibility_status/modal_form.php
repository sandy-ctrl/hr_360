<?php echo form_open(get_uri("responsibility_status/save"), array("id" => "task-status-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="container-fluid">
        <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />

        <?php if ($model_info->key_name) { ?>

            <div class="form-group">
                <div class=" col-md-12 text-center">
                    <?php echo view("includes/color_plate"); ?>
                </div>
            </div>

        <?php } else { ?>

            <div class="form-group">
                <div class="row">
                    <label for="title" class=" col-md-3"><?php echo app_lang('title'); ?></label>
                    <div class=" col-md-9">
                        <?php
                        echo form_input(array(
                            "id" => "title",
                            "name" => "title",
                            "value" => $model_info->title,
                            "class" => "form-control",
                            "placeholder" => app_lang('title'),
                            "autofocus" => true,
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                        <div class="mt15">
                            <?php echo view("includes/color_plate"); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="form-group">
            <div class="row">
                <label for="hide_from_kanban" class=" col-md-3"><?php echo app_lang('hide_from_kanban_view'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_checkbox(
                            "hide_from_kanban", "1", $model_info->hide_from_kanban ? true : false, "id='hide_from_kanban' class='form-check-input'"
                    );
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="hide_from_non_project_related_tasks" class=" col-md-3"><?php echo app_lang('hide_from_non_project_related_tasks'); ?></label>
                <div class="col-md-9">
                    <?php
                    echo form_checkbox(
                            "hide_from_non_project_related_tasks", "1", $model_info->hide_from_non_project_related_tasks ? true : false, "id='hide_from_non_project_related_tasks' class='form-check-input'"
                    );
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>

<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#task-status-form").appForm({
            onSuccess: function (result) {
                $("#task-status-table").appTable({newData: result.data, dataId: result.id});
            }
        });
        setTimeout(function () {
            $("#title").focus();
        }, 200);

    });
</script>    