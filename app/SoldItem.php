<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    protected $fillable = ['buyer_fullname', 'buyer_info', 'sumtotal', 'created_at'];
    public $timestamps = false;
    public $dateFormat = 'U';
}
