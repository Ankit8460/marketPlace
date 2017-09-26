<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Employee;
use App\Bankaccounts;
use App\Bank;
use App\User;
use App\Paymentdetails;
use App\EmployeePays;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class EmployeeApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Asdasd";
        $admin = \Illuminate\Support\Facades\Auth::user();
        $employee = employee::where('adminId', '=', $admin->id)->get();
        
        return response($employee);
    }
    public function show()
    {
         $banks = Bank::get();

        return view('admin.employee.add', compact('banks'));
    }

    public function add()
    {
        //echo "Asdasd";
        $banks = Bank::get();

        return view('admin.employee.add', compact('banks'));
    }

    public function destroy($employeeId){
        
        employee::destroy($employeeId);

        Session::flash('flash_message', 'employee deleted!');

        return redirect('admin/employee');
    }

    public function edit($employeeId) {

        $banks = Bank::get();
        $employee = employee::findOrFail($employeeId);

        return view('admin.employee.edit', compact('employee','banks'));
    }

    public function update($id, Request $request) {
       
        $inputs = $request->all();
        $bankId = Bank::where('BankName', '=', $inputs['bankId'])->get();
        $admin = \Illuminate\Support\Facades\Auth::user();
        $store_data['bankId'] = $bankId[0]['BankId'];
        $store_data['firstName'] = $inputs['firstName'];
        $store_data['adminId'] = $admin->id;
        $store_data['lastName'] = $inputs['lastName'];
        $store_data['otherName'] = $inputs['otherName'];
        $store_data['birthDate'] = $inputs['birthDate'];
        $store_data['birthMonth'] = $inputs['birthMonth'];
        $store_data['birthYear'] = $inputs['birthYear'];
        $store_data['gender'] = $inputs['gender'];
        $store_data['address'] = $inputs['address'];
        $store_data['email'] = $inputs['email'];
        $store_data['dateOfHire'] = $inputs['dateOfHire'];
        $store_data['salaryAmount'] = $inputs['salaryAmount'];
        $store_data['employeeType'] = $inputs['employeeType'];
        $store_data['vacationStatus'] = $inputs['vacationStatus'];
        $store_data['workLocation'] = $inputs['workLocation'];
        $store_data['mobileNo'] = $inputs['mobileNo'];
        $store_data['title'] = $inputs['title'];
        $store_data['position'] = $inputs['position'];

        $store_data['monthlySalary'] = $inputs['salaryAmount'];
        $store_data['yearlySalary'] = $inputs['salaryAmount']*12;

        if($store_data['yearlySalary'] <= 300000){

            $store_data['yearlyTax'] = ($store_data['yearlySalary']*7)/100;

        }elseif ($store_data['yearlySalary'] > 300000 && $store_data['yearlySalary'] <= 600000) {

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (($store_data['yearlySalary']-300000)*11)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2;

        }elseif($store_data['yearlySalary'] > 600000 && $store_data['yearlySalary'] <= 1100000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (($store_data['yearlySalary']-600000)*15)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3;

        }elseif($store_data['yearlySalary'] > 1100000 && $store_data['yearlySalary'] <= 1600000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (($store_data['yearlySalary']-1100000)*19)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3+$taxslab4;

        }elseif($store_data['yearlySalary'] > 1600000 && $store_data['yearlySalary'] <= 3200000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (500000*19)/100;
            $taxslab5 = (($store_data['yearlySalary']-1600000)*21)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3+$taxslab4+$taxslab5;

        }else{

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (500000*19)/100;
            $taxslab5 = (500000*21)/100;
            $taxslab6 = (($store_data['yearlySalary']-3200000)*24)/100;
            $store_data['yearlyTax'] = $taxslab1+$taxslab2+$taxslab3+$taxslab4+$taxslab5+$taxslab6;
        }
        $store_data['yearlyTax'] = round($store_data['yearlyTax']);
        $store_data['monthlyTax'] = round($store_data['yearlyTax']/12);

        $bank = employee::findOrFail($id);
        $bank->update($store_data);

        return redirect('admin/employee');
    }

    public function addAccount($id, Request $request) {
       
        $inputs = $request->all();
        $bankId = Bank::where('BankName', '=', $inputs['bankId'])->get();

        $store_data['bankId'] = $bankId[0]['BankId'];
        $store_data['employeeId'] = $id;
        $store_data['bankAccName'] = $inputs['bankAccName'];
        $store_data['accountNo'] = $inputs['accountNo'];

        bankaccounts::create($store_data);
        return redirect('admin/employeeDetails/'.$id);
    }


    public function store(Request $request) {
        $inputs = $request->all();
        $bankId = Bank::where('BankName', '=', $inputs['bankId'])->get();
        $admin = \Illuminate\Support\Facades\Auth::user();
       
        $store_data['bankId'] = $bankId[0]['BankId'];
        $store_data['adminId'] = $admin->id;
        $store_data['firstName'] = $inputs['firstName'];
        $store_data['lastName'] = $inputs['lastName'];
        $store_data['otherName'] = $inputs['otherName'];
        $store_data['birthDate'] = $inputs['birthDate'];
        $store_data['birthMonth'] = $inputs['birthMonth'];
        $store_data['birthYear'] = $inputs['birthYear'];
        $store_data['gender'] = $inputs['gender'];
        $store_data['address'] = $inputs['address'];
        $store_data['email'] = $inputs['email'];
        $store_data['dateOfHire'] = $inputs['dateOfHire'];
        $store_data['salaryAmount'] = $inputs['salaryAmount'];
        $store_data['employeeType'] = $inputs['employeeType'];
        $store_data['vacationStatus'] = $inputs['vacationStatus'];
        $store_data['workLocation'] = $inputs['workLocation'];
        $store_data['mobileNo'] = $inputs['mobileNo'];
        $store_data['title'] = $inputs['title'];
        $store_data['position'] = $inputs['position'];

        $store_data['monthlySalary'] = $inputs['salaryAmount'];
        $store_data['yearlySalary'] = $inputs['salaryAmount']*12;

        if($store_data['yearlySalary'] <= 300000){

            $store_data['yearlyTax'] = ($store_data['yearlySalary']*7)/100;

        }elseif ($store_data['yearlySalary'] > 300000 && $store_data['yearlySalary'] <= 600000) {

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (($store_data['yearlySalary']-300000)*11)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2;

        }elseif($store_data['yearlySalary'] > 600000 && $store_data['yearlySalary'] <= 1100000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (($store_data['yearlySalary']-600000)*15)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3;

        }elseif($store_data['yearlySalary'] > 1100000 && $store_data['yearlySalary'] <= 1600000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (($store_data['yearlySalary']-1100000)*19)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3+$taxslab4;

        }elseif($store_data['yearlySalary'] > 1600000 && $store_data['yearlySalary'] <= 3200000){

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (500000*19)/100;
            $taxslab5 = (($store_data['yearlySalary']-1600000)*21)/100;
            $store_data['yearlyTax'] =  $taxslab1+$taxslab2+$taxslab3+$taxslab4+$taxslab5;

        }else{

            $taxslab1 = (300000*7)/100;
            $taxslab2 = (300000*11)/100;
            $taxslab3 = (500000*15)/100;
            $taxslab4 = (500000*19)/100;
            $taxslab5 = (500000*21)/100;
            $taxslab6 = (($store_data['yearlySalary']-3200000)*24)/100;
            $store_data['yearlyTax'] = $taxslab1+$taxslab2+$taxslab3+$taxslab4+$taxslab5+$taxslab6;
        }

        $store_data['yearlyTax'] = round($store_data['yearlyTax']);
        $store_data['monthlyTax'] = round($store_data['yearlyTax']/12);
        
        employee::create($store_data);
        return redirect('admin/employee');
        /*view('admin.employee.add');*/
    }

    public function addPaymentdetails($id, Request $request) {
       
        $inputs = $request->all();
        $date=date_create($inputs['payPeriod']);
        $payPeriod1 = date_format($date,"d-M-Y");

        $date1=date_create($inputs['payDate']);
        $payPeriod = date_format($date1,"d-M-Y");

        $store_data['payDate'] = $payPeriod;
        $store_data['totalPay'] = $inputs['totalPay'];
        $store_data['payPeriod'] = $payPeriod1;
        $store_data['employeeId'] = $id;
        
        $data = employeePays::create($store_data);
        return redirect('admin/employeeDetails/'.$id);
    }
    
    public function employeeDetails($employeeId) {

        $banks = Bank::get();
        $Paymentdetails = Employeepays::where('employeeId', '=', $employeeId)->orderBy('employeeId', 'DESC')->paginate(15);
        $bankaccounts = Bankaccounts::where('employeeId', '=', $employeeId)->orderBy('employeeId', 'DESC')->paginate(15);
        $employee = Employee::findOrFail($employeeId);

        return view('admin.employee.details', compact('employee','banks','bankaccounts','Paymentdetails'));
    }

    public function bankList() {
        $banks = Bank::get();

    }

}
