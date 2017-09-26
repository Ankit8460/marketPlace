@extends('layouts.admin')

@section('content')

<style type="text/css">
.fa-unsorted{float: right;padding-top: 3px}
.pagination-sm{float: right;}  
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
                    <h1 style="padding: 0px; margin:10px">Employee list</h1>
                    <a ng-click="showAddemployee()" class="btn btn-info waves-effect waves-light">Add New Employee</a>
                      <a href="" class="btn btn-info waves-effect waves-light">Export/Import</a>
                    <a href="" class="btn btn-info waves-effect waves-light">Action</a>
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
                        <h4 class="m-b-30 m-t-0">Employees</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            
                                 Show <select placeholder="All" ng-model="viewby" ng-change="setItemsPerPage(viewby)" class="ng-valid ng-dirty"><option value="3">3</option><option value="10">10</option><option value="50">50</option><option value="100">100</option><option value="500">500</option></select> entries

                                <div style="float: right; margin-bottom: 5px; margin-right: 55px; margin-top: -8px" id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" ng-model="searchKeyword" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div>

                                <table style="padding: 0px"  class="table table-striped table-bordered">
                                    <thead>
                                    <tr >
                                        <th ng-click="sortBy('index')">SrNo. <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('firstName')">First Name <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('lastName')">Last Name <i class="fa fa-unsorted"></i></th>
                                        <th ng-click="sortBy('employeeType')">Employee Type <i class="fa fa-unsorted"></i></th>
                                        <th>Payment Date <i class="fa fa-unsorted"></i></th>
                                        <th>Next Payment Date <i class="fa fa-unsorted"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in employeeData.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage)) | filter: searchKeyword  | orderBy:propertyName:reverse" ng-click="employeeClick(x.employeeId,x.adminId)">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ x.firstName }}</td>
                                            <td>@{{ x.lastName }}</td>
                                            <td>@{{ x.employeeType }}</td>
                                            <td></td>
                                            <td></td>
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

    <!-- Employee Details -->
    <div class="container" style="margin-top: 25px" ng-show="myvalue">
        <div class="row">
            <div class="col-md-12">
            <div class="col-sm-12">
                <div class="" style="margin-top: 15px">
                    <a href="" class="btn btn-info waves-effect waves-light">Employee Taxes</a>
                    <a  type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModalTax">Manage Payslips</a>
                    <a href="" class="btn btn-info waves-effect waves-light">Vacation</a>
                    <a type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#myModal">Bank Accounts</a>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>

                  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 470px;margin-top: 125px">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Add Bank Account</h3> </center>
                            </div>
                            <div ng-repeat="x in employeeData" class="modal-body" style="padding: 25px">
                            <form ng-submit="addAccount(bank,x.employeeId)">
                                
                                    <div class="form-group ">
                                        <input type="text" class="form-control"  ng-model="bank.bankAccName" id="bankAccName"  placeholder="Bank Account Name" required>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" class="form-control" ng-model="bank.accountNo" value="" id="accountNo" name="accountNo" placeholder="Account Number" required>
                                    </div>

                                    <div class="form-group ">
                                        <select id="form-field-select-1" name="bankId" ng-model="bank.bankId" id="bankId" class="form-control" >
                                            <option disabled selected value> -- Select -- </option>
                                            <option ng-repeat="x in banklist" value='@{{x.BankId}}'> @{{x.bankName}} </option>
                                        </select>
                                    </div>
                                <div class="modal-footer" style="margin-top: 50px">
                                   <button style="width: 100%"  type="submit" value="Submit"  class="btn btn-primary waves-effect waves-light"  onclick="$('#myModal').modal('hide')">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

                 <div id="myModalTax" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 470px;margin-top: 120px">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button style="font-size: 35px; color: #1a9086" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <center>  <h3 style="color: #a2a4a6" class="modal-title" id="myModalLabel">Manage Payslips</h3> </center>
                            </div>
                            <div ng-repeat="x in employeeData" class="modal-body" style="padding: 25px" >
                                 <form ng-submit="addPayslip(paySlip,x.employeeId)"  >
                                    <div class="form-group ">
                                       
                                        <input type="date" ng-model="paySlip.payPeriod" class="form-control" placeholder="Pay Period" />
                                    
                                    </div>
                                    <div class="form-group ">
                                         <input type="date" name="payDate" ng-model="paySlip.payDate" class="form-control" placeholder="Payment Date">
                                        
                                    </div>

                                    <div class="form-group ">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" ng-model="paySlip.totalPay" value="" id="totalPay" name="totalPay" placeholder="Total Pay" required>
                                        </div>
                                    </div>
                            <div class="modal-footer" style="margin-top: 50px">
                               <button style="width: 100%" type="submit" value="Submit" class="btn btn-primary waves-effect waves-light" onclick="$('#myModalTax').modal('hide')">Save changes</button>
                            </div>
                                 </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table style="padding: 0px" id="" class="table table-striped table-bordered">
                                    <thead>
                                    <tr id="change">
                                        <th>Employee Name</th>
                                        <th>Salary</th>
                                        <th>Earnings YTD</th>
                                        <th>Next Payment Date</th>
                                        <th class="no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="x in employeeData">
                                            <td>@{{x.firstName}} @{{x.lastName}}</td>
                                            <td>NGN @{{x.salaryAmount}}</td>
                                            <td>NGN @{{x.yearlySalary}}</td>
                                            <td>@{{x.payDate}}</td>
                                            <td class="no-sorting">
                                                 <a ng-click="showEditemployee(x)"  class="btn btn-primary btn-xs" title="Edit employee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>  
                                            </td>
                                        </tr>
                                   
                                   
                                    </tbody>
                                </table>

                                <div ng-repeat="y in employeeData" ng-if="y.BankDetails!=''">
                                    <h4>Employee Bank details</h4>
                                        <div class="panel-body col-sm-12 bankaccounts" ng-repeat="x in y.BankDetails" style="background: #ffffff">
                                            <div class="col-sm-1">
                                                 <img src="{{ url('/') }}/assets/img/correct.png" height="45px" alt="logo">
                                            </div>
                                            <div class="col-sm-3" >
                                                <p>Account Number</br>
                                                @{{x.accountNo}}</p>
                                            </div>
                                             <div class="col-sm-3" >
                                                <p>Account Name</br>
                                                @{{x.bankAccName}}</p>
                                            </div>
                                             <div class="col-sm-3" >
                                                <p>Bank Name</br>   
                                                    <span ng-repeat="z in banklist" ng-if="x.bankId == z.BankId" >@{{z.bankName}}</span>
                                                </p>
                                            </div>
                                             <div class="col-sm-2" >
                                                <p>Action</br>
                                                </p>
                                            </div>
                                        </div>
                                  </div>

                            </div>


                            <div ng-repeat="x in employeeData" style="padding-right: 10px;padding-left: 10px;">
                            <h4>Vacation</h4>
                              
                                <div class="panel-body col-sm-12 bankaccounts" style="background: #ffffff">
                                    
                                    <div class="col-sm-4" >
                                        <p style="padding-top: 12px">Employee Current Vacation</p>
                                    </div>
                                     <div class="col-sm-4" >
                                        <p>Status</br>
                                            <span  ng-if="x.vacationStatus=='1'" style="color: red">Not On Vacation</span></p>
                                            <span ng-if="x.vacationStatus=='0'" style="color: green">On Vacation</span></p>
                                    </div>
                                     <div class="col-sm-2" >
                                        <p>Action</br>
                                        </p>
                                    </div>
                                </div>
                            
                          </div>


                           <div ng-repeat="x in employeeData" style="margin-top: 20px;float: left;" class="col-md-12 col-sm-12 col-xs-12"  ng-if="x.PaySlip!=''">  
                           <h4 >Payslip History</h4>
                           <div>
                                <table style="padding: 0px" id="" class="table table-striped table-bordered">
                                    <thead>
                                    <tr id="change">
                                        <th>Pay Period</th>
                                        <th>Pay date</th>
                                        <th>Total Pay</th>
                                        <th class="no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="y in x.PaySlip">
                                            <td>Month Ending @{{y.payPeriod}}</td>
                                            <td>@{{y.payDate}}</td>
                                            <td>NGN @{{y.totalPay}}</td>
                                            <td class="no-sorting">
                                                Download
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               </div>
                            </div>


                          <div class="col-md-12 col-sm-12 col-xs-12">  
                           <div>
                                <table style="padding: 0px" id="" class="table table-striped table-bordered">
                                    <thead>
                                    <tr id="change">
                                        <th>Employee Tax</th>
                                        <th>Current WithHeld</th>
                                        <th>Yearly Tax</th>
                                        <th>Date</th>
                                        <th class="no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                        <tr ng-repeat="x in employeeData">
                                            <td>@{{x.firstName}} @{{x.lastName}}</td>
                                            <td>NGN @{{x.monthlyTax}}</td>
                                            <td>NGN @{{x.yearlyTax}}</td>
                                            <td>@{{x.payDate}}</td>
                                            
                                            <td class="no-sorting">
                                        
                                            </td>
                                        </tr>
                                   
                                   
                                    </tbody>
                                </table>
                               </div>
                            </div>


                        </div>
              <!-- sample modal content -->
                    </div>
                </div>

            </div>
        </div>


    <!-- Add Employee -->
    <div class="container" ng-show="addEmp">
        <h1 style="padding: 0px; margin:10px">Employees</h1>
        <div class="row">
            <div class="col-sm-12">
                 <div class="panel panel-primary">
                    <div class="panel-body">
                                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        
                        <div class="m-t-20">
                              <form ng-submit="addEmployee(emp)" >
                                 <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Personal Information</h4>
                                      <div class="form-group col-md-1">
                                      <input type="text" class="form-control" ng-model="emp.title" id="title" name="title" placeholder="Title" required>
                                    </div>
                                      <div class="form-group col-md-4">
                                      <input type="text" class="form-control" ng-model="emp.firstName" id="firstName" name="firstName" placeholder="First Name" required>
                                    </div>
                                        <div class="form-group col-md-4">
                                        <input type="text" class="form-control" ng-model="emp.lastName" id="lastName" name="lastName" placeholder="Last Name" required>
                                    </div>
                                        <div class="form-group col-md-3">
                                      <input type="text" class="form-control" ng-model="emp.otherName" id="otherName" name="otherName" placeholder="Other Name" required>
                                    </div>
                                        <div class="form-group col-md-3">
                                      <input type="text" class="form-control" ng-model="emp.position" id="position" placeholder="Position" name="position" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                      <input type="text" class="form-control" placeholder="DD" ng-model="emp.birthDate"  id="birthDate" name="birthDate" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                      <input type="text" class="form-control" placeholder="MM" ng-model="emp.birthMonth"  id="birthMonth" name="birthMonth" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                    <input type="text" class="form-control" placeholder="YYYY" ng-model="emp.birthYear" id="birthYear" name="birthYear" required>
                                    </div>
                                        <div class="col-md-3 m-t-10">
                                        <div class="radio radio-info radio-inline">
                                      <input type="radio" id="gender" ng-model="emp.gender" value="0" name="gender" checked="checked"  > 
                                      <label for="gender"> Male </label>
                                    </div>
                                        <div class="radio radio-info radio-inline">
                                      <input type="radio" id="gender" ng-model="emp.gender" value="1" name="gender" >
                                      <label for="gender"> Female </label>
                                    </div>
                                        </div>
                                 </div>

                                <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Contact Information</h4>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="emp.mobileNo" placeholder="Mobile Number"  id="mobileNo" name="mobileNo" required>
                                  </div>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="emp.email" placeholder="Email Address"  id="email" name="email" required>
                                  </div>
                                  <div class="form-group col-md-8">
                                    <input type="text" class="form-control" ng-model="emp.address" placeholder="Full Adress" id="address" name="address" required>
                                  </div>
                                </div>    
                                
                                
                                <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Employment Detail</h4>
                                     <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="emp.workLocation" placeholder="Work Location" id="workLocation" name="workLocation" required>
                                  </div>
                                    <div class="form-group col-md-3">
                                    <div class="input-group">
                                         <input type="text" name="dateOfHire"  class="form-control" placeholder="MM/DD/YYYY" id="datepicker-autoclose">
                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                    <div class="form-group col-md-3">
                                    <input type="text" class="form-control" ng-model="emp.salaryAmount" id="salaryAmount" placeholder="Salary Amount" name="salaryAmount" required>
                                  </div>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="emp.employeeType"  placeholder="Employee Type" id="employeeType" name="employeeType" required>
                                  </div>
                                   <!--  <div class="form-group col-md-6">
                                  <select id="form-field-select-1" ng-model="emp.bankId" name="bankId"  id="bankId" class="form-control">
                                        <option disabled selected value> -- Select -- </option>
                                        <option value="1">SBI</option>
                                        <option value="2">HDFC</option>
                                  </select>
                              </div> -->
                                  <div class="form-group col-md-12">
                                    <label class="status">Vacation Status</label><br>
                                  <div class="radio radio-info radio-inline">
                                    <input type="radio" id="vacationStatus" ng-model="emp.vacationStatus" name="vacationStatus" ng-value='0'>
                                    <label for="vacationStatus"> On </label>
                                </div>
                                  <div class="radio radio-info radio-inline">
                                    <input type="radio" ng-value='1' id="vacationStatus" ng-model="emp.vacationStatus"  name="vacationStatus">
                                    <label for="vacationStatus"> Off </label>
                                </div>
                                  <div class="form-group m-t-30">
                                <div><button type="submit" style="width: 32%;" class="btn btn-primary waves-effect waves-light">Add Employee</button>
                                <span ng-click="addBack()" style="width: 22%;margin-left: 15px" class="btn btn-primary waves-effect waves-light">Back</span>

                                </div>
                                </div>
                                    </div>
                                </div>    
                                  
                                
                            </form>
                        </div>

                        </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employee -->
    <div class="container" ng-show="editEmp">
        <h1 style="padding: 0px; margin:10px">Employees</h1>
        <div class="row">
            <div class="col-sm-12">
                 <div class="panel panel-primary">
                    <div class="panel-body">
                                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        
                        <div class="m-t-20">
                              <form ng-submit="editEmployee(editemp)" >
                                 <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Personal Information</h4>
                                      <div class="form-group col-md-1">
                                       <input type="text" class="form-control" ng-model="editemp.employeeId" id="employeeId" name="employeeId" placeholder="employeeId" required style="display: none;">

                                      <input type="text" class="form-control" ng-model="editemp.title" id="title" name="title" placeholder="Title" required>
                                    </div>
                                      <div class="form-group col-md-4">
                                      <input type="text" class="form-control" ng-model="editemp.firstName" id="firstName" name="firstName" placeholder="First Name" required>
                                    </div>
                                        <div class="form-group col-md-4">
                                        <input type="text" class="form-control" ng-model="editemp.lastName" id="lastName" name="lastName" placeholder="Last Name" required>
                                    </div>
                                        <div class="form-group col-md-3">
                                      <input type="text" class="form-control" ng-model="editemp.otherName" id="otherName" name="otherName" placeholder="Other Name" required>
                                    </div>
                                        <div class="form-group col-md-3">
                                      <input type="text" class="form-control" ng-model="editemp.position" id="position" placeholder="Position" name="position" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                      <input type="text" class="form-control" placeholder="DD" ng-model="editemp.birthDate"  id="birthDate" name="birthDate" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                      <input type="text" class="form-control" placeholder="MM" ng-model="editemp.birthMonth"  id="birthMonth" name="birthMonth" required>
                                    </div>
                                        <div class="form-group col-md-2">
                                    <input type="text" class="form-control" placeholder="YYYY" ng-model="editemp.birthYear" id="birthYear" name="birthYear" required>
                                    </div>
                                        <div class="col-md-3 m-t-10">
                                        <div class="radio radio-info radio-inline">
                                      <input type="radio" id="gender" ng-model="editemp.gender" value="0" name="gender" checked="checked"  > 
                                      <label for="gender"> Male </label>
                                    </div>
                                        <div class="radio radio-info radio-inline">
                                      <input type="radio" id="gender" ng-model="editemp.gender" value="1" name="gender" >
                                      <label for="gender"> Female </label>
                                    </div>
                                        </div>
                                 </div>

                                <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Contact Information</h4>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="editemp.mobileNo" placeholder="Mobile Number"  id="mobileNo" name="mobileNo" required disabled>
                                  </div>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="editemp.email" placeholder="Email Address"  id="email" name="email" required disabled>
                                  </div>
                                  <div class="form-group col-md-8">
                                    <input type="text" class="form-control" ng-model="editemp.address" placeholder="Full Adress" id="address" name="address" required>
                                  </div>
                                </div>    
                                
                                
                                <div class="row">
                                  <h4 class="m-t-0 m-b-20 col-md-12 panel-body-title">Employment Detail</h4>
                                     <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="editemp.workLocation" placeholder="Work Location" id="workLocation" name="workLocation" required>
                                  </div>
                                    <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" name="dateOfHire"  class="form-control" placeholder="Date of hire" id="datepicker-autoclose1">
                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                    <div class="form-group col-md-3">
                                    <input type="text" class="form-control" ng-model="editemp.salaryAmount" id="salaryAmount" placeholder="Salary Amount" name="salaryAmount" required>
                                  </div>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control" ng-model="editemp.employeeType"  placeholder="Employee Type" id="employeeType" name="employeeType" required>
                                  </div>
                                  <!--   <div class="form-group col-md-6">
                                  <select id="form-field-select-1" ng-model="editemp.bankId" name="bankId"  id="bankId" class="form-control">
                                        <option disabled selected value> -- Select -- </option>
                                        <option value="1">SBI</option>
                                        <option value="2">HDFC</option>
                                  </select>
                              </div> -->
                                  <div class="form-group col-md-12">
                                    <label class="status">Vacation Status</label><br>
                                  <div class="radio radio-info radio-inline">
                                    <input type="radio" id="vacationStatus" ng-model="editemp.vacationStatus" name="vacationStatus" ng-value='0'>
                                    <label for="vacationStatus"> On </label>
                                </div>
                                  <div class="radio radio-info radio-inline">
                                    <input type="radio" ng-value='1' id="vacationStatus" ng-model="editemp.vacationStatus"  name="vacationStatus">
                                    <label for="vacationStatus"> Off </label>
                                </div>
                                  <div class="form-group m-t-30">
                                <div><button type="submit" style="width: 32%" class="btn btn-primary waves-effect waves-light">Update Employee</button>
                                 <span ng-click="editBack()" style="width: 22%;margin-left: 15px" class="btn btn-primary waves-effect waves-light">Back</span>
                                </div>
                                </div>
                                    </div>
                                </div>    
                                  
                                
                            </form>
                        </div>

                        </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>



@endsection
