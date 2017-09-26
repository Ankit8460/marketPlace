@extends('layouts.simple')

@section('header')

@endsection

@section('content')
<style type="text/css">
    .form-group{
        margin-bottom: 15px !important;
    }
</style>
<div class="row box-login">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <a  class="login-logo" ><img style="height: 50px" src="{{ url('/') }}/assets/img/logo-big.png"></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Reset Password</h2>
                    </div>
                    <div class="panel-body">
                        
                       <form  class="form-horizontal" role="form" method="POST" action="{{ url('admin/password/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                            <div style="padding: 0px 15px" class="form-group mb-md {{ $errors->has('email') ? ' has-error' : '' }}">

                                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                     <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ti ti-envelope"></i>
                                            </span>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ $email or old('email') }}">
                                        </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ti ti-envelope"></i>
                                            </span>
                                        <input id="password" type="password" class="form-control" placeholder="New Password" name="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ti ti-envelope"></i>
                                            </span>
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                               
                    <div class="panel-footer">
                        <div class="clearfix">

                             <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-refresh"></i> Reset
                                </button>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>


@endsection
