<div class="card bg-white dashboard-card-restructure" style="height: 258px;">
    <div class="card-header text-default">
        <strong  ><?php echo app_lang("estimates"); ?></strong>
    </div>

    <div class="card-body pt0 rounded-bottom card-body-restructure" id="estiamte-widget-container" >
        <ul class="list-group list-group-flush">
            <a class="client-widget-link" data-filter="has_open_estimates" href="<?php echo get_uri("patrons/index/clients_list#has_open_estimates"); ?>">
                <li class="list-group-item text-default list-group-item-restructure">
                    <!-- <i data-feather="box" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_open_estimates"); ?> <span class="float-end text-danger"><?php echo $clients_has_open_estimates; ?></span>
                </li>
            </a>
            <a class="client-widget-link" data-filter="has_accepted_estimates" href="<?php echo get_uri("patrons/index/clients_list#has_accepted_estimates"); ?>">
                <li class="list-group-item border-top text-default list-group-item-restructure">
                    <!-- <i data-feather="check-circle" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_accepted_estimates"); ?> <span class="float-end text-danger"><?php echo $clients_has_accepted_estimates; ?></span>
                </li>
            </a>
            <a class="client-widget-link" data-filter="has_new_estimate_requests" href="<?php echo get_uri("patrons/index/clients_list#has_new_estimate_requests"); ?>">
                <li class="list-group-item border-top text-default list-group-item-restructure">
                    <!-- <i data-feather="droplet" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_new_estimate_requests"); ?> <span class="float-end text-danger"><?php echo $clients_has_new_estimate_requests; ?></span>
                </li>
            </a>
            <a class="client-widget-link" data-filter="has_estimate_requests_in_progress" href="<?php echo get_uri("patrons/index/clients_list#has_estimate_requests_in_progress"); ?>">
                <li class="list-group-item border-top text-default list-group-item-restructure">
                    <!-- <i data-feather="loader" class="icon-18 me-2"></i> -->
                    <?php echo app_lang("clients_has_estimate_requests_in_progress"); ?> <span class="float-end text-danger"><?php echo $clients_has_estimate_requests_in_progress; ?></span>
                </li>
            </a>
        </ul>

    </div>
</div>

<script>
    // $(document).ready(function () {
    //     initScrollbar('#estiamte-widget-container', {
    //         setHeight: 182
    //     });
    // });
</script>