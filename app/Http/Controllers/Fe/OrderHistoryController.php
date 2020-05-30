<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderHistoryModel;
use App\Model\OrderModel;
use App\Model\CategoryModel;
use App\Model\Setting;
use App\Model\Sosmed;
use App\Model\Rekening;



class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = CategoryModel::all();       
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['rekening'] = Rekening::all();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();

        $data['order'] = OrderModel::where('user_id', auth()->user()->id)->get();
        return view('fe.history.index', $data);
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
        $data['history'] = OrderHistoryModel::select('order_history.*', 'order_status.status as status_name', 'order_status.ket as status_ket')->join('order_status', 'order_history.status', '=', 'order_status.id')->where('order_history.id_order', '=', $id)->get();
        return view('fe.history.show', $data);
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
