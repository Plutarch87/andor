<?php 

namespace App\Repositories;

use App\Category;
use App\Subcat;

class SubcatRepository 
{
	public function forCategory(Category $category)
	{
		return $category->subcat->orderBy('name', 'asc')->get();
	}
}