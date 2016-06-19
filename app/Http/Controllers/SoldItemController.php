<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SoldItem;

class SoldItemController extends Controller
{
    public function store(Request $request)
    {
    	$soldItem = SoldItem::create([
    		//validate
    		'buyer_fullname' => $request->fullname,
    		'buyer_info' => $request->buyerinfo,
    		'sumtotal' => $request->sumtotal,
    		'created_at' => date("Y-m-d H:i:s"),
    		]);
    	return response()->json('BRATEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE');
    }
}
