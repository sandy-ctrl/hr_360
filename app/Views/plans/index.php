<div id="page-content" class="page-wrapper clearfix grid-button">
    <div class="card clearfix">
        <ul id="proposal-tabs" data-bs-toggle="ajax-tab" class="nav nav-tabs title" role="tablist">
            <li class="title-tab"><h4 class="pl15 pt10 pr15"><?php echo app_lang('proposals'); ?></h4></li>
            <li><a id="monthly-proposal-button" role="presentation" data-bs-toggle="tab" href="javascript:;" data-bs-target="#monthly-proposals"><?php echo app_lang("monthly"); ?></a></li>
            <li><a role="presentation" data-bs-toggle="tab" href="<?php echo_uri("plans/yearly/"); ?>" data-bs-target="#yearly-proposals"><?php echo app_lang('yearly'); ?></a></li>
            <div class="tab-title clearfix no-border proposal-page-title">
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("plans/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_proposal'), array("class" => "btn btn-default", "title" => app_lang('add_proposal'))); ?>
                </div>
            </div>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="monthly-proposals">
                <div class="table-responsive">
                    <table id="monthly-proposal-table" class="display" cellspacing="0" width="100%">   
                    </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="yearly-proposals"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    loadProposalsTable = function (selector, dateRange) {

        var showCommentOption = false;
        if ("<?php echo get_setting("enable_comments_on_proposals") == "1" ?>") {
            showCommentOption = true;
        }

        $(selector).appTable({
            source: '<?php echo_uri("plans/list_data") ?>',
            order: [[0, "desc"]],
            dateRangeType: dateRange,
            filterDropdown: [{name: "status", class: "w150", options: <?php echo view("plans/proposal_statuses_dropdown"); ?>}, <?php echo $custom_field_filters; ?>],
            rangeDatepicker: [
                {startDate: {name: "last_email_seen_start_date", value: ""}, endDate: {name: "last_email_seen_end_date", value: ""}, showClearButton: true, label: "<?php echo app_lang('last_email_seen'); ?>", ranges: ['today', 'yesterday', 'last_7_days', 'last_30_days', 'this_month', 'last_month', 'this_year', 'last_year']},
                {startDate: {name: "last_preview_seen_start_date", value: ""}, endDate: {name: "last_preview_seen_end_date", value: ""}, showClearButton: true, label: "<?php echo app_lang('last_preview_seen'); ?>", ranges: ['today', 'yesterday', 'last_7_days', 'last_30_days', 'this_month', 'last_month', 'this_year', 'last_year']}
            ],
            columns: [
                {title: "<?php echo app_lang("proposal") ?> ", "class": "w10p all"},
                {title: "<?php echo app_lang("client") ?>", "class": "w10p"},
                {visible: false, searchable: false},
                {title: "<?php echo app_lang("proposal_date") ?>", "iDataSort": 2, "class": "w10p"},
                {visible: false, searchable: false},
                {title: "<?php echo app_lang("valid_until") ?>", "iDataSort": 4, "class": "w10p"},
                {title: "<?php echo app_lang("last_email_seen") ?>", "class": "w15p text-center"},
                {title: "<?php echo app_lang("last_preview_seen") ?>", "class": "w15p text-center"},
                {title: "<?php echo app_lang("amount") ?>", "class": "text-right w150"},
                {title: "<?php echo app_lang("status") ?>", "class": "w100 text-center"},
                {visible: showCommentOption, title: "<?php echo app_lang("comments") ?>", "class": "text-center w50"}
<?php echo $custom_field_headers; ?>,
                {title: "<i data-feather='menu' class='icon-16'></i>", "class": "text-center option w10p"}
            ],
            printColumns: combineCustomFieldsColumns([0, 1, 3, 5, 6, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            xlsColumns: combineCustomFieldsColumns([0, 1, 3, 5, 6, 7, 8, 9], '<?php echo $custom_field_headers; ?>'),
            summation: [{column: 8, dataType: 'currency', currencySymbol: AppHelper.settings.currencySymbol}]
        });
    };

    $(document).ready(function () {
        loadProposalsTable("#monthly-proposal-table", "monthly");
    });
</script>