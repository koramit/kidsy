@extends('app.index')

@section('style-js')
<!-- style for flash background warning -->
<style type="text/css">
    input.flash-error {
        -ms-transition: background-color 1s;
        -o-transition: background-color 1s;
        -moz-transition: background-color 1s;
        -webkit-transition: background-color 1s;
        transition: background-color 1s;
    }

    input.flash-error:focus {
        background-color: #FF7070;
    }
</style>
<script type="text/javascript">
    function checkUserForRegister() {
        isUserAvailableForRegister($('input[name=org_id]').val());
        $('#username').collapse('show');
    }

    function isUserAvailableForRegister(org_id) {
        $.getJSON('/check-user-for-register/' + org_id, function (result) {
            // console.log(result.resultCode);
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
            // $('input[name=result]').addClass('flash-error');
            $('input[name=result]').focus();
            // console.log('can not set bx');
        }
    }
</script>
@endsection

@section('second-brand', 'Admin Panel')

@section('navbar-left')
<form class="navbar-form navbar-left" method="POST" action="/register">
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="org_id" class="form-control" placeholder="SAP ID" onfocus="$('#username').collapse('hide');" autocomplete="off" />
            <span class="input-group-addon" role="button" onclick="checkUserForRegister();"><span class="fa fa-check-circle"></span></span>
        </div>
    </div>
    
    <div class="form-group">
        <div class="collapse" id="username">
            <div class="input-group">
                <input class="form-control" type="text" name="result" size="50" readonly />
                <span class="input-group-addon" role="button" onclick="setBiopsy();"><span class="fa fa-plus-circle"></span> Set Biopsy</span>
            </div>
        </div>
    </div>
    <input id="submit_form" style="display:none;" type="submit" value="submit" />
    <input type="hidden" name="can-set-biopsy" value="1" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
@endsection

@section('navbar-right')
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>
@endsection