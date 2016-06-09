<?php

namespace App;

use App\Category;
use App\Subcat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'price', 'sifra', 'img', 'akcija', 'popularno'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function subcat()
    {
    	return $this->belongsTo(Subcat::class);
    }
}
