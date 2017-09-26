<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Paymentdetails;
use App\Employee;
use App\Bankaccounts;
use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;

class PaymentdetailsController extends Controller
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
        $admin = \Illuminate\Support\Facades\Auth::user();
        $paymentdetails = paymentdetails::where('adminId','=',$admin->id)->get();
        $employee = Employee::get();
        
        
        return view('admin.paymentdetails.view', compact('paymentdetails','employee') );
    }

    public function add()
    {
        //echo "Asdasd";
        return view('admin.paymentdetails.add');
    }

    public function destroy($paymentdetailsId){
        
        paymentdetails::destroy($paymentdetailsId);

        Session::flash('flash_message', 'paymentdetails deleted!');

        return redirect('admin/paymentdetails');
    }

    public function edit($paymentdetailsId) {

        $paymentdetails = paymentdetails::findOrFail($paymentdetailsId);

        return view('admin.paymentdetails.edit', compact('paymentdetails'));
    }

    public function update($id, Request $request) {
       
        $inputs = $request->all();

        $store_data['paymentdetailsName'] = $inputs['paymentdetailsName'];
        $store_data['paymentdetailsAmount'] = $inputs['paymentdetailsAmount'];
      
        $paymentdetails = paymentdetails::findOrFail($id);
        $paymentdetails->update($store_data);

        return redirect('admin/paymentdetails');
    }

    public function store(Request $request) {
        $inputs = $request->all();
      
        $store_data['paymentdetailsName'] = $inputs['paymentdetailsName'];
        $store_data['paymentdetailsAmount'] = $inputs['paymentdetailsAmount'];
        
        paymentdetails::create($store_data);
        return redirect('admin/paymentdetails');
        /*view('admin.paymentdetails.add');*/
    }


     public function addPaydetails(Request $request) {
        $inputs = $request->all();
        $admin = \Illuminate\Support\Facades\Auth::user();
        $newDate = date("Y-m-d", strtotime($inputs['payPeriod']));
        $month = explode('-', $newDate);
        $data = paymentdetails::where('adminId','=',$admin->id)->whereMonth('payLastDate', '=', $month[1])->get();
        $data1 = $data->toArray();
       
        if(empty($data1)){
            $employee = Employee::where('adminId','=',$admin->id)->get();
            $wages = 0;
            $tax = 0;

            foreach ($employee as $value) {
                $wages+= $value['monthlySalary'];
                $tax+= $value['monthlyTax'];
            }
            $total = $wages + $tax; 
            $employeeId = json_encode($employee->lists('employeeId'));

            $admin = \Illuminate\Support\Facades\Auth::user();
            $store_data['payLastDate'] = $newDate;
            $store_data['adminId'] = $admin->id;
            $store_data['payPeriod'] = $inputs['payPeriod'];
            $store_data['employeeId'] = $employeeId;
            $store_data['wages'] = $wages;
            $store_data['taxWithheld'] = $tax;
            $store_data['netPayment'] = $total;
            $store_data['totalWages'] = $total;
            
            paymentdetails::create($store_data);
            $paymentdetails = paymentdetails::where('adminId','=',$admin->id)->get();

        }
         return redirect('admin/paymentdetails');
    }
    public function paymentData($payId) {
      
        $paymentdetails = Paymentdetails::findOrFail($payId);
        $ids = substr($paymentdetails['employeeId'], 1);
        $id = explode(',', $ids);
        $admin = \Illuminate\Support\Facades\Auth::user();

        $employee =  DB::table('employee')
                    ->where('adminId','=',$admin->id)
                    ->whereIn('employeeId', $id)
                    ->get();
    
        return view('admin.paymentdetails.details', compact('employee','paymentdetails'));
    }




}
