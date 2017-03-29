
<!-- style and js are on biopsycases-queue -->
@if(Auth::user()->canUseResource('set-biopsy'))
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
@endif
