<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CategoryModel;
use App\Model\ProductModel;
use App\Model\Banner;
use App\Model\Setting;
use App\Model\Sosmed;
use App\Model\Rekening;
use App\Model\Page;
use App\Model\Testimoni;


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

        if(!isset($_COOKIE['ref_code'])){
            if(isset($_GET['ref_code']) && !empty($_GET['ref_code'])) {
                $ref = trim($_GET['ref_code']);
                setcookie('ref_code', $ref, time() + 2147483647);
            }else{
                setcookie('ref_code', 'admin', time() + 2147483647);
            }
            return redirect('/');
        }

        return view('welcome', $data);
    }

    public function product_list($id = '')
    {    	
        $data['banner']  = Banner::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['getPromo'] = ProductModel::where('is_promo', 1)->inRandomOrder()->limit(6)->get();
    	$data['category'] = CategoryModel::all();    	
    	$data['product'] = ProductModel::where('id_category', $id)->get();
        $data['best'] = ProductModel::where('is_promo', 0)->inRandomOrder()->limit(6)->get();
        $data['recent'] = ProductModel::orderBy('created_at', 'desc')->limit(12)->get();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['rekening'] = Rekening::all();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();

        $data['ob'] = !empty($_GET['ob']) ? $_GET['ob'] : '';
        $data['maxprice'] = !empty($_GET['maxprice']) ? $_GET['maxprice'] : '';
        $data['minprice'] = !empty($_GET['minprice']) ? $_GET['minprice'] : '';
        $data['promo'] = !empty($_GET['promo']) ? $_GET['promo'] : '';
        $data['condition'] = !empty($_GET['condition']) ? $_GET['condition'] : '';
        if($data['ob'] != NULL){
            if($data['ob'] == "latest"){
                $data['titleHead'] = 'Urutkan > Terbaru';
                $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "");
            }else if($data['ob'] == "az"){
                $data['titleHead'] = 'Urutkan > Abjad A-Z';
                $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "az");
            }else if($data['ob'] == "za"){
                $data['titleHead'] = 'Urutkan > Abjad Z-A';
                $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "za");
            }else if($data['ob'] == "pmin"){
                $data['titleHead'] = 'Urutkan > Harga Terendah';
                $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "pricemax");
            }else if($data['ob'] == "pmax"){
                $data['titleHead'] = 'Urutkan > Harga Tertinggi';
                $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "pricemin");
            }
        }else if($data['minprice'] != NULL || $data['maxprice'] != NULL){
            if($data['minprice'] == ""){
                $data['minprice'] = "0";
                $data['titleHead'] = 'Harga > ' . $data['minprice'] . ' - ' . $data['maxprice'];
            }else if($data['maxprice'] == ""){
                $data['maxprice'] = "0";
                $data['titleHead'] = 'Harga > ' . $data['minprice'] . " -->";
            }else if($data['maxprice'] < $data['minprice']){
                $data['maxprice'] = "0";
                $data['titleHead'] = 'Harga > ' . $data['minprice'] . " -->";
            }else{
                $data['titleHead'] = 'Harga > ' . $data['minprice'] . ' - ' . $data['maxprice'];
            }
            $data['products'] = (new ProductModel)->getAllProductsByCategoryPrice($id, $data['minprice'], $data['maxprice']);
        }else if($data['promo'] != NULL && $data['promo'] == "true"){
            $data['titleHead'] = 'Penawaran > Promo';
            $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "promo");
        }else{
            $data['titleHead'] = '';
            $data['products'] = (new ProductModel)->getAllProductsByCategory($id, "");
        }
        $data['title'] = 'Semua Produk - ' . config('app.name');
        $data['nameCat'] = !empty($id) ? (new CategoryModel)->getCategoryById($id)->category_name : 'Semua Produk';
        return view('fe.category_detail', $data);		
    }

    public function cart($id)
    {
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['product'] = ProductModel::find($id);
        $data['category'] = CategoryModel::all();       
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        $data['product_list'] = ProductModel::where('id_category', $id)->get();
        return view('fe.cart', $data);
    }

    public function about()
    {
        $slug = 'about';

        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
    }

    public function contact()
    {
        $slug = 'contact';

        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
        
    }

    public function policy()
    {
        $slug = 'privacy-policy';
        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
        
    }
    public function terms()
    {
        $slug = 'terms';
        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
        
    }

    public function shopping_help()
    {
        $slug = 'shopping-help';
        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
        
    }

    public function pengiriman_barang()
    {
        $slug = 'pengiriman-barang';
        $data['content']  = Page::where('slug', $slug)->first();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.pages', $data);
        
    }

    public function testimoni()
    {
        $data['testi']  = Testimoni::all();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        // return $data['content'];
        return view('fe.testimoni', $data);
        
    }

    public function promo()
    {
        $data['promo'] = ProductModel::where('is_promo', 1)->inRandomOrder()->get();
        $data['category'] = CategoryModel::all();
        $data['setting'] = Setting::find(1);
        $data['sosmed'] = Sosmed::all();
        $data['categoriesLimit'] = CategoryModel::limit(5)->get();
        $data['footerinfo'] = (new Setting)->getFooterInfo();
        $data['footerhelp'] = (new Setting)->getFooterHelp();
        $data['rekening'] = Rekening::all();
        return view('fe.promo', $data);
        
    }

}
