<?php

namespace App\Http\Controllers;

use App\Models\ArticleSubCategory;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{
    public function index()
    {
    return view('Backend.ArtticleCat.create');
    }

    public function selectSearch(Request $request)
    {
        dd(2345);
    $subcat = [];
    if($request->has('q')){
    $search = $request->q;
    $subcat =ArticleSubCategory::select("id", "sub_name")
    ->where('sub_name', 'LIKE', "%$search%")
    ->get();
    }
    return response()->json($subcat);
    }
}
