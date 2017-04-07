<script type="text/javascript">
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    // @                                                       @ //
    // @       These functions are used in many forms.         @ //
    // @                                                       @ //
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    $('.datetimepicker-date').datetimepicker({
        locale: 'th',
        format: 'DD-MM-YYYY',
        showTodayButton: true,
        showClear: true
    }); // enable .datetimepicker-date datetimepicker funtionality.

    $('.datetimepicker-time').datetimepicker({
        locale: 'th',
        format: 'HH:mm',
        // showTodayButton: true,
        showClear: true
    }); // enable .datetimepicker-date datetimepicker funtionality.

    $('.datetimepicker-datetime').datetimepicker({
        locale: 'th',
        format: 'DD-MM-YYYY HH:mm',
        showTodayButton: true,
        showClear: true
    }); // enable .datetimepicker-date datetimepicker funtionality.

    // Bhuddish year to christian year. For datetime please use this format 'DD-MM-YYYY HH:mm'.
    function handleYear(tmpDate){
        if (tmpDate == '') return '';

        if (tmpDate.length <= 10) {
            var dateArr = tmpDate.split('-');
            return (dateArr[2] > 2400) ? dateArr[0] + '-' + dateArr[1] + '-' + (dateArr[2] - 543) : dateArr[0] + '-' + dateArr[1] + '-' + dateArr[2];
        }

        var dateArr = tmpDate.split('-');
        var yearTime = dateArr[2].split(' ');
        return (yearTime[0] > 2400) ? dateArr[0] + '-' + dateArr[1] + '-' + (yearTime[0] - 543) + ' ' + yearTime[1] : dateArr[0] + '-' + dateArr[1] + '-' + yearTime[0] + ' ' + yearTime[1];
    }

    $('.handle-datetime').focusout(function() {
        $(this).val(handleYear($(this).val()));
    }); // Add handel Buddish year to all datetime inputs with handle-datetime class.

</script>