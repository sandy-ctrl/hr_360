<div class="box" id="profile-image-section">
    <div class="box-content  text-center profile-image">
        <?php
        $url = "unit_members";

        //set url
        if ($user_info->user_type === "client") {
            $url = "patrons";
        } else if ($user_info->user_type === "lead") {
            $url = "leads";
        }
        echo form_open(get_uri($url . "/save_profile_image/" . $user_info->id), array("id" => "profile-image-form", "class" => "general-form", "role" => "form")); ?>
        <h4 class="profile-name mt25">Your Profile</h4>
        <span class="avatar avatar-lg">
            <img id="profile-image-preview" src="<?php echo get_avatar($user_info->image); ?>" alt="Profile Image">
        </span>
        <?php if ($login_user->is_admin || $user_info->id === $login_user->id) { ?>
            <div class="d-flex">
                <div class="col-8">
                    <!-- hidden -->
                </div>
                <div class="m0 col-1 file-upload " data-bs-toggle="tooltip"
                    title="<?php echo app_lang("upload_and_crop"); ?>" data-placement="right">
                    <span class="btn color-dark"><i data-feather="camera" class="icon-16"></i></span>
                    <input id="profile_image_file" class="upload" name="profile_image_file" type="file" data-height="200"
                        data-width="200" data-preview-container="#profile-image-preview"
                        data-input-field="#profile_image" />
                </div>
                <div class="m0 col-1 file-upload" data-bs-toggle="tooltip"
                    title="<?php echo app_lang("upload"); ?> (200x200 px)" data-placement="right">
                    <?php echo form_upload(array("id" => "profile_image_file_upload", "name" => "profile_image_file", "class" => "no-outline hidden-input-file upload")); ?>
                    <label for="profile_image_file_upload " class="clickable">
                        <span class="btn color-dark"><i data-feather="upload" class="icon-16"></i></span>
                    </label>
                </div>
                <input type="hidden" id="profile_image" name="profile_image" value="" />
            </div>
        <?php } ?>

        <h4 class="profile-name"><strong><?php echo $user_info->first_name . " " . $user_info->last_name; ?></strong></h4>

        <?php if ($show_cotact_info) { ?>
            <p class="contact-info"><!--<i data-feather="mail" class="icon-16"></i> --><?php echo $user_info->email ? $user_info->email : "-"; ?></p>
            <?php if ($user_info->phone || $user_info->skype) { ?>
                <p class="contact-info">
                    <?php // if ($user_info->phone) { ?>
                    <!-- <i data-feather="phone" class="icon-16"></i> <?php // echo $user_info->phone; ?> <span class="mr15"></span> -->
                    <?php
                    // }
                    // if ($user_info->skype) {
                    //     echo view("users/svg_social_icons/skype");
                    //     echo " " . $user_info->skype;
                    // }
                    ?>
                </p>
            <?php } ?>
        <?php } ?>
        <?php echo form_close(); ?>
    </div>


    <!-- <div class="box-content pl15">
        <?php //if ($user_info->job_title) { ?>
            <p class="p10 m0"><label class="badge bg-info large"><strong> <?php echo $user_info->job_title; ?>
                    </strong></label></p>
        <?php //} ?>
        <div class="p10 m0 clearfix">
            <div class="float-start">
                <?php
                // if ($show_social_links) {
                //     echo social_links_widget($social_link);
                // }
                ?>
            </div>
            <?php
            // if ($user_info->id != $login_user->id) {
            
            //     $show_message_button = true;
            
            //     //don't show message button in client contact's page if user hasn't permission to send/receive message to/from client
            //     if ($user_info->user_type === "client") {
            //         $client_message_users = get_setting("client_message_users");
            //         $client_message_users_array = explode(",", $client_message_users);
            //         if (!in_array($login_user->id, $client_message_users_array)) {
            //             $show_message_button = false;
            //         }
            //     } else if ($user_info->user_type === "lead") {
            //         //don't show message button for lead contacts
            //         $show_message_button = false;
            //     }
            
            //     if (isset($hide_send_message_button) && $hide_send_message_button) {
            //         $show_message_button = false;
            //     }
            
            //     if (get_setting("module_message") && $show_message_button) {
            //         echo modal_anchor(get_uri("memos/modal_form/" . $user_info->id), "<i data-feather='mail' class='icon-16'></i> " . app_lang('send_message'), array("class" => "btn btn-transparent success btn-sm", "title" => app_lang('send_message')));
            //     }
            // }
            ?>
        </div>
    </div> -->
</div>


<script>
    $(document).ready(function () {
        //modify design for mobile devices
        if (isMobile()) {
            $("#profile-image-section").children("div").each(function () {
                $(this).addClass("p0");
                $(this).removeClass("box-content");
            });
        }
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>