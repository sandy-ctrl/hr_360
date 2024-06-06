<div class="card bg-white dashboard-card-restructure">
    <div class="card-header">
        <!-- <i data-feather="calendar" class="icon-16"></i> -->&nbsp; <?php echo app_lang("events"); ?>
    </div>
    <div id="upcoming-event-container">
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url('assets'); ?>/images/calendar-cuate.svg" class="" style="max-width: 80%;">
            </div>
            <div  class="text-center"><?php echo anchor("events", app_lang("view_on_calendar"), array("class" => "btn btn-default w-100 mt15 event-calendar-restructure")); ?></div>
        </div>
    </div>
</div> 

<script type="text/javascript">
    $(document).ready(function () {
        initScrollbar('#upcoming-event-container', {
            setHeight: 280
        });
    });
</script> 