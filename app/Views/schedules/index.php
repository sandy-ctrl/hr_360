<?php
load_css(
    array(
        "assets/js/fullcalendar/fullcalendar.min.css"

    )
);

load_js(
    array(
        "assets/js/fullcalendar/fullcalendar.min.js",
        "assets/js/fullcalendar/locales-all.min.js"
    )
);

$client = "";
if (isset($client_id)) {
    $client = $client_id;
}
?>

<div id="page-content<?php echo $client; ?>" class="page-wrapper<?php echo $client; ?> clearfix">
    <div class="card mb0 full-width-button">
        <div class="page-title clearfix">
            <?php if ($client) { ?>
                <h4><?php echo app_lang('events'); ?></h4>
            <?php } else { ?>
                <h1><?php echo app_lang('event_calendar'); ?></h1>
            <?php } ?>
            <div class="title-button-group  custom-toolbar events-title-button">

                <?php
                echo form_input(
                    array(
                        "id" => "event-labels-dropdown",
                        "name" => "event-labels-dropdown",
                        "class" => "select2 w200 btn-default mr10 float-start mt15 "
                    )
                );
                ?>

                <?php if ($calendar_filter_dropdown) { ?>
                    <div id="calendar-filter-dropdown"
                        class="float-start  <?php echo (count($calendar_filter_dropdown) == 1) ? "hide" : ""; ?>"></div>
                <?php } ?>

                <?php
                if (get_setting("enable_google_calendar_api") && (get_setting("google_calendar_authorized") || get_setting('user_' . $login_user->id . '_google_calendar_authorized'))) {
                    echo modal_anchor(get_uri("schedules/google_calendar_settings_modal_form"), "<i data-feather='settings' class='icon-16'></i> " . app_lang('google_calendar_settings'), array("class" => "btn btn-default", "title" => app_lang('google_calendar_settings')));
                }
                ?>

                <?php echo modal_anchor(get_uri("schedules/modal_form"), "<i data-feather='plus-circle' class='icon-16'></i> " . app_lang('add_event'), array("class" => "btn btn-default add-btn", "title" => app_lang('add_event'), "data-post-client_id" => $client)); ?>

                <?php echo modal_anchor(get_uri("schedules/modal_form"), "", array("class" => "hide", "id" => "add_event_hidden", "title" => app_lang('add_event'), "data-post-client_id" => $client)); ?>
                <?php echo modal_anchor(get_uri("schedules/view"), "", array("class" => "hide", "id" => "show_event_hidden", "data-post-client_id" => $client, "data-post-cycle" => "0", "data-post-editable" => "1", "title" => app_lang('event_details'))); ?>
                <?php echo modal_anchor(get_uri("vacates/application_details"), "", array("class" => "hide", "data-post-id" => "", "id" => "show_leave_hidden")); ?>
                <?php echo modal_anchor(get_uri("responsibility/view"), "", array("class" => "hide", "data-post-id" => "", "id" => "show_task_hidden", "data-modal-lg" => "1")); ?>
                <?php echo modal_anchor(get_uri("labels/modal_form"), "<i data-feather='tag' class='icon-16'></i>", array("class" => "btn btn-default", "title" => app_lang('manage_labels'), "data-post-type" => "event")); ?>
            </div>
        </div>
        <div class="row card-body">
            <div class="col-md-3">
                <!-- mini calendor starts -->
                <div class="calendar-container" id="mini-calendor">
                    <div class="calendar-body ">
                        <header class="calendar-header p10">
                            <span id="calendar-prev" class="material-symbols-rounded"><i
                                    data-feather="chevron-left"></i></span>
                            <p class="calendar-current-date color-black pt5 fw-bold"></p>
                            <span id="calendar-next" class="material-symbols-rounded"><i
                                    data-feather="chevron-right"></i></span>
                        </header>
                        <ul class="calendar-weekdays  pl0" style="margin-bottom:0px">
                            <li>S</li>
                            <li>M</li>
                            <li>T</li>
                            <li>W</li>
                            <li>T</li>
                            <li>F</li>
                            <li>S</li>
                        </ul>
                        <ul class="calendar-dates mb0"></ul>
                    </div>
                    <br>
                </div>
                <!-- mini-calendor ends  -->

                <div class="calendar-body todays-event" id="todays-event-list">
                    <h4 class="text-center fw-bold"><i data-feather='calendar' class='icon-16'></i> Today's Events</h4>
                    
                </div>
                <div class="calendar-body yesterday-event" id="yesterday-event-list">
                    <h4 class="text-center fw-bold"> Yesterday's Events</h4>
                </div>
            </div>
            <!-- Default event calendor  -->
            <div class="col-md-9" id="event-calendar">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var filterValues = "",
        eventLabel = "";

    var loadCalendar = function () {
        var filter_values = filterValues || "events",
            $eventCalendar = document.getElementById('event-calendar'),
            event_label = eventLabel || "0";

        appLoader.show();

        window.fullCalendar = new FullCalendar.Calendar($eventCalendar, {
            locale: AppLanugage.locale,
            height: $(window).height() - 210,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            events: "<?php echo_uri("schedules/calendar_events/"); ?>" + filter_values + "/" + event_label + "/" + "<?php echo "/$client"; ?>",
            dayMaxEvents: false,
            dateClick: function (date, jsEvent, view) {
                $("#add_event_hidden").attr("data-post-start_date", moment(date.date).format("YYYY-MM-DD"));
                var startTime = moment(date.date).format("HH:mm:ss");
                if (startTime === "00:00:00") {
                    startTime = "";
                }
                $("#add_event_hidden").attr("data-post-start_time", startTime);
                var endDate = moment(date.date).add(1, 'hours');

                $("#add_event_hidden").attr("data-post-end_date", endDate.format("YYYY-MM-DD"));
                var endTime = "";
                if (startTime != "") {
                    endTime = endDate.format("HH:mm:ss");
                }

                $("#add_event_hidden").attr("data-post-end_time", endTime);
                $("#add_event_hidden").trigger("click");
            },
            eventClick: function (calEvent) {
                calEvent = calEvent.event.extendedProps;
                if (calEvent.event_type === "event") {
                    $("#show_event_hidden").attr("data-post-id", calEvent.encrypted_event_id);
                    $("#show_event_hidden").attr("data-post-cycle", calEvent.cycle);
                    $("#show_event_hidden").trigger("click");

                } else if (calEvent.event_type === "leave") {
                    $("#show_leave_hidden").attr("data-post-id", calEvent.leave_id);
                    $("#show_leave_hidden").trigger("click");

                } else if (calEvent.event_type === "project_deadline" || calEvent.event_type === "project_start_date") {
                    window.location = "<?php echo site_url('projects/view'); ?>/" + calEvent.project_id;
                } else if (calEvent.event_type === "task_deadline" || calEvent.event_type === "task_start_date") {

                    $("#show_task_hidden").attr("data-post-id", calEvent.task_id);
                    $("#show_task_hidden").trigger("click");
                }
            },
            eventContent: function (element) {
                var icon = element.event.extendedProps.icon;
                var title = element.event.title;
                // console.log( element.event.backgroundColor);
                if (icon) {
                    title = "<span class='clickable p5 w100p inline-block' style='background-color: " + element.event.backgroundColor + "; color: #fff'><span><i data-feather='" + icon + "' class='icon-16'></i> " + title + "</span></span>";
                }

                return {
                    html: title
                };
            },
            loading: function (state) {
                if (state === false) {
                    appLoader.hide();
                    setTimeout(function () {
                        feather.replace();
                    }, 100);
                }
            },
            firstDay: AppHelper.settings.firstDayOfWeek
        });

        window.fullCalendar.render();
    };

    $(document).ready(function () {
        $("#calendar-filter-dropdown").appMultiSelect({
            text: "<?php echo app_lang('event_type'); ?>",
            options: <?php echo json_encode($calendar_filter_dropdown); ?>,
            onChange: function (values) {
                filterValues = values.join('-');
                loadCalendar();
                setCookie("calendar_filters_of_user_<?php echo $login_user->id; ?>", values.join('-')); //save filters on browser cookie
            },
            onInit: function (values) {
                filterValues = values.join('-');
                loadCalendar();
            }
        });

        var client = "<?php echo $client; ?>";
        if (client) {
            setTimeout(function () {
                window.fullCalendar.today();
            });
        }

        //autoload the event popover
        var encrypted_event_id = "<?php echo isset($encrypted_event_id) ? $encrypted_event_id : ''; ?>";
        if (encrypted_event_id) {
            $("#show_event_hidden").attr("data-post-id", encrypted_event_id);
            $("#show_event_hidden").trigger("click");
        }

        $("#event-labels-dropdown").select2({
            data: <?php echo $event_labels_dropdown; ?>
        }).on("change", function () {
            eventLabel = $(this).val();
            loadCalendar();
        });

        $("#event-calendar .fc-header-toolbar .fc-button").click(function () {
            feather.replace();
        });
    });
    // ...........mini calendor : 10 june harshal .............
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();
    const day = document.querySelector(".calendar-dates");
    const currdate = document.querySelector(".calendar-current-date");
    const prenexIcons = document.querySelectorAll(".calendar-header span");
    const weekdayElements = document.querySelectorAll(".calendar-weekdays li");
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    // Function to generate the calendar
    const manipulate = () => {
        let dayOne = new Date(year, month, 1).getDay();
        let lastDate = new Date(year, month + 1, 0).getDate();
        let dayEnd = new Date(year, month, lastDate).getDay();
        let monthLastDate = new Date(year, month, 0).getDate();
        let lit = "";

        // Adding previous month's last days to the calendar
        for (let i = dayOne; i > 0; i--) {
            lit += `<li class="inactive">${monthLastDate - i + 1}</li>`;
        }

        // Adding current month's days to the calendar
        for (let i = 1; i <= lastDate; i++) {
            let isToday = (i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) ? "active" : "";
            lit += `<li class="${isToday}">${i}</li>`;
        }

        // Adding next month's first days to the calendar
        for (let i = dayEnd; i < 6; i++) {
            lit += `<li class="inactive">${i - dayEnd + 1}</li>`;
        }

        // Display current month and year
        currdate.innerText = `${months[month]} ${year}`;
        day.innerHTML = lit;

        // Highlight current weekday
        const currentDay = date.getDay();
        weekdayElements.forEach((el, index) => {
            el.classList.toggle("highlight", index === currentDay);
        });
    }
    manipulate();
    prenexIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            month = icon.id === "calendar-prev" ? month - 1 : month + 1;

            if (month < 0 || month > 11) {
                date = new Date(year, month, new Date().getDate());
                year = date.getFullYear();
                month = date.getMonth();
            } else {
                date = new Date();
            }
            manipulate();
        });
    });
    // mini calendor ends 
</script>