<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use App\Currency;
use App\Currencyrate;
use Illuminate\Support\Facades\Input;

class CurrencyController extends Controller {

    public function index() {
        $searchTerm = Input::get('search', '');
        $currency = Currency::SearchByKeyword($searchTerm)->paginate(10000);
        return view('admin.currency.index', compact('currency', 'searchTerm'));
    }

    public function rateList() {
        $rate = Currencyrate::paginate(20);
        $currency = Currency::lists('currency_code', 'currency_code');
        return view('admin.currency.rateList', compact('rate', 'currency'));
    }

    public function create() {
        $currency = Currency::lists('currency_code', 'currency_code');
        return view('admin.currency.setRate', compact('currency'));
    }

    public function store(Request $request) {
        $inputs = $request->all();
        $validation = Validator::make(
                        $inputs, array(
                    'from' => array('required'),
                    'to' => array('required'),
                    'rate' => array('required'),
                        )
        );
        if ($validation->fails()) {
            return redirect('admin/currency/create')
                            ->withErrors($validation)
                            ->withInput();
        }

        $chk = Currencyrate::where(['to' => $inputs['to'], 'from' => $inputs['from']])->first();
        if (!$chk) {
            Currencyrate::create($request->all());
        } else {
            $chk->update($request->all());
        }
        Session::flash('flash_message', 'Rate Saved!');
        return redirect('admin/rate/list');
    }

    public function edit($id) {
        $currency = Currencyrate::findOrFail($id);
        $currency = Currency::lists('currency_code', 'currency_code');
        return view('currency.editRate', compact('currency', 'currency'));
    }

    public function update($id, Request $request) {

        $inputs = $request->all();
        $validation = Validator::make(
                        $inputs, array(
                    'from' => array('required'),
                    'to' => array('required'),
                    'rate' => array('required'),
                        )
        );
        if ($validation->fails()) {
            return redirect('admin/currency/' . $id . '/edit')
                            ->withErrors($validation)
                            ->withInput();
        }

        $chk = Currencyrate::where(['to' => $inputs['to'], 'from' => $inputs['from']])->first();
        if (!$chk) {
            Currencyrate::create($request->all());
        } else {
            $chk->update($request->all());
        }
        Session::flash('flash_message', 'Rate Saved!');
        return redirect('admin/rate/list');
    }

    public function destroy($id) {
        Currencyrate::destroy($id);

        Session::flash('flash_message', 'Rate deleted!');

        return redirect('admin/rate/list');
    }

    public function changeStatus($id, $status) {
        $currency = Currency::findOrFail($id);
        $response = [
            'status' => 0,
            'message'=>'Some error occures, Try again letter.'
        ];
        if ($currency->update(['status' => $status])) {
            $response = [
                'status' => 1,
                'message'=>'Status has been changed.'
            ];
        }
        echo json_encode($response);die;
    }

}
