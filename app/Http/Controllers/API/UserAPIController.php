<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Currency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use \Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAPIController extends Controller {

   
    public function login(Request $request) {
        
        $input = $request->all();
        $input_raw = $input;        

        $validation = Validator::make( $input, array(
                                            
                                            'email' => array('required'),
                                            'password' => array('required'),
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
            $email = $input['email'];
            $password = $input['password'];
            try {

                $user = User::where('email', $email)->first();
                                  
            } catch (Exception $e) {
                
            }
            $response = [
                'status' => '0',
                'message' => 'Admin Email does not exist'
            ];
            $user_data = isset($user) ? $user : '';
            $hash =  isset($user_data->password) ? $user_data->password : '';

                if (isset($user) && $user) {
                    
                    if (password_verify($input['password'], $hash)) {
                        
                        $data = $user->toArray();

                            $response = [
                                'status' => '1',
                                'message' => 'Login successful',
                                'data' => $data,
                            ];
                            
                }else{
                     $response = [
                        'status' => '0',
                        'message' => 'These credentials do not match our records.'
                    ];
                }
            }
        }
        return json_encode($response);
    }

    public function register(Request $request) {

        $input = $request->all();
        $input_raw = $input;

        $validation = Validator::make($input, array(
                                            'name' => array('required'),
                                            'email' => array('required', 'email', 'unique:users'),
                                            'mobile_no' => array('required', 'unique:users'),
                                            'password' => array('required'),
                                            'password' => array('required'),
                                        )
                                    );
        $data = array();
        
        if ($validation->fails()) {
        $email = $validation->messages()->toArray();
            if(isset($email['email'])){
                $response = array(
                    'status' => '0',
                    'error' => 'The email has already been taken.',
                    'data' => $validation->messages(),
                    'message' => 'Validation error'

                );
            }else if(isset($email['mobile_no'])){
                $response = array(
                    'status' => '0',
                    'error' => 'The mobile no has already been taken.',
                    'data' => $validation->messages(),
                    'message' => 'Validation error'

                );
            }else{
                 $response = array(
                    'status' => '0',
                    'data' => $validation->messages(),
                    'message' => 'Validation error'

                );
            }
        }else{
            
            if($input['password'] == $input['password']){

                if (isset($input['password'])) {
                    $input['password'] = Hash::make($input['password']);
                }

                $user = User::create($input);

                if ($user) {

                    $data = $user->toArray();

                        $response = [
                            'status' => '1',
                            'message' => 'User registered successfully',
                            'data' => $data,
                        ];

                } else {
                    $response = array(
                        'status' => '0',
                        'message' => 'Some error occurs,try again letter.'
                    );
                }
            }else{
                 $response = array(
                        'status' => '0',
                        'message' => 'Password dont match'
                    );
            }
        }
        return json_encode($response);
    }

    public function forgotpassword(Request $request) 
    {
        $input = $request->all();

            $email = isset($input['email']) ? $input['email'] : '';
            if ($email != "") {
                try {
                    $customer = user::where('email', $email)->first();
                } catch (Exception $e) {
                    
                }
                $response = [
                    'status' => '0',
                    'message' => 'Email does not exist.'
                ];

                if (isset($customer) && $customer)
                {
                    $token = base64_encode($email.'/-/'.date("Y-m-d H:i:s"));
                    $token = Crypt::encrypt($email);
                    //echo  Crypt::decrypt($token);

                    $date = date("Y-m-d H:i:s");
                    $rand = strtotime($date);

                    $unique_str = rand(10000,99999);
                    $store_data['password'] = Hash::make($unique_str);

                    $customer->update($store_data);
                    $emailLink = $unique_str;
                    
                    $userData = $customer->toArray();

                    $data = [
                        "customer"=>$userData,
                        "emailLink" =>$emailLink
                    ];

                    try {
                            Mail::queue('auth.emails.forgotPwdCustomer', array("data" => $data), function ($message) use ($data) {

                                $message->from('ravi@atoatechnologies.com', 'CR-HUB');

                                $message->to($data["customer"]["email"])->subject('Forgot Password');
                            });
                    } 
                    catch (Exception $e) {
                    
                    }
                        
                    $response = [
                    'status' => '1',
                    'message' => 'Email Sent Successfully.',
                    ];    
                }
            } else {
                $response = array(
                    "status" => "0",
                    "data" => "",
                    "message" => "Email can not be blank."
                );
            }

        return json_encode($response);
    }


    public function changePassword(Request $request){
        
        $input = $request->all();
       
        $oldPassword = isset($input['oldPassword']) ? $input['oldPassword'] : '';
        $password = isset($input['password']) ? $input['password'] : '';
        $email = isset($input['email']) ? $input['email'] : '';

        if($password != ""){
            try{                
                $token = base64_encode($email.'/-/'.date("Y-m-d H:i:s"));
                $token = Crypt::encrypt($email);
                
                $user = user::where('email', $email)->first();
                
                $hash =  isset($user->password) ? $user->password : '';

                if($user && !empty($user)){

                    if (password_verify($oldPassword, $hash)) {

                        $user->password = Hash::make($password);
                        $user->save();
                        $response = array(
                                "status" => "1",
                                "data" => "",
                                "message" => "Password changed successfully."
                            );
                    }else{
                         $response = array(
                            "status" => "0",
                            "message" => "Invalid password."
                        );
                    }
                }else{
                    $response = array(
                        "status" => "0",
                        "data" => "",
                        "message" => "Something went wrong please try again."
                    );
                }
            }catch(Exception $e){
                
            }
        }else{
            $response = array(
                "status" => "0",
                "data" => "",
                "message" => "Something went wrong please try again."
            );
        }
        return json_encode($response);
    }

     public function update(Request $request) {

        $inputs = $request->all();
        $inputs['id'] = $inputs['id'];        
    
        $validation = Validator::make( $inputs, array(
                                            'id' => array('required'),
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

            $id = $inputs['id'];
            $customer = user::findOrFail($id);
            $user = $customer->update($inputs);

            if ($customer) {
                $response = array(
                    'status' => '1',
                    'data' => $inputs,
                    'message' => 'Admin updated successfully'
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
}
