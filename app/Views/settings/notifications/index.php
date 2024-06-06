<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class=" page-wrapper-reconstructed  clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer"  >
            <?php
            $tab_view['active_tab'] = "notifications";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent" >
            <div class="card">
                <div class="page-title clearfix">
                    <h4> <?php echo app_lang('notification_settings'); ?></h4>
                </div>
                <div class="table-responsive">
                    <table id="notification-settings-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#notification-settings-table").appTable({
            source: '<?php echo_uri("settings/notification_settings_list_data") ?>',
            filterDropdown: [{name: "category", class: "w200", options: <?php echo $categories_dropdown; ?>}],
            columns: [
                {visible: false},
                {title: '<?php echo app_lang("event"); ?>', class: "w30p"},
                {title: '<?php echo app_lang("notify_to"); ?>'},
                {title: '<?php echo app_lang("category"); ?>', class: "w10p"},
                {title: '<?php echo app_lang("enable_email"); ?>', class: "w10p text-center"},
                {title: '<?php echo app_lang("enable_web"); ?>', class: "w10p text-center"},
                {title: '<?php echo app_lang("enable_slack"); ?>', class: "w10p text-center"},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w50"}
            ],
            order: [[0, "asc"]],
            displayLength: 100
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