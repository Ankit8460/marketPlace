
@extends('layouts.simple')

@section('header')

@endsection

@section('content')
<!-- start: LOGIN BOX -->
    <div class="row box-login">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <a  class="login-logo" ><img style="height: 50px" src="{{ url('/') }}/assets/img/logo-big.png"></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Login Form</h2>
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
                                    <a  href="?box=forgot" class="forgot newpass pull-left">Forgot password?</a>
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
           <div class="row box-forgot" style="display: none">
            <div class="col-md-4 col-md-offset-4">
                <div>
                    <a  class="login-logo" ><img style="height: 50px" src="{{ url('/') }}/assets/img/logo-big.png"></a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Forgot Password</h2>
                    </div>
                    <div class="panel-body">
                        
                        <form role="form" method="POST" action="{{ url('admin/password/email') }}">
                 {{ csrf_field() }}
                    
                    <fieldset>
                         <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="ti ti-envelope"></i>
                                        </span>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-actions" style="padding: 15px">
                            <a class="btn btn-light-grey go-back" href="{{ url('/') }}/admin/login">
                                <i class="fa fa-circle-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary pull-right">
                                Submit <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
                    </div>
                </div>
                
            </div>
        </div>
          <input id="txt_name" style="display: none" type="text"  value="{{isset($_GET['box']) ? $_GET['box'] : '' }}">
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
 $(function(){
    var a =  $('#txt_name').val();
    if(a == 'forgot'){
        $(".box-forgot").show();
        $(".box-login").hide();
    }
 });
</script>
@endsection