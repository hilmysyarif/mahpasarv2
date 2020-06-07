<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\OrderDetailModel;
use Illuminate\Http\Request;
use App\Model\OrderModel;
use App\Model\OrderHistoryModel;
use App\Model\OrderStatusModel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $data['order'] = OrderModel::where('user_id', 2)->get();
        // $order_detail = OrderModel::with(['OrderDetail' => function ($qry) {
        //     return $qry
        // }]);dd($order_detail->get());
        $data['order'] = OrderDetailModel::with([
            'Product' => function ($qry) {
                return $qry->where('user_id', auth()->user()->id)->get();
            }] )->get();
        $data['orderstatus'] = OrderStatusModel::all();
        return view('admin.order.index', $data);
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
        //
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
        $update_order = OrderModel::find($id);
        $update_order->status = $request->input('status');
        $update_order->updated_by = auth()->user()->email;
        $update_order->updated_at = date("Y-m-d H:i:s");
        $update_order->update();

        $insert_history = new OrderHistoryModel();
        $insert_history->user_id = auth()->user()->id;
        $insert_history->id_order = $id;
        $insert_history->status = $request->input('status');
        $insert_history->created_by = auth()->user()->email;
        $insert_history->created_at = date("Y-m-d H:i:s");        
        $insert_history->save();

        return redirect(route('admin.order.index'))->with('message', 'Order success updated !');        
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
