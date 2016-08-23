<?php

namespace App\Http\Controllers;

use App\Subcat;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SubcatController extends Controller
{

    public function index()
    {
        return view('subcats.index');
    }

    public function destroy(Request $request, Subcat $subcat)
    {
        $subcat->delete();

        return back();
    }
}
