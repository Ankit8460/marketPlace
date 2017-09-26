@extends('layouts.admin')

@section('content')
<style type="text/css">
    .datepicker-inline{
        border:none;
    }
    .datepicker table tr td.disabled, .datepicker table tr td.disabled:hover{
        color:#e4e4e4;
    }
    .datepicker table tr td.active{
       background-image: linear-gradient(to bottom,#3ed8b6,#14acb3) !important;
    }
    .fa-unsorted{float: right;padding-top: 3px}
.pagination-sm{float: right;}  
</style>
<div class="main-content " ng-app="myRunpay" ng-controller="runpayCtrl"  >
<div class="loader" ng-hide="loader"></div>
<div class="alert alert-success" ng-hide="alertSuccess" style="margin:10px">
    <p>@{{alert}}</p>
 </div>
 <div class="alert alert-danger" ng-hide="alertDanger">
    <p>@{{alert}}</p> 
</div>

    <div class="container" ng-hide="runpayList">
        <!-- start: PAGE HEADER -->
          <?php $admin = \Illuminate\Support\Facades\Auth::user();?>
        <input type="text" id="adminId" value="<?php echo $admin->id;?>" style="display: none;">
        <input type="text" id="baseUrl" value="{{ url('/') }}" style="display: none;">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-header" style="padding: 0px; margin:0px">
                    <h1 style="padding: 0px; margin:10px">Run Payment Transactions</h1>
                    <a  type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModal">Add New payment</a>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 370px;margin-top: 50px">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Create New Payment</h3> </center>
                            </div>
                            <div class="modal-body" style="padding: 25px">
                                <form ng-submit="generateRunpay(runPays)" >
                                    
                                        <div id="pickyDate"></div>
                                        <div>
                                          <input id="showDate" style="display: none" type="text" ng-model="runPays" name='payPeriod' />
                                        </div>
                                       
                                     <div class="modal-footer" style="margin-top: 20px">
                                       <button style="width: 100%" type="submit" class="btn btn-primary waves-effect waves-light" onclick="$('#myModal').modal('hide')">Generate Payment</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-b-30 m-t-0">Run Payment Transactions</h4>
                        <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">

                              Show <select placeholder="All" ng-model="viewby" ng-change="setItemsPerPage(viewby)" class="ng-valid ng-dirty"><option value="3">3</option><option value="10">10</option><option value="30">30</option><option value="50">50</option><option value="100">100</option><option value="500">500</option></select> entries

                                <div style="float: right; margin-bottom: 5px; margin-right: 55px; margin-top: -8px" id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" ng-model="searchKeyword" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div>

                                <table style="padding: 0px"  class="table table-striped table-bordered">
                                    <thead>
                                    <tr >
                                        <th ng-click="sortBy('index')">SrNo.<i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('payPeriod')">Payment Period<i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('wages')">Wages<i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('taxWithheld')">Tax Withheld<i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('otherwages')">Others<i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('netPayment')">Net Pay<i class="fa fa-unsorted"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in runData.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage)) | filter: searchKeyword  | orderBy:propertyName:reverse" ng-click="runpayClick(x.payId)">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>Month Ending @{{x.payPeriod}}</td>
                                            <td>NGN @{{x.wages}}</td>
                                            <td>NGN @{{x.taxWithheld}}</td>
                                            <td ng-if="x.otherwages == ''">NGN 00,000</td>
                                            <td>NGN @{{x.netPayment}}</td>
                                       </tr>
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

    <div class="main-content" ng-hide="runpayDetails">
        <div class="container" style="margin-top: 25px">
            <!-- start: PAGE HEADER -->
            <div class="row">
            </div>
            <!-- end: PAGE HEADER -->

            <!-- start: PAGE CONTENT -->
            <div class="row">

                <div class="col-md-12">
                <div>
                    <h4 style="padding: 0px;margin-bottom:0px;">Month Ending @{{runinData.payPeriod}}</h4>
                    <div class="panel-body col-md-12 bankaccounts paydata" style="background: #ffffff;border: solid 1px #95989a;">
                       
                        <div class="col-sm-2" >
                            <p>Total Wages</br>
                          <span>NGN @{{runinData.netPayment}}</span></p>
                        </div>
                        <div class="col-sm-2" >
                            <p>Tax Withheld</br>
                          <span>NGN @{{runinData.taxWithheld}}</span></p>
                        </div>
                        <div class="col-sm-2" >
                            <p>Other Payments</br>
                          <span>NGN 00,000</span></p>
                        </div>
                        <div class="col-sm-2" >
                            <p>Net Payment</br>
                          <span>NGN @{{runinData.wages}}</span></p>
                        </div>
                        <div class="col-sm-2" >
                            <p>Pay Status</br>
                          <span>Pending</span></p>
                        </div>
                        <div class="col-sm-2" >
                            <p>Payment Date</br>
                          <span>@{{runinData.payPeriod}}</span></p>
                        </div>
                         
                    </div>
                </div>
                 <div>
                    <div class="" style="margin-top: 140px">
                        <a href="" class="btn btn-info waves-effect waves-light"> Process Pay run</a>
                        <a type="button" class="btn btn-info waves-effect waves-light">Download</a>
                        <a type="button" class="btn btn-info waves-effect waves-light">Email Payslip</a>
                    </div>
                 </div>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                </div>
                  <!-- sample modal content -->
                     <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 40px;">

                                 Show <select placeholder="All" ng-model="viewby" ng-change="setItemsPerPage(viewby)" class="ng-valid ng-dirty"><option value="3">3</option><option value="10">10</option><option value="30">30</option><option value="50">50</option><option value="100">100</option><option value="500">500</option></select> entries

                                <div style="float: right; margin-bottom: 5px; margin-right: 55px; margin-top: -8px" id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" ng-model="searchKeyword" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div>



                                <table style="padding: 0px"  class="table table-striped table-bordered">
                                    <thead>
                                    <tr id="change">
                                        <th ng-click="sortBy('index')">SrNo. <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('firstName')">First Name <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('lastName')">Last Name <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('monthlyTax')">Wages <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('monthlyTax')">Tax Withheld <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('index')">Others <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('monthlySalary')">Net Pay <i class="fa fa-unsorted"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr class="clickable" ng-repeat="x in employeeData.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage)) | filter: searchKeyword  | orderBy:propertyName:reverse">

                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{x.firstName}}</td>
                                            <td>@{{x.lastName}}</td>
                                            <td>NGN @{{x.monthlyTax -- x.monthlySalary}}</td>
                                            <td>NGN @{{x.monthlyTax}}</td>
                                            <td>NGN 00,000</td>
                                            <td>NGN @{{x.monthlySalary}}</td>
                                        </tr>
                                   
                                    </tbody>
                                </table>

                                <pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" items-per-page="itemsPerPage"></pagination>

                            </div>

                        </div>


                        </div>
                    </div>
                    </div>
                </div>

            </div> <!-- End Row -->
          
           
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
   $(document).ready(function(){
    $('#pickyDate').datepicker({
      format: "dd M yyyy",
      todayHighlight: true,
      endDate: '+0d',
    }).on('changeDate', showTestDate);

    function showTestDate(){
      var value = $('#pickyDate').datepicker('getFormattedDate');
      
      $("#showDate").val(value);
      $("#DateTest").html(value);
      $("#lbl2").html(value);
      $("#lbl3").html(value);
    }

  
        $('table').find('.change').click(function(){
          window.location.href = $(this).find(".redirect").attr("href");
        });
      /* $('table').find('tr').click(function(){
         var id = $(this).attr('data-id');
         var location = "{{ url('/admin/paymentdetailsDetails') }}" + "/" + id ;
          $('.se-pre-con').show();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/paymentdetailsDetails') }}" + "/" + id ,
                dataType: 'json',
                success: function (data) {
                    location.href = "{{ url('/admin/paymentdetails/' . 8 . '/edit') }}";
                }
            });
        });*/
    });
      
</script>
@endsection