<div class="bg-silver " >
    <?php
        echo view("settings/tabs_arrow_section");
    ?>
</div>
<div id="page-content" class="page-wrapper-reconstructed clearfix">
    <div class="row">
        <div class="col-sm-3 col-lg-2" id="menuContainer">
            <?php
            $tab_view['active_tab'] = "client_groups";
            echo view("settings/tabs", $tab_view);
            ?>
        </div>

        <div class="col-sm-9 col-lg-10" id="mainContent">
            <div class="card">
                <div class="page-title clearfix">
                    <h4> <?php echo app_lang('client_groups'); ?></h4>
                    <div class="title-button-group">
                        <?php echo modal_anchor(get_uri("client_groups/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_client_group'), array("class" => "btn btn-default", "title" => app_lang('add_client_group'))); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="client-groups-table" class="display" cellspacing="0" width="100%">            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#client-groups-table").appTable({
            source: '<?php echo_uri("client_groups/list_data") ?>',
            columns: [
                {title: '<?php echo app_lang("title") ?>'},
                {title: '<i data-feather="menu" class="icon-16"></i>', "class": "text-center option w100"}
            ]
        });
    });
</script>