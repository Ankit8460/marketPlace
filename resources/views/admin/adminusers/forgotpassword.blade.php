@extends('layouts.simple')

@section('header')

@endsection

@section('content')
<!-- start: LOGIN BOX -->
    <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Login Form</h2>
                    </div>
                 <div class="panel-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group mb-n">
                            <div class="col-xs-12">
                                <p>Enter your email to reset your password</p>
                                <div class="input-group">                           
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="clearfix">
                                <a href="extras-login.html" class="btn btn-default pull-left">Go Back</a>
                                <a href="" class="btn btn-primary pull-right">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                
            </div>
        </div>

            <!-- end: FORGOT BOX -->
@endsection
