<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
use App\Http\Requests;

class ItemController extends Controller
{
	protected $items;

    public function index()
    {
    	$items = DB::table('items')->get();

    	return view('index', ['items' => $items]);
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

    public function destroy(Request $request, Item $item)
    {
    	$item->delete();

    	return redirect('/');
    }
}
