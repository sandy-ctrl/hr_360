<div class="card bg-white dashboard-card-restructure">
<!-- dashboard-card-restructure -->
    <div class="card-header">
        <strong><?php echo app_lang("proposals"); ?></strong>
    </div>

    <div  class="card-body pt0 rounded-bottom card-body-restructure" id="proposals-widget-container ">

        <ul class="list-group list-group-flush">
            <a class="client-widget-link" data-filter="has_open_proposals" href="<?php echo get_uri("patrons/index/clients_list#has_open_proposals"); ?>">
                <li class="list-group-item text-default list-group-item-restructure">
                    <!-- <i data-feather="coffee" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_open_proposals"); ?> <span class="float-end text-danger"><?php echo $clients_has_open_proposals; ?></span>
                </li>
            </a>
            <a class="client-widget-link" data-filter="has_accepted_proposals" href="<?php echo get_uri("patrons/index/clients_list#has_accepted_proposals"); ?>">
                <li class="list-group-item border-top text-default list-group-item-restructure">
                    <!-- <i data-feather="check-circle" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_accepted_proposals"); ?> <span class="float-end text-danger"><?php echo $clients_has_accepted_proposals; ?></span>
                </li>
            </a>
            <a class="client-widget-link" data-filter="has_rejected_proposals" href="<?php echo get_uri("patrons/index/clients_list#has_rejected_proposals"); ?>">
                <li class="list-group-item border-top text-default list-group-item-restructure">
                    <!-- <i data-feather="x-circle" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_rejected_proposals"); ?> <span class="float-end text-danger"><?php echo $clients_has_rejected_proposals; ?></span>
                </li>
            </a>
        </ul>

    </div>
</div>

<script>
    // $(document).ready(function () {
    //     initScrollbar('#proposals-widget-container', {
    //         setHeight: 158
    //     });
    // });
</script>