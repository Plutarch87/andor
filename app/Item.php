<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name'];

    protected $casts = [
        'category_id' => 'int',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
