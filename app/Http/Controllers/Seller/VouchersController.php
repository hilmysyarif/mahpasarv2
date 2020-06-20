<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductModel;
use App\Model\CategoryModel;
use App\Model\Voucher;
use App\User;
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
        $data['vouchers'] = Voucher::latest()->get();
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
            'pin_trx' => ['required']
        ]);

        if ($validate->fails()) {
            return redirect(route('admin.vouchers.create'))->with('error', $validate->messages());            
        }else{
            $check_pin_trx = User::where('id', auth()->user()->id)->where('pin_trx', $request->pin_trx)->first();
            if(empty($check_pin_trx)){
                return redirect(route('admin.vouchers.index'))->with('message', 'PIN Trx salah !');                
            }else{
                for ($i=1; $i <= $request->input('generate_num') ; $i++) { 
                    $voucher_code = $request->input('prefix_code') . $this->generateRandomString($request->input('length')); 

                    // Add function to check the DB after generate
                    // For security to generate double code
                    //
                    $check_voucher = Voucher::where('voucher_code', $voucher_code)->count();
                    if($check_voucher > 0){
                        $voucher_code2 = $request->input('prefix_code') . $this->generateRandomString($request->input('length')); 
                        $check_voucher2 = Voucher::where('voucher_code', $voucher_code2)->count();

                        if($check_voucher2 > 0){
                            $voucher_code3 = $request->input('prefix_code') . $this->generateRandomString($request->input('length')); 
                            $check_voucher3 = Voucher::where('voucher_code', $voucher_code3)->count();

                            if($check_voucher3 > 0){
                                // Skipping after 3 times generate code still exists.
                            }else{
                                $vouchers = new Voucher();            
                                $vouchers->upline_id = $request->input('upline_id');
                                $vouchers->voucher_code = $voucher_code3;
                                $vouchers->save();                                   
                            }
                        }else{
                            $vouchers = new Voucher();            
                            $vouchers->upline_id = $request->input('upline_id');
                            $vouchers->voucher_code = $voucher_code2;
                            $vouchers->save();                                 
                        }
                    }else{
                        $vouchers = new Voucher();            
                        $vouchers->upline_id = $request->input('upline_id');
                        $vouchers->voucher_code = $voucher_code;
                        $vouchers->save();                        
                    }
                }
                return redirect(route('admin.vouchers.index'))->with('message', 'Vouchers success Added !');                
            }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getJson($id)
    {
        $find = Voucher::find($id);
        return json_encode($find);
    }

}
