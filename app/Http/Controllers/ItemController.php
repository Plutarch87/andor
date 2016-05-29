<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ItemRepository;


class ItemController extends Controller
{
	protected $items;

    public function __construct(ItemRepository $items)
    {

        $this->items = $items;
    }

    public function index()
    {             
         $items = DB::table('items')->orderBy('created_at', 'asc')->get();
         $categories = DB::table('categories')->orderBy('created_at', 'asc')->get();

        return view('categories', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            ]);
        $request->items()->create([
            'name' => $request->name,
            ]);
        return redirect('/item');
    }

    public function show($id)
    {       
        $id = DB::table('items')->where('category_id', $id)->get();
        $categories = DB::table('categories')->get();

        return view('categories', [
            'items' => $id,
            'categories' => $categories,
        ]);
    }

    public function destroy(Request $request, Item $item)
    {
    	$item->delete();

    	return redirect('/#main');
    }
}
