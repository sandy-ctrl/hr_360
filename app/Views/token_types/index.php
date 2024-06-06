<div class="bg-silver " >
<br>
<span class="font-20" style="border:2px !important;" id="menuButton"><i class="border border-dark  setting-arrow" data-feather='chevron-right' class='icon-16'></i> </span><strong class="font-18" >Settings</strong>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "tickets";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="card">

                <ul id="ticket-type-tabs" data-bs-toggle="ajax-tab" class="nav nav-tabs bg-white title" role="tablist">
                    <li><a role="presentation" data-bs-toggle="tab" href="javascript:;" data-bs-target="#ticket-types-tab"> <?php echo app_lang('ticket_types'); ?></a></li>
                    <li><a role="presentation" data-bs-toggle="tab" href="<?php echo_uri("settings/tickets/"); ?>" data-bs-target="#tickets-tab"><?php echo app_lang('tickets'); ?></a></li>
                    <li><a role="presentation" data-bs-toggle="tab" href="<?php echo_uri("settings/imap_settings/"); ?>" data-bs-target="#imap_settings-tab"><?php echo app_lang('imap_settings'); ?></a></li>
                    <div class="tab-title clearfix no-border">
                        <div class="title-button-group">
                            <?php echo modal_anchor(get_uri("token_types/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_ticket_type'), array("class" => "btn btn-default", "title" => app_lang('add_ticket_type'))); ?>
                        </div>
                    </div>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="ticket-types-tab">
                        <div class="table-responsive">
                            <table id="ticket-type-table" class="display" cellspacing="0" width="100%">            
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tickets-tab"></div>
                    <div role="tabpanel" class="tab-pane fade" id="imap_settings-tab"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#ticket-type-table").appTable({
            source: '<?php echo_uri("token_types/list_data") ?>',
            columns: [
                {title: '<?php echo app_lang("name"); ?>'},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0]
        });

        setTimeout(function () {
            var tab = "<?php echo $tab; ?>";
            if (tab === "imap") {
                $("[data-bs-target='#imap_settings-tab']").trigger("click");
            }
        }, 210);

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
