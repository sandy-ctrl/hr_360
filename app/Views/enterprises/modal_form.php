<?php echo form_open(get_uri("enterprises/save"), array("id" => "project-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <div class="container-fluid">
        <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
        <input type="hidden" name="estimate_id" value="<?php echo $model_info->estimate_id; ?>" />
        <input type="hidden" name="order_id" value="<?php echo $model_info->order_id; ?>" />
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title" class="control-label"><?php echo app_lang('title'); ?></label>
                    <div class="col-md-12">
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
                    </div>
                </div>
            </div>

        <?php if ($client_id || $login_user->user_type == "client") { ?>
            <input type="hidden" name="project_type" value="client_project" />
        <?php } else { ?>
            <div class="col-sm-6">    
                <div class="form-group">
                    <label for="project_type" class="control-label"><?php echo app_lang('project_type'); ?></label>
                    <div class=" col-md-12">
                        <?php
                        //hide client project from type dropdown if user has no access to client
                        if (!$model_info->id && $hide_clients_dropdown) {
                            echo form_dropdown("project_type", array(
                                "internal_project" => app_lang("internal_project"),
                            ), array($model_info->project_type ? $model_info->project_type : "internal_project"), "class='select2 validate-hidden' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "' id='project-type-dropdown'");
                        } else {
                            echo form_dropdown("project_type", array(
                                "client_project" => app_lang("client_project"),
                                "internal_project" => app_lang("internal_project"),
                            ), array($model_info->project_type ? $model_info->project_type : "client_project"), "class='select2 validate-hidden' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "' id='project-type-dropdown'");
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($client_id) { ?>
            <input type="hidden" name="client_id" value="<?php echo $client_id; ?>" />
        <?php } else if ($login_user->user_type == "client" || $hide_clients_dropdown) { ?>
            <input type="hidden" name="client_id" value="<?php echo $model_info->client_id; ?>" />
        <?php } else { ?>
        <div class="col-sm-6">
            <div class="form-group <?php echo $model_info->project_type === "internal_project" ? 'hide' : ''; ?>" id="clients-dropdown">
                <label for="client_id" class="control-label"><?php echo app_lang('client'); ?></label>
                <div class=" col-md-12">
                    <?php
                    echo form_dropdown("client_id", $clients_dropdown, array($model_info->client_id), "class='select2 validate-hidden' data-rule-required='true', data-msg-required='" . app_lang('field_required') . "'");
                    ?>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="description" class="control-label"><?php echo app_lang('description'); ?></label>
                <div class=" col-md-12">
                    <?php
                    echo form_textarea(array(
                        "id" => "description",
                        "name" => "description",
                        "value" => process_images_from_content($model_info->description, false),
                        "class" => "form-control",
                        "placeholder" => app_lang('description'),
                        "style" => "height:150px;",
                        "data-rich-text-editor" => true
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="start_date" class="control-label"><?php echo app_lang('start_date'); ?></label>
                <div class=" col-md-12">
                    <?php
                    echo form_input(array(
                        "id" => "start_date",
                        "name" => "start_date",
                        "value" => is_date_exists($model_info->start_date) ? $model_info->start_date : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('start_date'),
                        "autocomplete" => "off"
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="deadline" class="control-label"><?php echo app_lang('deadline'); ?></label>
                <div class="col-md-12">
                    <?php
                    echo form_input(array(
                        "id" => "deadline",
                        "name" => "deadline",
                        "value" => is_date_exists($model_info->deadline) ? $model_info->deadline : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('deadline'),
                        "autocomplete" => "off"
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="price" class="control-label"><?php echo app_lang('price'); ?></label>
                <div class="col-md-12">
                    <?php
                    echo form_input(array(
                        "id" => "price",
                        "name" => "price",
                        "value" => $model_info->price ? to_decimal_format($model_info->price) : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('price')
                    ));
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="project_labels" class="control-label"><?php echo app_lang('labels'); ?></label>
                <div class="col-md-12">
                    <?php
                    echo form_input(array(
                        "id" => "project_labels",
                        "name" => "labels",
                        "value" => $model_info->labels,
                        "class" => "form-control",
                        "placeholder" => app_lang('labels')
                    ));
                    ?>
                </div>
            </div>
        </div>

        <?php if ($model_info->id) { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="status_id" class="control-label"><?php echo app_lang('status'); ?></label>
                    <div class="col-md-12">
                        <?php
                        foreach ($statuses as $status) {
                            $project_status[$status->id] = $status->key_name ? app_lang($status->key_name) : $status->title;
                        }

                        echo form_dropdown("status_id", $project_status, array($model_info->status_id), "class='select2'");
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php echo view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => "control-label", "field_column" => " col-md-12")); ?>

    </div>
</div>

<div class="modal-footer">
    <div id="link-of-add-project-member-modal" class="hide">
        <?php echo modal_anchor(get_uri("enterprises/project_member_modal_form"), "", array()); ?>
    </div>

    <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span data-feather="x" class="icon-16"></span> <?php echo app_lang('close'); ?></button>
    <?php if (!$model_info->id && $login_user->user_type != "client" && $can_edit_projects) { ?>
        <button type="button" id="save-and-continue-button" class="btn btn-info text-white"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save_and_continue'); ?></button>
    <?php } ?>
    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        window.projectForm = $("#project-form").appForm({
            closeModalOnSuccess: false,
            onSuccess: function(result) {
                if (typeof RELOAD_PROJECT_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_PROJECT_VIEW_AFTER_UPDATE) {
                    location.reload();

                    window.projectForm.closeModal();
                } else if (typeof RELOAD_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_VIEW_AFTER_UPDATE) {
                    RELOAD_VIEW_AFTER_UPDATE = false;
                    window.location = "<?php echo site_url('projects/view'); ?>/" + result.id;

                    window.projectForm.closeModal();
                } else if (window.showAddNewModal) {
                    var $addProjectMemberLink = $("#link-of-add-project-member-modal").find("a");

                    $addProjectMemberLink.attr("data-action-url", "<?php echo get_uri("enterprises/project_member_modal_form"); ?>");
                    $addProjectMemberLink.attr("data-title", "<?php echo app_lang("add_new_project_member"); ?>");
                    $addProjectMemberLink.attr("data-post-project_id", result.id);
                    $addProjectMemberLink.attr("data-post-view_type", "from_project_modal");

                    $addProjectMemberLink.trigger("click");

                    $("#project-table").appTable({
                        newData: result.data,
                        dataId: result.id
                    });
                } else {
                    $("#project-table").appTable({
                        newData: result.data,
                        dataId: result.id
                    });

                    window.projectForm.closeModal();
                }
            }
        });

        setTimeout(function() {
            $("#title").focus();
        }, 200);
        $("#project-form .select2").select2();

        setDatePicker("#start_date, #deadline");

        $("#project_labels").select2({
            multiple: true,
            data: <?php echo json_encode($label_suggestions); ?>
        });

        //save and open add new project member modal
        window.showAddNewModal = false;

        $("#save-and-continue-button").click(function() {
            window.showAddNewModal = true;
            $(this).trigger("submit");
        });


        function validateClientDropdown() {
            if ($("#project-type-dropdown").val() === "internal_project") {
                $("#clients-dropdown").addClass("hide");
                $("#clients-dropdown").find(".select2").removeClass("validate-hidden");
                $("#clients-dropdown").find(".select2").removeAttr("data-rule-required");
            } else {
                $("#clients-dropdown").removeClass("hide");
                $("#clients-dropdown").find(".select2").addClass("validate-hidden");
                $("#clients-dropdown").find(".select2").attr("data-rule-required", true);
            }
        }


        $("#project-type-dropdown").select2().on("change", function() {
            validateClientDropdown();
        });

        setTimeout(function() {
            validateClientDropdown();
        });

    });
</script>