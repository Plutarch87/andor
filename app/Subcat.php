<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
	protected $fillable = ['name'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
