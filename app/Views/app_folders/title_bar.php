<?php
$context = "file_manager";
if (isset($view_from) && ($view_from == "client_details_view" || $view_from == "client_view")) {
    $context = "client";
}
?>
<!-- 6 june -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-10 d-flex flex-wrap align-items-center">
            <?php
            if ($folder_info) {
                echo js_anchor("<i data-feather='chevron-left'></i>", array('class' => "breadcrumb-folder-item p15 pl10 text-default", "data-folder_id" => $parent_folder_info ? $parent_folder_info->folder_id : ""));
                echo $folder_info->title;
            } else {
                echo "<span class='mr5'><i data-feather='home' class='icon-18'></i></span>" . app_lang("root_folder");
            }

            if ($has_write_permission) {
                echo modal_anchor(get_uri($controller_slag . "/folder_modal_form"), "<i data-feather='folder' class='icon-16 mr5'></i>" . app_lang('new_folder'), array("class" => "m20 btn btn-default  ml-2 my-1", "title" => app_lang('new_folder'), "id" => "new_folder_button", "data-post-parent_id" => $folder_info ? $folder_info->id : "", "data-post-context" => $context, "data-post-context_id" => $client_id ? $client_id : 0));
            }

            if ($has_upload_permission && $folder_item_type == "file") {
                echo '<div class=" my-1 ml-2">' . $add_files_button . '</div>';
            }

            echo js_anchor("<i data-feather='alert-circle' class='icon-16'></i>", array('title' => app_lang('view_details'), "id" => "view-details-button", "class" => "btn btn-default"));
            ?>
        </div>

        <div class="col-12 col-md-2 mt-3 mt-md-0">
            <div class="input-group ">
                <?php
                echo form_input(
                    array(
                        "id" => "file-manager-search-box",
                        "name" => "search",
                        "value" => "",
                        "autocomplete" => "false",
                        "class" => "form-control help-search-box task-view-right-section ",
                        "placeholder" => app_lang('search_folder_or_file')
                    )
                );
                ?>
                <span class="spinning-btn"></span>
            </div>
        </div>
    </div>
</div>