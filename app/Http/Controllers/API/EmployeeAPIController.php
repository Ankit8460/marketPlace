<?php

namespace App\Http\Controllers\API;

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
use Validator;

class EmployeeAPIController extends Controller
{
   
    public function index(Request $request) {

        $inputs = $request->all();
    
        $validation = Validator::make( $inputs, array(
                                           
                                            )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Please Fillup all the details! '
                        );
        }else{
            $adminId = isset($inputs['adminId']) ? $inputs['adminId'] : '';
            
            if(isset($inputs['employeeId'])){
                $employee = employee::where('employee.employeeId', '=', $inputs['employeeId'])
                                    ->get();
                $Paymentdetails = Employeepays::where('employeeId', '=', $inputs['employeeId'])->orderBy('employeeId', 'DESC')->get();                    
                $Bankdetails = Bankaccounts::where('employeeId', '=', $inputs['employeeId'])->orderBy('employeeId', 'DESC')->get();                    
                
                $employee[0]['PaySlip'] = $Paymentdetails;
                $employee[0]['BankDetails'] = $Bankdetails;

            }else if(isset($inputs['adminId'])){
                $employee = employee::where('adminId', '=', $adminId)->get();
            }else{
                $employee = employee::get();
            }

            if ($employee) {
                $response = array(
                    'status' => '1',
                    'data' => $employee,
                    'message' => 'Employee Listed successfully'
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

    public function store(Request $request) {

        $inputs = $request->all();
        $inputs['adminId'] = $inputs['adminId'];        
    
        $validation = Validator::make( $inputs, array(
                                            'adminId' => array('required'),
                                            /*'bankId' => array('required'),*/
                                            'firstName' => array('required'),
                                            'lastName' => array('required'),
                                            'otherName' => array('required'),
                                            'birthDate' => array('required'),
                                            'birthMonth' => array('required'),
                                            'birthYear' => array('required'),
                                            'gender' => array('required'),
                                            'email' => array('required','unique:employee'),
                                            'dateOfHire' => array('required'),
                                            'salaryAmount' => array('required'),
                                            'employeeType' => array('required'),
                                            'vacationStatus' => array('required'),
                                            'workLocation' => array('required'),
                                            'mobileNo' => array('required','unique:employee'),
                                            'title' => array('required'),
                                            'position' => array('required'),
                                            )
                                    );
        $data = array();
        $validemail = $validation->messages()->toArray();
        
        if ($validation->fails()) {
            if(isset($validemail['email'][0])){
                $response = array(
                                'status' => '0',
                                'data' => $validation->messages(),
                                'message' => $validemail['email'][0],
                            );
            }else if(isset($validemail['mobileNo'][0])){
                $response = array(
                                'status' => '0',
                                'data' => $validation->messages(),
                                'message' => $validemail['mobileNo'][0],
                            );
            }else{
                $response = array(
                                'status' => '0',
                                'data' => $validation->messages(),
                                'message' => 'Please Fillup all the details! '
                            );
            }
        }else{

               /* $bankId = Bank::where('BankName', '=', $inputs['bankId'])->get();*/
               /* $store_data['bankId'] = $inputs['bankId'];*/
                $store_data['adminId'] = $inputs['adminId'];
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
                
                $employee = employee::create($store_data);
                $employees = employee::findOrFail($employee->employeeId);
                
                if ($employees) {
                    $response = array(
                        'status' => '1',
                        'data' => $employees,
                        'message' => 'Employee Added successfully'
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


    public function update(Request $request) {

        $inputs = $request->all();
      
        $validation = Validator::make( $inputs, array(
                                            'adminId' => array('required'),
                                            'employeeId' => array('required'),
                                            'firstName' => array('required'),
                                            'lastName' => array('required'),
                                            'otherName' => array('required'),
                                            'birthDate' => array('required'),
                                            'birthMonth' => array('required'),
                                            'birthYear' => array('required'),
                                            'gender' => array('required'),
                                            'dateOfHire' => array('required'),
                                            'salaryAmount' => array('required'),
                                            'employeeType' => array('required'),
                                            'vacationStatus' => array('required'),
                                            'workLocation' => array('required'),
                                            'title' => array('required'),
                                            'position' => array('required'),
                                          )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Please Fillup all the details!'
                        );
        }else{


               /* $store_data['bankId'] = $inputs['bankId'];*/
                $store_data['firstName'] = $inputs['firstName'];
                $store_data['adminId'] =  $inputs['adminId'];
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
                $id = $inputs['employeeId'];
                $bank = employee::findOrFail($id);
                $bank->update($store_data);

                $employees = employee::findOrFail($inputs['employeeId']);
                
                if ($employees) {
                    $response = array(
                        'status' => '1',
                        'data' => $employees,
                        'message' => 'Employee Updated successfully'
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

    public function addBankAccount(Request $request) {

         $inputs = $request->all();
      
        $validation = Validator::make( $inputs, array(
                                            'bankId' => array('required'),
                                            'employeeId' => array('required'),
                                            'bankAccName' => array('required'),
                                            'accountNo' => array('required'),
                                          )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Please Fillup all the details! '
                        );
        }else{
        
            /*$bankId = Bank::where('BankName', '=', $inputs['BankName'])->get();*/

            $store_data['bankId'] = $inputs['bankId'];
            $store_data['employeeId'] = $inputs['employeeId'];
            $store_data['bankAccName'] = $inputs['bankAccName'];
            $store_data['accountNo'] = $inputs['accountNo'];

            $bankaccounts = bankaccounts::create($store_data);

            if ($bankaccounts) {
                    $response = array(
                        'status' => '1',
                        'data' => $bankaccounts,
                        'message' => 'Employee bank Account added successfully'
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

    public function managePayslip(Request $request) {

         $inputs = $request->all();
      
        $validation = Validator::make( $inputs, array(
                                            'payPeriod' => array('required'),
                                            'employeeId' => array('required'),
                                            'payDate' => array('required'),
                                            'totalPay' => array('required'),
                                          )
                                    );
        $data = array();
        
        if ($validation->fails()) {
            $response = array(
                            'status' => '0',
                            'data' => $validation->messages(),
                            'message' => 'Please Fillup all the details! '
                        );
        }else{
        
            $date=date_create($inputs['payPeriod']);
            $payPeriod1 = date_format($date,"d-M-Y");

            $date1=date_create($inputs['payDate']);
            $payPeriod = date_format($date1,"d-M-Y");

            $store_data['payDate'] = $payPeriod;
            $store_data['totalPay'] = $inputs['totalPay'];
            $store_data['payPeriod'] = $payPeriod1;
            $store_data['employeeId'] = $inputs['employeeId'];
            
            $data = employeePays::create($store_data);

            if ($data) {
                    $response = array(
                        'status' => '1',
                        'data' => $data,
                        'message' => 'Employee PaySlip added successfully'
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

    public function bankList() {

        $data = Bank::get();
       
        if ($data) {
            $response = array(
                'status' => '1',
                'data' => $data,
                'message' => 'Banks listed successfully'
            );
        } else {
            $response = array(
                'status' => '0',
                'data' => array(),
                'message' => 'Some error occurs,try again letter.'
            );
        }
        return json_encode($response);
    }
}
