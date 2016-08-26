<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcat;
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

        $items = Item::paginate(12);
        $subcats = Subcat::all();
        $categories = DB::table('categories')->orderBy('created_at', 'asc')->get();
         

        return view('categories.index', [
            'items' => $items,
            'categories' => $categories,
            'subcats' => $subcats,
        ]);
    }  

    public function store(Request $request, Category $category)
    {   
        if(
            $request->file('img')->getClientMimeType() == 'image/jpg' ||
            $request->file('img')->getClientMimeType() == 'image/png' ||
            $request->file('img')->getClientMimeType() == 'image/jpeg'
           )
            {
             $desPath = 'storage/andor';
             $name = date("his"). "-". $request->file('img')->getClientOriginalName();
             if($request->file('img')->isValid()) {
                 $request->file('img')->move($desPath, $name);
             }

            $this->validate($request, [
                'name' => 'required|max:255',
                'sifra' => 'required',
                'price' => 'required',
                'description' => 'required_without'
                // 'img' => 'required',           
            ]);
         } else {
             return response()->json("File must be in image format(.jpeg, .jpg, .png)", 405);
         }
        $cat_id = (int)$request->category_id;
        $sub_id = (int)$request->subcat_id;
        $items = Item::create([
            'name' => $request->name,
            'sifra' => $request->sifra,
            'price' => $request->price,
            'akcija' => $request->akcija,
            'popularno' => $request->popularno,
            'description' => $request->description,
            'category_id' => $cat_id,
            'subcat_id' => $sub_id,
            'img' => $name,
            ]);

        return back();
    }

    public function update(Request $request, Item $item)
    {

        $request->akcija ? $item->akcija = true : $item->akcija = false;
        $request->popularno ? $item->popularno = true : $item->popularno = false;        


            $item->update($request->all());
        if(!$request->hasFile('img')){

            return back();
        } 
        else
        {
            if(
                $request->file('img')->getClientMimeType() == 'image/jpg' ||
                $request->file('img')->getClientMimeType() == 'image/png' ||
                $request->file('img')->getClientMimeType() == 'image/jpeg'
               )
                {
                 $desPath = 'storage/andor';
                 $name = date("his"). "-". $request->file('img')->getClientOriginalName();
                 if($request->file('img')->isValid()) {
                    $request->file('img')->move($desPath, $name);
                    $item->update(['img' => $name]);
                    
                    return back();    
                 }
            }

        }

    }

    public function destroy(Request $request, Item $item)
    {
    	if($item->trashed())
		{
            $item->restore();
        } 
        else
        {
            $item->delete();
        }

    	return back();
    }

    public function showTrashed(Item $item)
    {        
    	$items = Item::onlyTrashed()->orderBy('deleted_at')->paginate(12);

    	return view('inactive', ['items' => $items]);
    }

    public function restoreTrashed($id)
    {
    	$item = Item::onlyTrashed()->find($id);
    	$item->restore();

    	return redirect('inactive');
    }

    public function deleteTrashed($id)
    {
       $item = Item::onlyTrashed()->find($id);
       $item->forceDelete();

       return redirect('inactive'); 
    }
}
