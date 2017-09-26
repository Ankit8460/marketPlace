<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Currency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;

class BanksController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index() {
        $banks = Bank::paginate(15);

        return view('admin.banks.index', compact('banks'));
    }

    public function fundAccount() {
        $banks = Bank::paginate(15);

        return view('admin.fundAccount.view', compact('banks'));
    }

     public function retirementFund() {
        $banks = Bank::paginate(15);

        return view('admin.retirementFund.view', compact('banks'));
    }

    public function payHistory() {
        $banks = Bank::paginate(15);

        return view('admin.payHistory.view', compact('banks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create() {
        $country = Currency::lists('countryName', 'currencyId');
        return view('admin.banks.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request) {
        $inputs = $request->all();
        /*print_r($inputs);*/
       
        $store_data['bankName'] = $inputs['bankName'];
        $store_data['bankCode'] = $inputs['bankCode'];
        $store_data['currencyId'] = isset($inputs['currencyId']) ? $inputs['currencyId']: '';
        //$store_data['hair_style_image'] = $image_name;
        
        
        Bank::create($store_data);
        return redirect('admin/banks');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id) {
        $bank = Bank::findOrFail($id);

        return view('admin.banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id) {

        $banks = Bank::findOrFail($id);
        $country = Currency::lists('countryName', 'currencyId');
        return view('admin.banks.edit', compact('banks', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request) {
        $inputs = $request->all();

        $store_data['BankName'] = $inputs['BankName'];
        $store_data['bankCode'] = $inputs['bankCode'];
        $store_data['currencyId'] = $inputs['currencyId'];

        $bank = Bank::findOrFail($id);
        $bank->update($store_data);
        return redirect('admin/banks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id) {
        Bank::destroy($id);

        Session::flash('flash_message', 'Bank deleted!');

        return redirect('admin/banks');
    }

}
