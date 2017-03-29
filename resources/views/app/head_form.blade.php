<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Design View">
<meta name="author" content="Koramit">

<!-- jQuery -->
<script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<!-- font awesome -->
<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

<!-- Bootstrap DateTime Picker Dependencies order is matter -->
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
<script src="{{ asset('/js/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Fonts -->
{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}

<style type="text/css">
    body {
        padding-top: 70px; /* fix navbar overay content */
    }

    /* page theme */
    html, body {
        background-color:  #CD9FCC;
        color: #5e475b;
        /*font-family: 'Raleway', sans-serif;*/
        font-family: sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    /* panel theme */
    .panel.panel-theme {border-color: #5e475b!important}
    .panel-heading.panel-theme {
        color: #cadbc0!important;
        background-color: #693668!important;
    }

    /* btn theme */
    .btn.btn-theme {
        border-color: #5e475b!important;
        color: #cadbc0!important;
        background-color: #693668!important;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }

    .btn-theme:hover {
        color: #fdfdfd!important;
    } 

    /* Override Bootstrap Navbar Color */
    .navbar-default {
      background-color: #9f6ba0;
      border-color: #cd9fcc;
    }
    .navbar-default .navbar-brand {
      color: #693668;
    }
    .navbar-default .navbar-brand:hover,
    .navbar-default .navbar-brand:focus {
      color: #cadbc0;
    }
    .navbar-default .navbar-text {
      color: #693668;
    }
    .navbar-default .navbar-nav > li > a {
      color: #693668;
    }
    .navbar-default .navbar-nav > li > a:hover,
    .navbar-default .navbar-nav > li > a:focus {
      color: #cadbc0;
    }
    .navbar-default .navbar-nav > li > .dropdown-menu {
      background-color: #9f6ba0;
    }
    .navbar-default .navbar-nav > li > .dropdown-menu > li > a {
      color: #693668;
    }
    .navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
    .navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
      color: #cadbc0;
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
    .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
    .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
      color: #cadbc0;
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
      color: #cadbc0;
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
      color: #cadbc0;
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-toggle {
      border-color: #cd9fcc;
    }
    .navbar-default .navbar-toggle:hover,
    .navbar-default .navbar-toggle:focus {
      background-color: #cd9fcc;
    }
    .navbar-default .navbar-toggle .icon-bar {
      background-color: #693668;
    }
    .navbar-default .navbar-collapse,
    .navbar-default .navbar-form {
      border-color: #693668;
    }
    .navbar-default .navbar-link {
      color: #693668;
    }
    .navbar-default .navbar-link:hover {
      color: #cadbc0;
    }

    @media (max-width: 767px) {
      .navbar-default .navbar-nav .open .dropdown-menu > li > a {
        color: #693668;
      }
      .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
      .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
        color: #cadbc0;
      }
      .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
      .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
      .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
        color: #cadbc0;
        background-color: #cd9fcc;
      }
    }
    /* end Override Bootstrap Navbar Color */

    /* Override Bootstrap navbar-brand active */
    a.navbar-brand.active {
        color: #cadbc0!important;
        background-color: #7c4b74!important;
        margin-left: 5px!important;
    }

    /* Bounce To Bottom */
    .hvr-bounce-to-bottom {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px transparent;
        position: relative;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
    }
    .hvr-bounce-to-bottom:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #CD9FCC;
        -webkit-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-bounce-to-bottom:hover, .hvr-bounce-to-bottom:focus, .hvr-bounce-to-bottom:active {
        color: #cadbc0;
    }
    .hvr-bounce-to-bottom:hover:before, .hvr-bounce-to-bottom:focus:before, .hvr-bounce-to-bottom:active:before {
        -webkit-transform: scaleY(1);
        transform: scaleY(1);
        -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
        transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
    }
    /* end Bounce To Bottom */

    /* Bounce To Top */
    .hvr-bounce-to-top {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px transparent;
        position: relative;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
    }
    .hvr-bounce-to-top:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #CD9FCC;
        -webkit-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: 50% 100%;
        transform-origin: 50% 100%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-bounce-to-top:hover, .hvr-bounce-to-top:focus, .hvr-bounce-to-top:active {
        color: #cadbc0;
    }
    .hvr-bounce-to-top:hover:before, .hvr-bounce-to-top:focus:before, .hvr-bounce-to-top:active:before {
        -webkit-transform: scaleY(1);
        transform: scaleY(1);
        -webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
        transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
    }

    /* Shutter Out Vertical */
    .hvr-shutter-out-vertical {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px transparent;
        position: relative;
        background: #9f6ba0;
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
    }
    .hvr-shutter-out-vertical:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #CD9FCC;
        -webkit-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: 50%;
        transform-origin: 50%;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-shutter-out-vertical:hover, .hvr-shutter-out-vertical:focus, .hvr-shutter-out-vertical:active {
        color: #cadbc0;
    }
    .hvr-shutter-out-vertical:hover:before, .hvr-shutter-out-vertical:focus:before, .hvr-shutter-out-vertical:active:before {
        -webkit-transform: scaleY(1);
        transform: scaleY(1);
    }
</style>