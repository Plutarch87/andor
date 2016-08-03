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

    public function show(Request $request, $category_id, $subcat_id)
    {
        //$subcats = Subcat::find($subcat_id)->subcats;

        $subcats = DB::table('subcats')->where('id', $subcat_id)->get();
        $items = DB::table('items')
            ->where('category_id', $category_id)
            ->where('subcat_id', $subcat_id)
            ->get();
        $categories = DB::table('categories')->get();

        return view('subcats', [
            'items' => $items,
            'categories' => $categories,
            'subcats' => $subcats,
            'subcat_id' => $subcat_id,
            'category_id' => $category_id, 
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

        return back();
    }

    public function destroy(Request $request, Subcat $subcat)
    {
        $subcat->delete();

        return back();
    }

    public function showSubcats()
    {
        $subcats = Subcat::all();

        return response()->json($subcats);
    }

}
