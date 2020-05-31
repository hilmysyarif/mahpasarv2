<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductModel;
use App\Model\CategoryModel;
use App\Model\Voucher;
use Illuminate\Support\Facades\Validator;
use Hashids\Hashids;


class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vouchers'] = Voucher::all();
        return view('admin.vouchers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['users'] = \App\User::all();
        return view('admin.vouchers.create', $data);
    }

    public function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validate = Validator::make($request->except('_token'), [
            'prefix_code' => ['required', 'string'],
            'length' => ['required'],
            'generate_num' => ['required', 'min:1'],
        ]);

        if ($validate->fails()) {
            return redirect(route('admin.vouchers.create'))->with('error', $validate->messages());            
        }else{
            for ($i=1; $i <= $request->input('generate_num') ; $i++) { 
                $vouchers = new Voucher();            
                $vouchers->upline_id = $request->input('upline_id');
                $voucher_code = $request->input('prefix_code') . $this->generateRandomString($request->input('length')); 
                $vouchers->voucher_code = $voucher_code;
                $vouchers->save();

            }
            return redirect(route('admin.vouchers.index'))->with('message', 'Vouchers success Added !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Voucher::find($id)->delete();
        return redirect(route('admin.vouchers.index'))->with('message', 'Vouchers success Deleted !');

    }
}
