<?php

namespace App;

use App\Category;
use App\Subcat;
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

    public function subcat()
    {
    	return $this->belongsTo(Subcat::class);
    }
}
