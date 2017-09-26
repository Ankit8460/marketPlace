@extends('layouts.simple')

@section('header')

@endsection

@section('content')
<style type="text/css">
    .form-group{margin-bottom:10px;}
    .panel .panel-footer{margin-top: 40px}
</style>
  <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <a  class="login-logo" ><img style="height: 50px" src="{{ url('/') }}/assets/img/logo-big.png"></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Signup Form</h2>
                    </div>
                    <div class="panel-body">
                        
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/register') }}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">    
                                         <span class="input-group-addon">
                                                <i class="ti ti-user"></i>
                                         </span>
                                        <input id="name" type="text" class="form-control" placeholder="Company Name" name="name" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">    
                                        <span class="input-group-addon">
                                            <i class="ti ti-envelope"></i>
                                        </span>                             
                                        <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <div class="input-group">    
                                        <span class="input-group-addon">
                                            <i class="ti ti-mobile"></i>
                                        </span>  
                                        <input id="mobile_no" type="number" placeholder="Mobile Number" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">

                                    </div>
                                    @if ($errors->has('mobile_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">    
                                        <span class="input-group-addon">
                                            <i class="ti ti-key"></i>
                                        </span>       
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password">
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
                                            <i class="ti ti-key"></i>
                                        </span>    
                                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
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
                                    <i class="fa fa-arrow-circle-right"></i> Register
                                </button>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>




@endsection
