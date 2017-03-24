<!DOCTYPE html>
<html>
<head>
@include('design.head_form')
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hvr-shutter-out-vertical" href="#"><span class="fa fa-home"></span> KIDSY</a>
            <a class="navbar-brand active" >@yield('second-brand') <span class="sr-only">(current)</span></a> 
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @yield('navbar-left')
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @yield('navbar-right')
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
@yield('content')
</div>
</body>
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

    $('.datetimepicker-datetime').datetimepicker({
        locale: 'th',
        format: 'DD-MM-YYYY - HH:mm',
        showTodayButton: true,
        showClear: true
    }); // enable .datetimepicker-date datetimepicker funtionality.

    // Bhuddish year to christian year.
    function handleYear(tmpDate){
        if (tmpDate == '')
            return '';
        if (tmpDate.length <= 10) {
            var dateArr = tmpDate.split('-');
            return (dateArr[2] > 2400) ? dateArr[0] + '-' + dateArr[1] + '-' + (dateArr[2] - 543) : dateArr[0] + '-' + dateArr[1] + '-' + dateArr[2];
        }
        var dateArr = tmpDate.split('-');
        var yearTime = dateArr[2].split(' ');
        // console.log(yearTime[1]);
        return (yearTime[0] > 2400) ? dateArr[0] + '-' + dateArr[1] + '-' + (yearTime[0] - 543) + ' ' + yearTime[1] : dateArr[0] + '-' + dateArr[1] + '-' + yearTime[0] + ' ' + yearTime[1];
    }

    $('.handle-datetime').focusout(function() {
        $(this).val(handleYear($(this).val()));
    }); // Add handel Buddish year to all datetime inputs with handle-datetime class.

</script>
</html>