
@extends('layouts.simple')

@section('header')

@endsection

@section('content')
<!-- start: LOGIN BOX -->
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <a  class="login-logo" ><img style="height: 50px" src="{{ url('/') }}/assets/img/logo-big.png"></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Loginasdas Form</h2>
                    </div>
                    <div class="panel-body">
                        
                        <form role="form" method="POST" action="{{ url('admin/login') }}" class="form-horizontal" id="validate-form">
                            {{ csrf_field() }}

                            <div class="form-group mb-md {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="ti ti-envelope"></i>
                                        </span>
                                        <input id="email" type="email" class="form-control" name="email"  placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group mb-md {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="ti ti-key"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group mb-n">
                                <div class="col-xs-12">
                                    <a href="{{ url('admin/forgotpassword') }}" class="forgot pull-left">Forgot password?</a>
                                    <div class="checkbox-inline icheck pull-right p-n">
                                    </div>
                                </div>
                            </div>
                    <div class="panel-footer">
                        <div class="clearfix">

                             <button type="submit" class="btn btn-primary pull-right">
                                    <i class="fa fa-arrow-circle-right"></i> Login
                                </button>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

            <!-- end: FORGOT BOX -->
@endsection
