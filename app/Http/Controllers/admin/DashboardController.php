<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Customer;
use App\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class DashboardController extends Controller
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
        return view('admin.dashboard.view');
    }

    public function add()
    {

//        return view('admin.customer.add');
    }

    public function destroy($customer_id){
        
      
    }

    public function edit($customer_id) {

    }

    public function update($id, Request $request) {
      
    }

    public function store(Request $request) {
        
        /*view('admin.truck_type.add');*/
    }

     public function forgotpassword()
    {
        return view('admin.adminusers.forgotpassword');
    }
    


}
