 <style type="text/css">
     input.login_reg_input {
    -ms-transition: background-color 1s;
    -o-transition: background-color 1s;
    -moz-transition: background-color 1s;
    -webkit-transition: background-color 1s;
    transition: background-color 1s;
}

input.login_reg_input:focus {
    background-color: #FF7070;
}
 </style>
 <form class="navbar-form navbar-left" method="POST" action="/biopsycases">
    <div class="form-group">
        <div class="input-group">
            <input type="text" name="hn" class="form-control" placeholder="HN" onfocus="$('#patient-name').collapse('hide');" autocomplete="off" />
            <span class="input-group-addon" role="button" onclick="chechHNForSetBiopsy();"><span class="fa fa-check-circle"></span></span>
        </div>
    </div>
    
    <div class="form-group">
        <div class="collapse" id="patient-name">
            <div class="input-group">
                <input class="form-control" type="text" name="result" placeholder="patient name" size="50" readonly />
                <span class="input-group-addon" role="button" onclick="setBiopsy();"><span class="fa fa-plus-circle"></span> Set Biopsy</span>
            </div>
        </div>
    </div>
    <input id="submit_form" style="display:none;" type="submit" value="submit" />
    <input type="hidden" name="can-set-biopsy" value="1" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

<script type="text/javascript">
    function chechHNForSetBiopsy() {
        isHnAlreadyInQueue($('input[name=hn]').val());
        $('#patient-name').collapse('show');
    }

    function isHnAlreadyInQueue(hn) {
        $.getJSON('/check-hn-in-queue/' + hn, function (result) {
            // console.log(result.resultCode);
            $('input[name=result]').val(result.resultText);
            if (result.resultCode == '0') {
                $('input[name=can-set-biopsy]').val(0);
                $('input[name=result]').removeClass('login_reg_input');
            } else {
                $('input[name=can-set-biopsy]').val(1);
                $('input[name=result]').addClass('login_reg_input');
            }
        });
    }

    function setBiopsy() {
        if ($('input[name=can-set-biopsy]').val() == 0) {
            $('#submit_form').click();
        } else {
            // $('input[name=result]').addClass('login_reg_input');
            $('input[name=result]').focus();
            // console.log('can not set bx');
        }
    }
</script>
