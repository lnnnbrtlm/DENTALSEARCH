$(document).ready(function() {
    $('#schedule-calendar').fullCalendar({
        header: {
            left: 'title',
        },
        events: [{
                title: 'Schedule 1',
                start: '2018-02-21'
            },
            {
                title: 'Schedule 2',
                start: '2018-02-11'
            },
            {
                title: 'Schedule 3',
                start: '2018-03-01'
            },
            {
                title: 'Schedule 4',
                start: '2018-03-12'
            }
        ],
        eventClick: function(event) {
            var modal = $("#schedule-edit");
            modal.modal();
        },
        dayClick: function(date, jsEvent, view) {
            $('#schedule-add').modal('show');
        }
    });
});