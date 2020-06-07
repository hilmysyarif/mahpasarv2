<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    public $table ='order_detail';
    public $guarded ='[]';

    public function Order()
    {
        return $this->belongsTo(OrderModel::class, 'id_order', 'id');
    }

    public function Product()
    {
        return $this->hasMany(ProductModel::class, 'id', 'id_product');
    }
}
