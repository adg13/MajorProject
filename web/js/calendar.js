$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true // make the event "stick"
                        );
            }
            $.ajax({
                url: adg13_user_calendar_add_event,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    title: title,
                    start: start,
                    end: end,
                    allDay: allDay
                }),
                dataType: 'json'
            });
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: function(start, end, callback) {
            $.ajax({
                url: adg13_user_calendar_display_events,
                dataType: 'json',
                data: { },
                success: function(json_events) {
                    var events = [];
                    $.each(json_events, function(i, event){
                        events.push({
                            title: event.title,
                            start: event.start,
                            end: event.end,
                            allDay: event.allDay
                        });
                    });
                    callback(events);
                }
            });
        }
        
    });
});