<input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
<input type="hidden" name="view" value="<?php echo isset($view) ? $view : ""; ?>" />
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
                <label for="type" class="control-label"><?php echo app_lang('type'); ?></label>
                <div class="col-sm-12">
                    <?php
                    echo form_radio(array(
                        "id" => "type_organization",
                        "name" => "account_type",
                        "class" => "form-check-input account_type",
                        "data-msg-required" => app_lang("field_required"),
                    ), "organization", ($model_info->type === "organization") ? true : (($model_info->type !== "person") ? true : false));
                    ?>
                    <label for="type_organization" class="mr15"><?php echo app_lang('organization'); ?></label>
                    <?php
                    echo form_radio(array(
                        "id" => "type_person",
                        "name" => "account_type",
                        "class" => "form-check-input account_type",
                        "data-msg-required" => app_lang("field_required"),
                    ), "person", ($model_info->type === "person") ? true : false);
                    ?>
                    <label for="type_person" class=""><?php echo app_lang('person'); ?></label>
                </div>
            </div>
        </div>
        <?php if ($model_info->id) { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <?php if ($model_info->type == "person") { ?>
                        <label for="name" class="control-label company_name_section"><?php echo app_lang('name'); ?></label>
                    <?php } else { ?>
                        <label for="company_name" class="control-label company_name_section"><?php echo app_lang('company_name'); ?></label>
                    <?php } ?>
                    <div class="col-sm-12">
                        <?php
                        echo form_input(array(
                            "id" => ($model_info->type == "person") ? "name" : "company_name",
                            "name" => "company_name",
                            "value" => $model_info->company_name,
                            "class" => "form-control company_name_input_section",
                            "placeholder" => app_lang('company_name'),
                            "autofocus" => true,
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="company_name" class="control-label company_name_section"><?php echo app_lang('company_name'); ?></label>
                    <div class="col-sm-12">
                        <?php
                        echo form_input(array(
                            "id" => "company_name",
                            "name" => "company_name",
                            "value" => $model_info->company_name,
                            "class" => "form-control company_name_input_section",
                            "placeholder" => app_lang('company_name'),
                            "autofocus" => true,
                            "data-rule-required" => true,
                            "data-msg-required" => app_lang("field_required"),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="lead_status_id" class="control-label"><?php echo app_lang('status'); ?></label>
                <div class="col-sm-12">
                    <?php
                    foreach ($statuses as $status) {
                        $lead_status[$status->id] = $status->title;
                    }

                    echo form_dropdown("lead_status_id", $lead_status, array($model_info->lead_status_id), "class='select2'");
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="owner_id" class="control-label"><?php echo app_lang('owner'); ?>
                    <span class="help" data-container="body" data-bs-toggle="tooltip" title="<?php echo app_lang('the_person_who_will_manage_this_lead') ?>"><i data-feather="help-circle" class="icon-16"></i></span>
                </label>
                <div class="col-sm-12">
                    <?php
                    echo form_input(array(
                        "id" => "owner_id",
                        "name" => "owner_id",
                        "value" => $model_info->owner_id ? $model_info->owner_id : $login_user->id,
                        "class" => "form-control",
                        "placeholder" => app_lang('owner')
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="lead_source_id" class="control-label"><?php echo app_lang('source'); ?></label>
                <div class="col-sm-12">
                    <?php
                    $lead_source = array();

                    foreach ($sources as $source) {
                        $lead_source[$source->id] = $source->title;
                    }

                    echo form_dropdown("lead_source_id", $lead_source, array($model_info->lead_source_id), "class='select2'");
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="address" class="control-label"><?php echo app_lang('address'); ?></label>
                <div class="col-sm-12">
                    <?php
                    echo form_textarea(array(
                        "id" => "address",
                        "name" => "address",
                        "value" => $model_info->address ? $model_info->address : "",
                        "class" => "form-control",
                        "placeholder" => app_lang('address')
                    ));
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="city" class="control-label"><?php echo app_lang('city'); ?></label>
                <div class="col-sm-12">
                    <?php
                    echo form_input(array(
                        "id" => "city",
                        "name" => "city",
                        "value" => $model_info->city,
                        "class" => "form-control",
                        "placeholder" => app_lang('city')
                    ));
                    ?>
                </div>
            </div>
        </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="state" class="control-label"><?php echo app_lang('state'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "state",
                    "name" => "state",
                    "value" => $model_info->state,
                    "class" => "form-control",
                    "placeholder" => app_lang('state')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="zip" class="control-label"><?php echo app_lang('zip'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "zip",
                    "name" => "zip",
                    "value" => $model_info->zip,
                    "class" => "form-control",
                    "placeholder" => app_lang('zip')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="country" class="control-label"><?php echo app_lang('country'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "country",
                    "name" => "country",
                    "value" => $model_info->country,
                    "class" => "form-control",
                    "placeholder" => app_lang('country')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="phone" class="control-label"><?php echo app_lang('phone'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "phone",
                    "name" => "phone",
                    "value" => $model_info->phone,
                    "class" => "form-control",
                    "placeholder" => app_lang('phone')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="website" class="control-label"><?php echo app_lang('website'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "website",
                    "name" => "website",
                    "value" => $model_info->website,
                    "class" => "form-control",
                    "placeholder" => app_lang('website')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="vat_number" class="control-label"><?php echo app_lang('vat_number'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "vat_number",
                    "name" => "vat_number",
                    "value" => $model_info->vat_number,
                    "class" => "form-control",
                    "placeholder" => app_lang('vat_number')
                ));
                ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="gst_number" class="control-label"><?php echo app_lang('gst_number'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "gst_number",
                    "name" => "gst_number",
                    "value" => $model_info->gst_number,
                    "class" => "form-control",
                    "placeholder" => app_lang('gst_number')
                ));
                ?>
            </div>
        </div>
    </div>

    <?php if ($login_user->is_admin && get_setting("module_invoice")) { ?>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="currency" class="control-label"><?php echo app_lang('currency'); ?></label>
                <div class="col-sm-12">
                    <?php
                    echo form_input(array(
                        "id" => "currency",
                        "name" => "currency",
                        "value" => $model_info->currency,
                        "class" => "form-control",
                        "placeholder" => app_lang('keep_it_blank_to_use_default') . " (" . get_setting("default_currency") . ")"
                    ));
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="currency_symbol" class="control-label"><?php echo app_lang('currency_symbol'); ?></label>
                <div class="col-sm-12">
                    <?php
                    echo form_input(array(
                        "id" => "currency_symbol",
                        "name" => "currency_symbol",
                        "value" => $model_info->currency_symbol,
                        "class" => "form-control",
                        "placeholder" => app_lang('keep_it_blank_to_use_default') . " (" . get_setting("currency_symbol") . ")"
                    ));
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="lead_labels" class="control-label"><?php echo app_lang('labels'); ?></label>
            <div class="col-sm-12">
                <?php
                echo form_input(array(
                    "id" => "lead_labels",
                    "name" => "labels",
                    "value" => $model_info->labels,
                    "class" => "form-control",
                    "placeholder" => app_lang('labels')
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<?php echo view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => $label_column, "field_column" => $field_column)); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
        $(".select2").select2();

        <?php if (isset($currency_dropdown)) { ?>
            if ($('#currency').length) {
                $('#currency').select2({
                    data: <?php echo json_encode($currency_dropdown); ?>
                });
            }
        <?php } ?>

        $('#owner_id').select2({
            data: <?php echo json_encode($owners_dropdown); ?>
        });

        $("#lead_labels").select2({
            multiple: true,
            data: <?php echo json_encode($label_suggestions); ?>
        });

        $('.account_type').click(function() {
            var inputValue = $(this).attr("value");
            if (inputValue === "person") {
                $(".company_name_section").html("<?php echo app_lang('name'); ?>");
                $(".company_name_input_section").attr("placeholder", "<?php echo app_lang('name'); ?>");
            } else {
                $(".company_name_section").html("<?php echo app_lang('company_name'); ?>");
                $(".company_name_input_section").attr("placeholder", "<?php echo app_lang('company_name'); ?>");
            }
        });
    });
</script>