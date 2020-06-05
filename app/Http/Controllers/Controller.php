<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function check_pin_trx(Request $request){
    	$pin_trx = $request->input('pin_trx');
    	$check_pin_trx = User::where('id', auth()->user()->id)->where('pin_trx', $pin_trx)->first();
    	if(empty($check_pin_trx)){
    		return json_encode(['success' => false, 'message' => 'PIN Trx salah.']);
    	}else{
    		return json_encode(['success' => true, 'message' => 'PIN Trx benar.']);
    	}
    }
}
