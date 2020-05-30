<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    public $table ='category';
    public $guarded ='[]';

    public function getCategoryById($id){
    	return self::where('id', $id)->first();
    }

}
