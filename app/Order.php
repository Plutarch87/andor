<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function cart()
    {
    	return $this->belongsTo('App\Cart');
    }
}
