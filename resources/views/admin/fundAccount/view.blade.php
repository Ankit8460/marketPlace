@extends('layouts.admin')

@section('content')

<style type="text/css">
.fa-unsorted{float: right;padding-top: 3px}
.fa-chevron-down{float: right;padding-top: 3px}
.fa-chevron-right{float: right;padding-top: 3px}
.pagination-sm{float: right;}  
.pay{padding-bottom: 15px;border-bottom: 1px solid #e5e5e5;}
.choose_pay{padding-top: 15px; cursor: pointer;}
</style>

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
                    <h1 style="padding: 0px; margin:10px">Fund Accounts</h1>
                    <a type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add Funds</a> 
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          
        </div>
        <!-- end: PAGE HEADER -->

        <!-- start: PAGE CONTENT -->
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-b-30 m-t-0">Funds</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            
                                 Show <select placeholder="All" ng-model="viewby" ng-change="setItemsPerPage(viewby)" class="ng-valid ng-dirty"><option value="3">3</option><option value="10">10</option><option value="50">50</option><option value="100">100</option><option value="500">500</option></select> entries

                                <div style="float: right; margin-bottom: 5px; margin-right: 55px; margin-top: -8px" id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" ng-model="searchKeyword" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div>

                                <table style="padding: 0px"  class="table table-striped table-bordered">
                                    <thead>
                                    <tr >
                                        <th ng-click="sortBy('index')">SrNo. <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('firstName')">Account Name <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('lastName')">Amount Funded <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('employeeType')">Date Created <i class="fa fa-unsorted"></i></th>
                                        <th>Status <i class="fa fa-unsorted"></i></th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                                 <pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" items-per-page="itemsPerPage"></pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->
       
     
        <!-- end: PAGE CONTENT-->
    </div>

      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 470px;margin-top: 125px">
            <div class="modal-content">
                <div class="modal-header">
                  <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Add Fund To Your Account</h3> </center>
                </div>
                <div  class="modal-body" style="padding: 25px">

                <div class="pay"> 
                    <h4 style="color: #357b77" class="modal-title" id="myModalLabel">Choose Your Payment Method <i class="fa fa-chevron-down"></i></h4> 
                </div>
                <div class="choose_pay pay" id="target"> 
                    <h4 style="color: #a2a4a6"   class="modal-title" id="myModalLabel">Payment By Bank Transfer<i class="fa fa-chevron-right"></i></h4> 
                </div>
                <div class="choose_pay" id="target2"> 
                    <h4 style="color: #a2a4a6"  class="modal-title" id="myModalLabel">Payment By Credit Card<i class="fa fa-chevron-right"></i></h4> 
                </div>
                   
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 470px;margin-top: 60px">
            <div class="modal-content">
                <div class="modal-header">
                  <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Add Fund To Your Account</h3> </center>
                </div>
                <div  class="modal-body" style="padding: 25px">

                <div class="pay"> 
                    <h4 style="color: #357b77" class="modal-title" id="myModalLabel">Payment By Bank Transfer <i class="fa fa-chevron-down"></i></h4> 
                </div>
              
                <form style="margin-top: 15px;">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="amount" id="amount"  placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control"  value="" id="tellerNo" name="tellerNo" placeholder="Enter Teller Number" required>
                    </div>
                    <div class="form-group ">
                    <p  style="color: #a2a4a6;padding-bottom: 2px;margin-bottom: 0px">Upload Teller</p>
                        <input style="width: 65%; padding-top: 10px" type="file" class="form-control"  value="" id="uploadTeller" name="uploadTeller" placeholder="Upload Teller" required>
                    </div>
                    
                <div class="modal-footer" style="margin-top: 15px">
                   <button style="width: 100%"  type="submit" value="Submit"  class="btn btn-primary waves-effect waves-light"  onclick="$('#myModal').modal('hide')">Submit Now</button>
                </div>
            </form>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    </div>

    <div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 470px;margin-top: 60px">
            <div class="modal-content">
                <div class="modal-header">
                  <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Add Fund To Your Account</h3> </center>
                </div>
                <div  class="modal-body" style="padding: 25px">

                <div class="pay"> 
                    <h4 style="color: #357b77" class="modal-title" id="myModalLabel">Payment By Credit Card <i class="fa fa-chevron-down"></i></h4> 
                </div>

                 <form style="margin-top: 15px;">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="amount" id="amount"  placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="" id="cardNo" name="cardNo" placeholder="Enter Card Number" required>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="" id="cardName" name="cardName" placeholder="Enter Name On Card" required>
                    </div>
                    <div class="form-group ">
                        <input style="width:23%;float:left;margin-right: 17px;" type="text" class="form-control"value="" id="expMonth" name="expMonth" placeholder="Month" required>

                        <input style="width:23%;float:left;margin-right: 17px;" type="text" class="form-control"  value="" id="expYear" name="expYear" placeholder="Year" required>

                        <input style="width:45%;float:left;"  type="text" class="form-control" value="" id="cvv" name="cvv" placeholder="CVV Number" required>
                    </div>

                    <div class="modal-footer" style="margin-top: 80px">
                       <button style="width: 100%"  type="submit" value="Submit"  class="btn btn-primary waves-effect waves-light"  onclick="$('#myModal').modal('hide')">Submit Now</button>
                    </div>
                </form>
                   
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


</div>



@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
       $( "#target" ).click(function() {
          $('#myModal').modal('hide');
          setTimeout(function(){ $('#myModal2').modal('show'); }, 800);
          
        });

       $( "#target2" ).click(function() {
          $('#myModal').modal('hide');
          setTimeout(function(){ $('#myModal3').modal('show'); }, 800);
          
        });
    });
</script>

@endsection