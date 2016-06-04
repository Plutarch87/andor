<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcat;
use App\Item;
use App\Category;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class SubcatController extends Controller
{

    public function index()
    {
        $subcats = Subcat::all();
        $categories = Category::all();
        $items = Item::paginate(12);

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
    
    public function post(Request $request, $id)
    {
        
    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);

        $subcat = Subcat::create([
            'name' => $request->name,
            'category_id' => $id,
            ]);

        return redirect('categories');
    }


}
