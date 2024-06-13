<div class="tab-content">
    <?php
    $user_id = $login_user->id;
    echo form_open(get_uri("unit_members/save_my_preferences/"), array("id" => "my-preferences-form", "class" => "general-form dashed-row white", "role" => "form"));
    ?>
    <div class="card">
        <div class=" card-header">
            <h4> <?php echo app_lang('my_preferences'); ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="notification_sound_volume"
                            class="control-label"><?php echo app_lang('notification_sound_volume'); ?></label>
                        <?php
                        echo form_dropdown(
                            "notification_sound_volume",
                            array(
                                "0" => "-",
                                "1" => "|",
                                "2" => "||",
                                "3" => "|||",
                                "4" => "||||",
                                "5" => "|||||",
                                "6" => "||||||",
                                "7" => "|||||||",
                                "8" => "||||||||",
                                "9" => "|||||||||",
                            ),
                            get_setting('user_' . $user_id . '_notification_sound_volume'),
                            "class='form-control select2  '"
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="enable_web_notification"
                            class="control-label2"><?php echo app_lang('enable_web_notification'); ?></label>
                        <?php
                        echo form_dropdown(
                            "enable_web_notification",
                            array(
                                "1" => app_lang("yes"),
                                "0" => app_lang("no")
                            ),
                            $user_info->enable_web_notification,
                            "class='form-control select2 ' id='enable-web-notification'"
                        );
                        ?>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="enable_email_notification"
                            class="control-label"><?php echo app_lang('enable_email_notification'); ?></label>
                        <?php
                        echo form_dropdown(
                            "enable_email_notification",
                            array(
                                "1" => app_lang("yes"),
                                "0" => app_lang("no")
                            ),
                            $user_info->enable_email_notification,
                            "class='form-control select2 '"
                        );
                        ?>
                    </div>
                </div>

                <?php if (count($language_dropdown) && !get_setting("disable_language_selector_for_team_members")) { ?>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="personal_language" class="control-label"><?php echo app_lang('language'); ?></label>
                            <?php
                            echo form_dropdown(
                                "personal_language",
                                $language_dropdown,
                                $login_user->language ? $login_user->language : get_setting("language"),
                                "class='form-control select2 '"
                            );
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="hidden_topbar_menus"
                            class="control-label"><?php echo app_lang('hide_menus_from_topbar'); ?></label>
                        <?php
                        echo form_input(
                            array(
                                "id" => "hidden_topbar_menus",
                                "name" => "hidden_topbar_menus",
                                "value" => get_setting('user_' . $user_id . '_hidden_topbar_menus'),
                                "class" => "form-control ",
                                "placeholder" => app_lang('hidden_topbar_menus')
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="disable_keyboard_shortcuts"
                            class="control-label"><?php echo app_lang('disable_keyboard_shortcuts'); ?></label>
                        <div class="d-flex align-items-center">
                            <?php
                            $disable_keyboard_shortcuts = get_setting('user_' . $user_id . '_disable_keyboard_shortcuts');
                            $disable_keyboard_shortcuts = $disable_keyboard_shortcuts ? $disable_keyboard_shortcuts : "0";

                            echo form_dropdown(
                                "disable_keyboard_shortcuts",
                                array(
                                    "1" => app_lang("yes"),
                                    "0" => app_lang("no")
                                ),
                                $disable_keyboard_shortcuts,
                                "class='form-control select2  '"
                            ); ?>
                            <div class="input-group-append">
                                <?php
                                echo modal_anchor(get_uri("unit_members/keyboard_shortcut_modal_form"), "<i data-feather='info' class='icon-16'></i>", array("class" => "btn btn-default keyboard-shortcut-info-icon p6-restructured ", "title" => app_lang('keyboard_shortcuts_info'), "data-post-user_id" => $login_user->id));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="recently_meaning"
                            class="control-label"><?php echo app_lang('recently_meaning'); ?></label>
                        <?php
                        $recently_meaning = get_setting("user_" . $login_user->id . "_recently_meaning");
                        echo form_dropdown("recently_meaning", $recently_meaning_dropdown, $recently_meaning ? $recently_meaning : "1_days", "class='form-control select2 '");
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="reminder_snooze_length"
                            class="control-label"><?php echo app_lang('snooze_length'); ?></label>
                        <?php
                        echo form_dropdown(
                            "reminder_snooze_length",
                            array(
                                "5" => "5 " . app_lang("minutes"),
                                "10" => "10 " . app_lang("minutes"),
                                "15" => "15 " . app_lang("minutes"),
                                "20" => "20 " . app_lang("minutes"),
                                "30" => "30 " . app_lang("minutes"),
                            ),
                            get_setting('user_' . $user_id . '_reminder_snooze_length'),
                            "class='form-control select2'"
                        );
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group <?php echo get_setting("enable_push_notification") && $user_info->enable_web_notification ? '' : 'hide'; ?>"
                        id="disable-push-notification-area">
                        <label for="disable_push_notification"
                            class="control-label"><?php echo app_lang('disable_push_notification'); ?></label>
                        <?php
                        $push_notification = get_setting('user_' . $user_id . '_disable_push_notification');
                        $push_notification = $push_notification ? $push_notification : "0";

                        echo form_dropdown(
                            "disable_push_notification",
                            array(
                                "1" => app_lang("yes"),
                                "0" => app_lang("no")
                            ),
                            $push_notification,
                            "class='form-control select2' id='disable_push_notification'"
                        );
                        ?>
                    </div>
                </div>
            </div>
            <?php app_hooks()->do_action('app_hook_team_members_my_preferences_extension'); ?>

        </div>
        <div class="card-footer rounded-0">
            <button type="submit" class="btn btn-primary btn-sales-action float-end"><span data-feather="check-circle"
                    class="icon-16"></span>
                <?php echo app_lang('save'); ?></button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-preferences-form").appForm({
            isModal: false,
            onSuccess: function (result) {
                appAlert.success(result.message, { duration: 10000 });
            }
        });

        $("#my-preferences-form .select2").select2();

        $("#hidden_topbar_menus").select2({
            multiple: true,
            data: <?php echo ($hidden_topbar_menus_dropdown); ?>
        });

        $("#enable-web-notification").select2().on("change", function () {
            var value = $(this).val();
            if (value === "1") {
                <?php if (get_setting("enable_push_notification")) { ?>
                    $("#disable-push-notification-area").removeClass("hide");
                <?php } ?>
            } else {
                $("#disable-push-notification-area").addClass("hide");
            }
        });
    });
</script>