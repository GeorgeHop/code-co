$('.datepicker').datetimepicker({
    format: 'YYYY-MM-DD',
    locale,
    defaultDate: $(this).attr('value') ? moment($(this).attr('value')) : false,
    icons: {
        time: "fas fa-clock-o",
        date: "fas fa-calendar",
        up: "fas fa-chevron-up",
        down: "fas fa-chevron-down",
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-screenshot',
        clear: 'fas fa-trash',
        close: 'fas fa-remove'
    }
});

// TIME PICKER
$('.timepicker').datetimepicker({
    format: 'HH:mm',
    locale,
    icons: {
        time: "fas fa-clock-o",
        date: "fas fa-calendar",
        up: "fas fa-chevron-up",
        down: "fas fa-chevron-down",
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-screenshot',
        clear: 'fas fa-trash',
        close: 'fas fa-remove'
    }
});

// DATE AND TIME PICKER
$('.datetimepicker').datetimepicker({
    locale,
    icons: {
        time: "fas fa-clock-o",
        date: "fas fa-calendar",
        up: "fas fa-chevron-up",
        down: "fas fa-chevron-down",
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-screenshot',
        clear: 'fas fa-trash',
        close: 'fas fa-remove'
    }
});
