<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcat;
use App\Item;
use App\Category;
use DB;
use App\Http\Requests;

class SubcatController extends Controller
{
    protected $subcats;


    public function index()
    {
        $subcats = Subcat::all();
        $categories = Category::all();
        $items = Item::all();

        return view('categories', [
            'subcats' => $subcats,
            'categories' => $categories,
            'items' => $items,
            ]);
    }

    public function show(Request $request, $id)
    {
        $subcats = Subcat::find($id)->subcats;

        // $id = DB::table('items')->where('category_id', $id)->get();
        $items = DB::table('items')->get();
        $categories = DB::table('categories')->get();

        return view('categories', [
            'items' => $items,
            'categories' => $categories,
            'subcats' => $subcats,            
        ]);
    }
    
    public function store(Request $request, $id)
    {

        $category = Category::find($id)->categories;

    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);
        $request->user()->subcats()->create([
            'category_id' => $category,
            'name' => $request->name,]);

        return redirect('/');
    }


}
