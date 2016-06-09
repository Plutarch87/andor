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
        $categories = DB::table('categories')->orderBy('created_at', 'asc')->get();
         

        return view('categories', [
            'items' => $items,
            'categories' => $categories,
            'subcats' => $subcats,
        ]);
    }
    
    public function show($id)
    {

        $items = Item::paginate(12);

       

        $subcats = DB::table('subcats')->get();
        $categories = DB::table('categories')->get();

        return view('categories', [
            'items' => $items,
            'categories' => $categories,
            'subcats' => $subcats,
        ]);
    }

    public function store(Request $request)
    {
         if(
            $request->file->getClientMimeType() == 'image/jpg' ||
            $request->file->getClientMimeType() == 'image/png' ||
            $request->file->getClientMimeType() == 'image/jpeg'
           )
            {
             $desPath = storage_path(). '/andor';
             $name = date("his"). "-". $request->file->getClientOriginalName();
             if($request->file->isValid()) {
                 $request->file->move($desPath, $name);
             }

            $this->validate($request, [
                'name' => 'required|max:255',
                'sifra' => 'required',
                'price' => 'required',
                // 'img' => 'required',           
            ]);
         } else {
             return response()->json("File must be in image format(.jpeg, .jpg, .png)", 405);
         }

        $items = Item::create([
            'name' => $request->name,
            'sifra' => $request->sifra,
            'price' => $request->price,
            'img' => $name,
            ]);
        return redirect('categories');
    }


    public function destroy(Request $request, Item $item)
    {
    	$item->delete();

    	return redirect('/#main');
    }
}
