@if (session('status'))
    <div class="alert alert-success {{ session('attention') ? 'alert-important' : '' }} ">
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        {{ session('status') }}
    </div>
    <script type="text/javascript">
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
@else
@if (session('alert'))
    <div class="alert alert-danger {{ session('attention') ? 'alert-important' : '' }} ">
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        {{ session('alert') }}
    </div>
@endif
@endif