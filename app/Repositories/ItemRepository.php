<?php 

namespace App\Repositories;

use App\Category;
use App\Item;

class ItemRepository
{
	public function forCategory(Category $category)
	{
		return Item::where('category_id', '=', $category_id)
                    ->orderBy('created_at', 'asc')
                    ->get();
	}
}