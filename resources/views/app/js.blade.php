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

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    // @                                                       @ //
    // @       These functions are used in Set biopsy.         @ //
    // @                                                       @ //
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //

    function chechHNForSetBiopsy() {
        isHnAlreadyInQueue($('input[name=hn]').val());
        $('#patient-name').collapse('show');
    }

    function isHnAlreadyInQueue(hn) {
        $.getJSON('/check-hn-in-queue/' + hn, function (result) {
            $('input[name=result]').val(result.resultText);
            if (result.resultCode == '0') {
                $('input[name=can-set-biopsy]').val(0);
                $('input[name=result]').removeClass('flash-error');
            } else {
                $('input[name=can-set-biopsy]').val(1);
                $('input[name=result]').addClass('flash-error');
            }
        });
    }

    function setBiopsy() {
        if ($('input[name=can-set-biopsy]').val() == 0) {
            $('#submit_form').click();
        } else {
            $('input[name=result]').focus();
        }
    }

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    // @                                                       @ //
    // @       These functions are used in Lab data.           @ //
    // @                                                       @ //
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //

    // link date lab
    $('.lab-virus').click(function () {
        var dateReff = $('input[name=date_' + $(this).attr('target') +']').val();
        var reffName = $(this).attr('target');
        if ( dateReff !== '') {
            $('.lab-virus').each( function() {
                if ($(this).attr('target') !== reffName) {
                    if ($('select[name=' + $(this).attr('target') + ']').val() !== null) {
                        if ($('input[name=date_' + $(this).attr('target') + ']').val() == '')
                            $('input[name=date_' + $(this).attr('target') + ']').val(dateReff);
                    }
                }
            });    
        }
    });

    $('.lab-chem').click(function () {
        console.log($(this).attr('target'));
        var dateReff = $('input[name=date_' + $(this).attr('target') +']').val();
        var reffName = $(this).attr('target');
        if ( dateReff !== '') {
            $('.lab-chem').each( function() {
                if ($(this).attr('target') !== reffName) {
                    if ($('input[name=' + $(this).attr('target') + ']').val() !== '') {
                        if ($('input[name=date_' + $(this).attr('target') + ']').val() == '')
                            $('input[name=date_' + $(this).attr('target') + ']').val(dateReff);
                    }
                }
            });    
        }
    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    // @                                                       @ //
    // @   These functions are used in biopsy case index.      @ //
    // @                                                       @ //
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ //
    $('.autocomplete-patho-diag').each(function() {
        var awesomplete = new Awesomplete(this);
        var ajax = new XMLHttpRequest();
        this.addEventListener('input', function() {
            if ( this.value != '' ) {
                ajax.open("GET", "/get-patho-diag-list/" + this.value, true);
                ajax.setRequestHeader("Content-type", "");
                ajax.onload = function() {
                    awesomplete.list = JSON.parse(ajax.responseText).map(function(i) { return i.name; });
                    awesomplete.evaluate();
                };
                ajax.send();
            }
        });

        this.addEventListener('change', function() {
            var caseID = this.name.replace(/diag/g, '');
            document.getElementById('diag-' + caseID + '-updating').classList.add('fa-circle-o-notch', 'fa-spin');
            ajax.open("POST", "/post-patho-diag", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onload = function() {
                var result = JSON.parse(ajax.responseText);
                if ( result.resultCode == 0 )
                    document.getElementById('diag-' + caseID + '-updating').classList.remove('fa-circle-o-notch', 'fa-spin');

                if ( result.resultText.length > 2 )
                    document.getElementById('case-' + caseID + '-folder').innerHTML = result.resultText;
            }
            ajax.send("diag=" + encodeURIComponent(this.value) + "&id=" + caseID);
        });
    });
</script>