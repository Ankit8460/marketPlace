<?php

namespace App\Http\Controllers\API;

use App\Paymentdetails;
use App\Employee;
use App\Bankaccounts;
use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Validator;

class RunpayAPIController extends Controller
{
   
    public function index(Request $request)
    {
        $inputs = $request->all();
        $inputs['adminId'] = $inputs['adminId'];        
    
        $validation = Validator::make( $inputs, array(
                                            'adminId' => array('required'),
                                            )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Validation error'
                        );
        }else{
            $adminId = $inputs['adminId'];
            
            if(isset($inputs['payId'])){
                 $employee = Paymentdetails::findOrFail($inputs['payId']);
                  /*  $ids = substr($paymentdetails['employeeId'], 1);
                    $id = explode(',', $ids);
                    $admin = \Illuminate\Support\Facades\Auth::user();

                    $employee =  DB::table('employee')
                                ->where('adminId','=',$inputs['adminId'])
                                ->whereIn('employeeId', $id)
                                ->get();       */          
            }else{
                 $employee = paymentdetails::where('adminId','=',$inputs['adminId'])->get();      
            }

            if ($employee) {
                $response = array(
                    'status' => '1',
                    'data' => $employee,
                    'message' => 'Runpay Listed successfully'
                );
            } else {
                $response = array(
                    'status' => '0',
                    'data' => array(),
                    'message' => 'Some error occurs,try again letter.'
                );
            }

        }

       return json_encode($response);
    }


    public function employeeList(Request $request)
    {
        $inputs = $request->all();
        $inputs['adminId'] = $inputs['adminId'];        
    
        $validation = Validator::make( $inputs, array(
                                            'adminId' => array('required'),
                                            'payId' => array('required'),
                                            )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Validation error'
                        );
        }else{
            $adminId = $inputs['adminId'];
            
                $paymentdetails = Paymentdetails::findOrFail($inputs['payId']);
                $ids = substr($paymentdetails['employeeId'], 1);
                $id = explode(',', $ids);
                $admin = \Illuminate\Support\Facades\Auth::user();

                $employee =  DB::table('employee')
                            ->where('adminId','=',$inputs['adminId'])
                            ->whereIn('employeeId', $id)
                            ->get();                 
            
            if ($employee) {
                $response = array(
                    'status' => '1',
                    'data' => $employee,
                    'message' => 'Runpay Listed successfully'
                );
            } else {
                $response = array(
                    'status' => '0',
                    'data' => array(),
                    'message' => 'Some error occurs,try again letter.'
                );
            }

        }

       return json_encode($response);
    }


     public function addNewPayment(Request $request) {

        $inputs = $request->all();
        $validation = Validator::make( $inputs, array(
                                            'adminId' => array('required'),
                                            'payPeriod' => array('required'),
                                            )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Validation error'
                        );
        }else{


            $newDate = date("Y-m-d", strtotime($inputs['payPeriod']));
            $month = explode('-', $newDate);
            $data = paymentdetails::where('adminId','=',$inputs['adminId'])->WhereYear('payLastDate', '=', $month[0])->WhereMonth('payLastDate', '=', $month[1])->get();
            $data1 = $data->toArray();
           
            if(empty($data1)){
                $employee = Employee::where('adminId','=',$inputs['adminId'])->get();
                $wages = 0;
                $tax = 0;

                foreach ($employee as $value) {
                    $wages+= $value['monthlySalary'];
                    $tax+= $value['monthlyTax'];
                }
                $total = $wages + $tax; 
                $employeeId = json_encode($employee->lists('employeeId'));

                $store_data['payLastDate'] = $newDate;
                $store_data['adminId'] = $inputs['adminId'];
                $store_data['payPeriod'] = $inputs['payPeriod'];
                $store_data['employeeId'] = $employeeId;
                $store_data['wages'] = $wages;
                $store_data['taxWithheld'] = $tax;
                $store_data['netPayment'] = $total;
                $store_data['totalWages'] = $total;

                $paymentdetails1 = paymentdetails::create($store_data);
                
                $paymentdetails = paymentdetails::where('payId','=',$paymentdetails1->payId)->get();

                if ($paymentdetails) {
                    $response = array(
                        'status' => '1',
                        'data' => $paymentdetails,
                        'message' => 'Runpay New Payment added successfully.'
                    );
                } else {
                    $response = array(
                        'status' => '0',
                        'data' => array(),
                        'message' => 'Some error occurs,try again letter.'
                    );
                }
            }else{
                 $response = array(
                        'status' => '0',
                        'data' => array(),
                        'message' => 'Payment has already been done.'
                    );
            }
        }

        return json_encode($response);
    }


}
