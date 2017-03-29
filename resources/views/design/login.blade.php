@extends('design.form')

@section('second-brand', 'Login')

@section('content')
<style type="text/css">
    .vertical-center {
        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
    }

    body {
        padding-top: 0px!important;
    }
</style>
<div class="vertical-center">
    <div class="col-sm-4 col-sm-offset-4 col-xs-12">
        <div class="panel panel-default panel-theme">
            <div class="panel-heading panel-theme"><label>Login to KIDSY</label></div>
            <div class="panel-body">
        
                <form method="POST" action="/auth/login">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    
                    <div class="form-group">
                        <label for="org_id">SAP ID :</label>
                        <input class="form-control" type="text" name="org_id" autocomplete="off" required />
                    </div>

                    <div class="form-group">
                        <label for="org_id">Password :</label>
                        <input class="form-control" type="password" name="password" required />
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary btn-theme">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

