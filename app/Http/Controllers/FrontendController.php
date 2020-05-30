<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CategoryModel;
use App\Model\ProductModel;
use App\Model\Banner;
use App\Model\Setting;
use App\Model\Sosmed;
use App\Model\Rekening;


class FrontendController extends Controller
{
    public function index()
    {
    	$data['category'] = CategoryModel::all();
    	$data['product'] = ProductModel::all();  
        $data['banner']  = Banner::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['getPromo'] = ProductModel::where('is_promo', 1)->inRandomOrder()->limit(6)->get();
        $data['best'] = ProductModel::where('is_promo', 0)->inRandomOrder()->limit(6)->get();
        $data['recent'] = ProductModel::orderBy('created_at', 'desc')->limit(12)->get();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['rekening'] = Rekening::all();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();

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
