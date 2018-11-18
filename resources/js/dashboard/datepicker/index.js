import * as $ from 'jquery';

export default (function () {
    global.moment = require('moment');
    require('tempusdominus-bootstrap-4');
    $('#startDateTime').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom',
        },
    });
    $('#endDateTime').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        useCurrent: false,
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom',
        },
    });
    $('#startDateTime').on('dp.change', function(e) {
        console.log(e.date);
        $('#endDateTime').data('DateTimePicker').minDate(e.date);
    });
    $('#endDateTime').on('dp.change', function(e) {
        $('#startDateTime').data('DateTimePicker').maxDate(e.date);
    });
}());
