<?php

namespace App\Http\Controllers;

use App\Subcat;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SubcatController extends Controller
{

    public function index()
    {
        return view('subcats.index');
    }

    public function store(Request $request, Category $category, Subcat $subcat)
    {
        
    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);

        $subcat = Subcat::create([
            'name' => $request->name,
            'category_id' => $category->id,
            ]);

        return back();
    }

    public function show(Request $request, Category $category, Subcat $subcat)
    {        
        $items = $subcat->items()->orderBy('created_at', 'desc')->paginate(12);
        
        return view('categories.subcats.show', compact('category', 'subcat', 'items'));
    }

    public function destroy(Request $request, Subcat $subcat)
    {
        $subcat->delete();

        return back();
    }
}
