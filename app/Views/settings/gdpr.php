<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "gdpr";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <?php echo form_open(get_uri("settings/save_gdpr_settings"), array("id" => "gdpr-settings-form", "class" => "general-form dashed-row", "role" => "form")); ?>
            <div class="card">
                <div class=" card-header">
                    <h4>GDPR</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="enable_gdpr" class="col-md-2"><?php echo app_lang('enable_gdpr'); ?></label>
                            <div class="col-md-10">
                                <?php
                                echo form_checkbox("enable_gdpr", "1", get_setting("enable_gdpr") ? true : false, "id='enable_gdpr' class='form-check-input ml15'");
                                ?>               
                            </div>
                        </div>
                    </div>

                    <div id="gdpr-details"  class="<?php echo get_setting("enable_gdpr") ? "" : "hide"; ?>"> 
                        <div class="form-group">
                            <div class="row">
                                <label for="allow_clients_to_export_their_data" class="col-md-2"><?php echo app_lang('allow_clients_to_export_their_data'); ?></label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_checkbox("allow_clients_to_export_their_data", "1", get_setting("allow_clients_to_export_their_data") ? true : false, "id='allow_clients_to_export_their_data' class='form-check-input ml15'");
                                    ?>               
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="clients_can_request_account_removal" class="col-md-2"><?php echo app_lang('clients_can_request_account_removal'); ?></label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_checkbox("clients_can_request_account_removal", "1", get_setting("clients_can_request_account_removal") ? true : false, "id='clients_can_request_account_removal' class='form-check-input ml15'");
                                    ?>               
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="show_terms_and_conditions_in_client_signup_page" class="col-md-2"><?php echo app_lang('show_terms_and_conditions_in_client_signup_page'); ?></label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_checkbox("show_terms_and_conditions_in_client_signup_page", "1", get_setting("show_terms_and_conditions_in_client_signup_page") ? true : false, "id='show_terms_and_conditions_in_client_signup_page' class='form-check-input ml15'");
                                    ?>               
                                </div>
                            </div>
                        </div>

                        <div id="terms-and-conditions-details" class="<?php echo get_setting("show_terms_and_conditions_in_client_signup_page") ? "" : "hide"; ?>">
                            <div class="form-group">
                                <div class="row">
                                    <label for="gdpr_terms_and_conditions_link" class=" col-md-2"><?php echo app_lang('gdpr_terms_and_conditions_link'); ?></label>
                                    <div class=" col-md-10">
                                        <?php
                                        echo form_input(array(
                                            "id" => "gdpr_terms_and_conditions_link",
                                            "name" => "gdpr_terms_and_conditions_link",
                                            "value" => get_setting("gdpr_terms_and_conditions_link"),
                                            "class" => "form-control",
                                            "placeholder" => "URL",
                                            "data-rule-required" => true,
                                            "data-msg-required" => app_lang("field_required"),
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><span data-feather="check-circle" class="icon-16"></span> <?php echo app_lang('save'); ?></button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#gdpr-settings-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                if (result.success) {
                    appAlert.success(result.message, {duration: 10000});
                } else {
                    appAlert.error(result.message);
                }
            }
        });

        //show/hide gdpr details area
        $("#enable_gdpr").click(function () {
            if ($(this).is(":checked")) {
                $("#gdpr-details").removeClass("hide");
            } else {
                $("#gdpr-details").addClass("hide");
            }
        });

        //show/hide terms and conditions details area
        $("#show_terms_and_conditions_in_client_signup_page").click(function () {
            if ($(this).is(":checked")) {
                $("#terms-and-conditions-details").removeClass("hide");
            } else {
                $("#terms-and-conditions-details").addClass("hide");
            }
        });
    });
      // 5 june harshal
      document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menuButton');
        var menuContainer = document.getElementById('menuContainer');
        var mainContent = document.getElementById('mainContent');

        menuButton.addEventListener('click', function() {
            if (menuContainer.style.display === 'none' || menuContainer.style.display === '') {
                menuContainer.style.display = 'block';
                mainContent.classList.add('reduced-width');
            } else {
                menuContainer.style.display = 'none';
                mainContent.classList.remove('reduced-width');
            }
            const iconHTML = menuButton.innerHTML;
            const newIcon = iconHTML.includes('chevron-right') ? 'chevron-left' : 'chevron-right';
            menuButton.innerHTML = `<i data-feather="${newIcon}" class="border border-dark setting-arrow mr5"></i>`;
            feather.replace();
        });
    });
</script>