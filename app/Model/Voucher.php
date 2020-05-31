<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $table ='vouchers';
    public $guarded ='[]';

    public function upline() {
    	return $this->belongsTo('App\User', 'upline_id', 'id');
    }

    public function claim_user() {
    	return $this->belongsTo('App\User', 'claim_id', 'id');
    }

}
