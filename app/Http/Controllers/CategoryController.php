<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    
    protected $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->middleware('auth');

        $this->categories = $categories;
    }

    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(9);
    	$categories = Category::all();

        return view('index', compact('categories', 'items'));
    }

    public function show(Category $category)
    {
        $items = $category->items()->orderBy('created_at', 'desc')->paginate(8);

        return view('categories.show', compact('category', 'items'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);
        $request->user()->categories()->create([
            'name' => $request->name,
            ]);
        
        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

}
