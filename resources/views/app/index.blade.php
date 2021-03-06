<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
@include('app.head_form')
@yield('style-js')
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
@include('partials.flash')
@yield('content')
</div>
</body>
@include('app.js')
</html>