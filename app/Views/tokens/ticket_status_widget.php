<div class="card bg-white dashboard-card-restructure">
    <div class="card-header">
        &nbsp;<?php echo app_lang("ticket_status"); ?>
    </div>
    <div class="card-body rounded-bottom p20 card-body-restructure" id="ticket-status-widget">
        <div class="row">
            <div class="col-md-7 col  b-r-2">
                <?php
                $count = 0;
                foreach ($tickets_info as $ticket_info) {
                    $count++;
                    if ($count <= 5) { //show up to 5 lines
                        ?>
                        <a href="<?php echo get_uri('tokens/index/open/' . $ticket_info->ticket_type_id); ?>" class="text-default">
                            <div class="pb-2 clearfix">
                                <div class="float-start color-tag border-circle me-3 wh8" style="background-color: #F49C76;"></div>
                                <div class="float-start w-75 text-truncate"><?php echo $ticket_info->ticket_type_title ? $ticket_info->ticket_type_title : app_lang("unspecified"); ?></div>
                                <span class="strong float-end" style="color: #FE5F10;"><?php echo $ticket_info->total; ?></span>
                            </div>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="col-md-5 col">
                <a href="<?php echo get_uri('tokens/index/open'); ?>" class="text-default ">
                    <div class="pb-2">
                        <div class="color-tag border-circle me-3 wh8" style="background-color: #F49C76;"></div><?php echo app_lang("new"); ?>
                        <span class="strong float-end" style="color: #FE5F10;"><?php echo $new; ?></span>
                    </div>
                </a>
                <a href="<?php echo get_uri('tokens/index/open'); ?>" class="text-default ">
                    <div class="pb-2">
                        <div class="color-tag border-circle me-3 wh8" style="background-color: #F49C76;"></div><?php echo app_lang("open"); ?>
                        <span class="strong float-end" style="color: #FE5F10;"><?php echo $open; ?></span>
                    </div>
                </a>
                <a href="<?php echo get_uri('tokens/index/closed'); ?>" class="text-default ">
                    <div class="pb-2">
                        <div class="color-tag border-circle me-3 wh8" style="background-color: #F49C76;"></div><?php echo app_lang("closed"); ?>
                        <span class="strong float-end" style="color: #FE5F10;"><?php echo $closed; ?></span>
                    </div>
                </a>
            </div>
            
        </div>

        <div class="bottom-25 position-absolute w90p">
            <div class="pb-3 ps-3"><?php echo app_lang("new_tickets_in_last_30_days"); ?></div>
            <div>
                <canvas id="ticket-status-chart" style="width: 90%; height: 100px;"></canvas>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ticketStatusChart = document.getElementById("ticket-status-chart");

    var ticks = <?php echo $ticks; ?>;
    var tickets = <?php echo $total_tickets; ?>;

    new Chart(ticketStatusChart, {
        type: 'bar',
        data: {
            labels: ticks,
            datasets: [
                {
                    data: tickets,
                    backgroundColor: "#FE5F10",
                    borderWidth: 0,
                    categoryPercentage: 0.3
                }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                intersect: false,
                enabled: true
            },
            scales: {
                xAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            display: true
                        }
                    }],
                yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            beginAtZero: true,
                            display: false
                        }
                    }]
            }
        }
    });


    $(document).ready(function () {
        initScrollbar('#ticket-status-widget', {
            setHeight: 327
        });

    });
</script>