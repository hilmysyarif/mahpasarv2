<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use tidy;

class ProductModel extends Model
{
    public $table ='product';
    public $guarded ='[]';

    public function category()
    {
    	return $this->belongsTo('App\Model\CategoryModel', 'id_category', 'id');
    }


    public static function ProductJoinCategoryAll()
    {
    	return $data = ProductModel::select('product.*', 'category.category_name as category_name')->join('category', 'product.id_category', '=', 'category.id')->get();
    }
    public function getAllProductsByCategory($c,$type = ""){
        if($type == ""){
        	if(!empty($c)){
	        	return self::where('publish', 1)
	   					->where('id_category', $c)

						->orderBy('id', 'desc')
	        			->get()->toArray();
        	}else{

	        	return self::where('publish', 1)
						->orderBy('id', 'desc')
	        			->get()->toArray();        		
        	}

        }else if($type == "az"){
        	if(!empty($c)){
	        	return self::where('publish', 1)
						->orderBy('name', 'asc')
	   					->where('id_category', $c)
        				->get()->toArray();
        	}else{
	        	return self::where('publish', 1)
						->orderBy('name', 'asc')
        				->get()->toArray();        		
        	}
        }else if($type == "za"){
        	if(!empty($c)){
	        	return self::where('publish', 1)
						->orderBy('name', 'desc')
	   					->where('id_category', $c)
	        			->get()->toArray();
	        }else{
	        	return self::where('publish', 1)
						->orderBy('name', 'desc')
	        			->get()->toArray();	        	
	        }
        }else if($type == "pricemax"){
        	if(!empty($c)){
	        	return self::where('publish', 1)
						->orderBy('price', 'asc')
	   					->where('id_category', $c)
	        			->get()->toArray();
	        }else{
	        	return self::where('publish', 1)
						->orderBy('price', 'asc')
	        			->get()->toArray();	        	
	        }
        }else if($type == "pricemin"){
        	if(!empty($c)){
	        	return self::where('publish', 1)
						->orderBy('price', 'desc')
	   					->where('id_category', $c)
	        			->get()->toArray();
	        }else{
	        	return self::where('publish', 1)
						->orderBy('price', 'desc')
	        			->get()->toArray();	        	
	        }
        }else if($type == "promo"){
        	return self::where('publish', 1)
					->where('promo_price', '!=', 0)
   					->where('id_category', $c)

					->orderBy('id', 'desc')
        			->get()->toArray();
        }
    }

    public function getAllProductsByCategoryPrice($cat, $min, $max){
        if($max == "0"){
        	if(!empty($cat)){
	        	return self::where('publish', 1)
	        			->where('id_category', $cat)
						->where('price', '>=', $min)
	        			->get()->toArray();
	        }else{
	        	return self::where('publish', 1)
						->where('price', '>=', $min)
	        			->get()->toArray();	        	
	        }
        }else{
        	if(!empty($cat)){
	        	return self::where('publish', 1)
						->where('price', '>=', $min)
						->where('id_category', $cat)
						->where('price', '<=', $max)
	        			->get()->toArray();
	        }else{
	        	return self::where('publish', 1)
						->where('price', '>=', $min)
						->where('price', '<=', $max)
	        			->get()->toArray();	        	
	        }

        }
	 }
	 
	 public function ProductOrder()
	 {
			return $this->belongsTo(OrderDetailModel::class);
	 }


}
