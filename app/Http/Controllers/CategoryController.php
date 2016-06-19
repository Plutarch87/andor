<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Subcat;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;

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
        $items = Item::paginate(9);
    	$categories = Category::all();
        $subcats = Subcat::all();

        return view('index', ['categories' => $categories, 'items' => $items, 'subcats' => $subcats,]);
    }

    public function post(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);
        $request->user()->categories()->create([
            'name' => $request->name,
            ]);
        
        return redirect('/#main');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect('/#main');
    }

    public function showAll() {
        $items = Item::all();

        return response()->json($items);
    }
}
