<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CartModel;
use App\Model\CartDetailModel;
use App\User;
use App\Model\ProductModel;
use App\Model\OrderModel;
use App\Model\OrderDetailModel;
use App\Model\OrderHistoryModel;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $get_order = CartModel::where('user_id', auth()->user()->id)->first();
        $get_order_detail = CartDetailModel::where('id_cart', $get_order->id)->get();
 		
 		$create_order = new OrderModel();
 		$create_order->user_id = auth()->user()->id;
 		$create_order->total_price = $get_order->total_price;
 		$create_order->status = $get_order->status;
        $create_order->created_by =  auth()->user()->email;
        $create_order->created_at =  date("Y-m-d H:i:s");
        $create_order->save();
        $create_order->id;
        
        foreach ($get_order_detail as $key => $value) {
        	$insert_order_detail = new OrderDetailModel();
        	$insert_order_detail->id_order = $create_order->id;
        	$insert_order_detail->id_product = $value->id_product;        	
        	$insert_order_detail->qty = $value->qty;        	
        	$insert_order_detail->price = $value->price;        	
        	$insert_order_detail->subtotal = $value->subtotal;        	
	        $insert_order_detail->created_by =  auth()->user()->email;
	        $insert_order_detail->created_at =  date("Y-m-d H:i:s");
	        $insert_order_detail->save();       	

        }  

        $delete_detail = CartDetailModel::where('id_cart', $get_order->id)->delete();
        $delete_cart = CartModel::where('user_id', auth()->user()->id)->delete();

        $create_history = new OrderHistoryModel();
        $create_history->user_id = auth()->user()->id;        
        $create_history->id_order = $create_order->id;
        $create_history->status = 1;
        // $create_history->ket = "Belum Bayar"; //on progress, dikirim, selesai, dibatalkan, pengembalian
        $create_history->save();

        return redirect(route('fe.history.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
