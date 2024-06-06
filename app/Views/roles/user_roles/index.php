<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class=" page-wrapper-reconstructed  clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "user_roles";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="card">
                <div class="page-title clearfix">
                    <h4> <?php echo app_lang('user_roles'); ?></h4>
                </div>
                <div class="table-responsive">
                    <table id="user-roles-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#user-roles-table").appTable({
            source: '<?php echo_uri("roles/user_role_list_data") ?>',
            radioButtons: [{text: '<?php echo app_lang("active_members") ?>', name: "status", value: "active", isChecked: true}, {text: '<?php echo app_lang("inactive_members") ?>', name: "status", value: "inactive", isChecked: false}],
            columns: [
                {title: "<?php echo app_lang("team_members") ?>"},
                {title: "<?php echo app_lang("role"); ?>"},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1]
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