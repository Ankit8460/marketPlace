@extends('layouts.admin')

@section('content')


<div class="main-content"  ng-app="myApp" ng-controller="employeeCtrl">
<div class="loader" ng-hide="loader"></div>
<div class="alert alert-success" ng-hide="alertSuccess" style="margin:10px">
    <p>@{{alert}}</p>
 </div>
 <div class="alert alert-danger" ng-hide="alertDanger">
    <p>@{{alert}}</p> 
</div>

<!-- Employee List -->
    <div class="container"  ng-hide="employeeList">
        <!-- start: PAGE HEADER -->
        <?php $admin = \Illuminate\Support\Facades\Auth::user();?>
        <input type="text" id="adminId" value="<?php echo $admin->id;?>" style="display: none;">
        <input type="text" id="baseUrl" value="{{ url('/') }}" style="display: none;">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-header" style="padding: 0px; margin:0px">
                    <h1 style="padding: 0px; margin:10px">Retirement Funds</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          
        </div>
        <div style="margin-top: 100px">
            <center><h1 style="font-size: 55px;color:#12a69c">Coming Soon</h1></center>
        </div>
</div>



@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
      
    });
</script>

@endsection