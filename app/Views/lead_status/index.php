<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "leads";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="card">

                <ul data-bs-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
                    <li><a role="presentation" data-bs-toggle="tab" href="javascript:;" data-bs-target="#lead-status-tab"> <?php echo app_lang('lead_status'); ?></a></li>
                    <li><a role="presentation" data-bs-toggle="tab" href="<?php echo_uri("lead_source"); ?>" data-bs-target="#lead-source-tab"><?php echo app_lang('lead_source'); ?></a></li>
                    <li><a role="presentation" data-bs-toggle="tab" href="<?php echo_uri("settings/leads"); ?>" data-bs-target="#lead-settings-tab"><?php echo app_lang('leads'); ?></a></li>
                    <div class="tab-title clearfix no-border">
                        <div class="title-button-group">
                            <?php echo modal_anchor(get_uri("lead_status/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_lead_status'), array("class" => "btn btn-default", "title" => app_lang('add_lead_status'), "id" => "lead-status-source-add-btn")); ?>
                        </div>
                    </div>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade" id="lead-status-tab">
                        <div class="table-responsive">
                            <table id="lead-status-table" class="display no-thead b-t b-b-only no-hover" cellspacing="0" width="100%">         
                            </table>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="lead-source-tab"></div>
                    <div role="tabpanel" class="tab-pane fade" id="lead-settings-tab"></div>
                </div>

            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#lead-status-table").appTable({
            source: '<?php echo_uri("lead_status/list_data") ?>',
            order: [[0, "asc"]],
            hideTools: true,
            displayLength: 100,
            columns: [
                {visible: false},
                {title: '<?php echo app_lang("title"); ?>'},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"}
            ],
            onInitComplete: function () {
                //apply sortable
                $("#lead-status-table").find("tbody").attr("id", "custom-field-table-sortable");
                var $selector = $("#custom-field-table-sortable");

                Sortable.create($selector[0], {
                    animation: 150,
                    chosenClass: "sortable-chosen",
                    ghostClass: "sortable-ghost",
                    onUpdate: function (e) {
                        appLoader.show();
                        //prepare sort indexes 
                        var data = "";
                        $.each($selector.find(".field-row"), function (index, ele) {
                            if (data) {
                                data += ",";
                            }

                            data += $(ele).attr("data-id") + "-" + index;
                        });

                        //update sort indexes
                        $.ajax({
                            url: '<?php echo_uri("lead_status/update_field_sort_values") ?>',
                            type: "POST",
                            data: {sort_values: data},
                            success: function () {
                                appLoader.hide();
                            }
                        });
                    }
                });

            }

        });


        //change the add button attributes on changing tab panel
        var addButton = $("#lead-status-source-add-btn");
        $(".nav-tabs li").click(function () {
            var activeField = $(this).find("a").attr("data-bs-target");

            //lead status
            if (activeField === "#lead-status-tab") {
                addButton.attr("title", "<?php echo app_lang("add_lead_status"); ?>");
                addButton.attr("data-title", "<?php echo app_lang("add_lead_status"); ?>");
                addButton.attr("data-action-url", "<?php echo get_uri("lead_status/modal_form"); ?>");

                addButton.html("<?php echo "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_lead_status'); ?>");
                feather.replace();
            } else if (activeField === "#lead-source-tab") {
                addButton.attr("title", "<?php echo app_lang("add_lead_source"); ?>");
                addButton.attr("data-title", "<?php echo app_lang("add_lead_source"); ?>");
                addButton.attr("data-action-url", "<?php echo get_uri("lead_source/modal_form"); ?>");

                addButton.html("<?php echo "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_lead_source'); ?>");
                feather.replace();
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