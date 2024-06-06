<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "taxes";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="card">
                <div class="page-title clearfix">
                    <h4> <?php echo app_lang('taxes'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("taxes/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_tax'), array("class" => "btn btn-default", "title" => app_lang('add_tax'))); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="taxes-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#taxes-table").appTable({
            source: '<?php echo_uri("taxes/list_data") ?>',
            columns: [
                {title: '<?php echo app_lang("name"); ?>'},
                {title: '<?php echo app_lang("percentage"); ?>'},
                {visible: false, searchable: false},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"}
            ]
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