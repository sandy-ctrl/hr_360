<div class="tab-content box-shadow-left-bottom-side ml15  mr15">
    <?php echo form_open(get_uri("unit_members/save_general_info/" . $user_info->id), array("id" => "general-info-form", "class" => "general-form dashed-row white ", "role" => "form")); ?>
    <div class="card">
        <div class=" card-header">
            <h4> <?php echo app_lang('general_info'); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="first_name" class="control-label"><?php echo app_lang('first_name'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "first_name",
                                "name" => "first_name",
                                "value" => $user_info->first_name,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('first_name'),
                                "data-rule-required" => true,
                                "data-msg-required" => app_lang("field_required")
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="last_name" class="control-label"><?php echo app_lang('last_name'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "last_name",
                                "name" => "last_name",
                                "value" => $user_info->last_name,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('last_name'),
                                "data-rule-required" => true,
                                "data-msg-required" => app_lang("field_required")
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="phone" class="control-label"><?php echo app_lang('phone'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "phone",
                                "name" => "phone",
                                "value" => $user_info->phone,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('phone')
                            )
                        );
                        ?>
                    </div>
                </div>

                <!-- Second Row: Alternative Address, Phone, Alternative Phone -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="alternative_phone"
                            class="control-label"><?php echo app_lang('alternative_phone'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "alternative_phone",
                                "name" => "alternative_phone",
                                "value" => $user_info->alternative_phone,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('alternative_phone')
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="address" class="control-label"><?php echo app_lang('mailing_address'); ?></label>
                        <?php
                        echo form_textarea(
                            array(
                                "id" => "address",
                                "name" => "address",
                                "value" => $user_info->address,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('mailing_address')
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="alternative_address"
                            class="control-label"><?php echo app_lang('alternative_address'); ?></label>
                        <?php
                        echo form_textarea(
                            array(
                                "id" => "alternative_address",
                                "name" => "alternative_address",
                                "value" => $user_info->alternative_address,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('alternative_address')
                            )
                        );
                        ?>
                    </div>
                </div>
                <!-- Third Row: Skype, Date of Birth, SSN -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="skype" class="control-label">Skype</label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "skype",
                                "name" => "skype",
                                "value" => $user_info->skype ? $user_info->skype : "",
                                "class" => "form-control form-control-restructure",
                                "placeholder" => "Skype"
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="dob" class="control-label"><?php echo app_lang('date_of_birth'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "dob",
                                "name" => "dob",
                                "value" => $user_info->dob,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('date_of_birth'),
                                "autocomplete" => "off"
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ssn" class="control-label"><?php echo app_lang('ssn'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "ssn",
                                "name" => "ssn",
                                "value" => $user_info->ssn,
                                "class" => "form-control form-control-restructure",
                                "placeholder" => app_lang('ssn')
                            )
                        );
                        ?>
                    </div>
                </div>

                <!-- Fourth Row: Gender -->
                <div class="col-sm-12">
                    <div class="form-group mt15">
                        <label for="gender" class="col-sm-2 control-label"><?php echo app_lang('gender'); ?></label>
                        <?php
                        echo form_radio(
                            array(
                                "id" => "gender_male",
                                "name" => "gender",
                                "class" => "form-check-input",
                            ), "male", ($user_info->gender === "male") ? true : false, "class='form-check-input'");
                        ?>
                        <label for="gender_male" class="mr15 p0"><?php echo app_lang('male'); ?></label>
                        <?php
                        echo form_radio(
                            array(
                                "id" => "gender_female",
                                "name" => "gender",
                                "class" => "form-check-input",
                            ), "female", ($user_info->gender === "female") ? true : false, "class='form-check-input'");
                        ?>
                        <label for="gender_female" class="p0 mr15"><?php echo app_lang('female'); ?></label>
                        <?php
                        echo form_radio(
                            array(
                                "id" => "gender_other",
                                "name" => "gender",
                                "class" => "form-check-input",
                            ), "other", ($user_info->gender === "other") ? true : false);
                        ?>
                        <label for="gender_other" class=""><?php echo app_lang('other'); ?></label>
                    </div>
                </div>
            </div>



            <?php echo view("custom_fields/form/prepare_context_fields", array("custom_fields" => $custom_fields, "label_column" => "control-label", "field_column" => " col-md-112")); ?>

        </div>
        <div class="card-footer rounded-3">
            <button type="submit" class="btn btn-primary btn-sales-action float-end"><span data-feather="check-circle"
                    class="icon-16"></span> <?php echo app_lang('save'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#general-info-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, { duration: 10000 });
                setTimeout(function () {
                    window.location.href = "<?php echo get_uri("unit_members/view/" . $user_info->id); ?>" + "/general";
                }, 500);
            }
        });
        $("#general-info-form .select2").select2();

        setDatePicker("#dob");

    });
</script>