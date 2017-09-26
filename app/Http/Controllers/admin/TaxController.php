<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Tax;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class TaxController extends Controller
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
        $tax = tax::get();
        
        return view('admin.tax.view', compact('tax') );
    }

    public function add()
    {
        //echo "Asdasd";
        return view('admin.tax.add');
    }

    public function destroy($taxId){
        
        tax::destroy($taxId);

        Session::flash('flash_message', 'tax deleted!');

        return redirect('admin/tax');
    }

    public function edit($taxId) {

        $tax = tax::findOrFail($taxId);

        return view('admin.tax.edit', compact('tax'));
    }

    public function update($id, Request $request) {
       
        $inputs = $request->all();

        $store_data['taxName'] = $inputs['taxName'];
        $store_data['taxAmount'] = $inputs['taxAmount'];
      
        $tax = tax::findOrFail($id);
        $tax->update($store_data);

        return redirect('admin/tax');
    }

    public function store(Request $request) {
        $inputs = $request->all();
      
        $store_data['taxName'] = $inputs['taxName'];
        $store_data['taxAmount'] = $inputs['taxAmount'];
        
        tax::create($store_data);
        return redirect('admin/tax');
        /*view('admin.tax.add');*/
    }


}
