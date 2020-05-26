<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CategoryModel;
use App\Model\ProductModel;

class FrontendController extends Controller
{
    public function index()
    {
    	$data['category'] = CategoryModel::all();
    	$data['product'] = ProductModel::all();    
        return view('welcome', $data);
    }

    public function product_list($id)
    {    	
    	$data['category'] = CategoryModel::all();    	
    	$data['product'] = ProductModel::where('id_category', $id)->get();
        return view('welcome', $data);		
    }

    public function cart($id)
    {
        $data['category'] = CategoryModel::all();
        $data['product'] = ProductModel::find($id);
        $data['product_list'] = ProductModel::where('id_category', $id)->get();
        return view('fe.cart', $data);
    }
}
