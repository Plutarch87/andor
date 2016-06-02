<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
	protected $fillable = ['name', 'category_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function items()
    {
    	return $this->hasMany(Item::class);
    }
}
