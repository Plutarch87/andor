<?php 

namespace App\Repositories;

use App\Category;

class CategoryRepository 
{
	public function forCategory(Category $category)
	{
		return $category->orderBy('name', 'asc')->get();
	}
}