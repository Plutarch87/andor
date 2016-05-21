<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class CategoryController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');

       
    }

    public function index()
    {
        $items = DB::table('items')->get();
    	$categories = DB::table('categories')->get();

        return view('index', ['categories' => $categories, 'items' => $items]);
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
}
