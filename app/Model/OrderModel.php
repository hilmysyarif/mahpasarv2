<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    public $table ='order';
    public $guarded ='[]';

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetailModel::class, 'id_order', 'id');
    }
}
