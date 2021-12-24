<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArticleDataTable;
use App\DataTables\ArticleSubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\CreateArtRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleSubCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index(ArticleDataTable $dataTable)
    {
    return $dataTable->render('Backend.articles.art_table');
    }


    public function getcate(Request $request)
    {
    // dd($request->all());
    $user = ArticleCategory::where('maincat_id', $request->subcat_id)
    ->get(['sub_name', 'id']);
    return response()->json(['status' => true, 'data' => $user]);
    }

    public function create()
    {
        $main_cat = ArticleCategory::all();
        $sub_cat = ArticleSubCategory::all();
        return view('Backend.articles.art_create',compact('sub_cat','main_cat'));
    }

    public function store(CreateArtRequest $request)
    {
        $images = uploadFile($request['image'], 'ArticleImage');
        $art_create = new Article;
        $art_create->maincat_id = $request['subcat_id'];
        $art_create->subcat_id = $request['subcat_id'];
        $art_create->title = $request['title'];
        $art_create->description = $request['description'];
        $art_create->image = $images;
        $art_create->save();
       return redirect()->route('admin.article.index');
    }
   
    public function show($id)
    {
        $art = Article::find($id);
        return view('Backend.articles.art_show',compact('art'));
    }

    public function edit($id)
    {
        $art_edit = Article::find($id);
        $maincat = ArticleCategory::all();
        $subcat = ArticleSubCategory::all();
        return view('Backend.articles.art_edit',compact('art_edit','maincat','subcat'));
    }

    public function update(Request $request,$id)
    {
        $edit_art = Article::get()->first();
        if (isset($request->image)) {
        $image = uploadFile($request->image,'ArticleImage');
        } else {
        $image = $edit_art->getRawOriginal('image');
        }
        $edit_art->maincat_id = $request->maincat_id;
        $edit_art->subcat_id = $request->subcat_id;
        $edit_art->title = $request->title;
        $edit_art->description = $request->description;
        $edit_art->image = $image;
        $edit_art->update();
        return redirect()->route('admin.article.index');
    }

    public function destroy(Request $request ,$id)
    {
        $art_delete = Article::find($id);
        $art_delete->delete();
        $request->session()->flash('warning', 'Your Data Deleted successfully ');
        return redirect()->route('admin.article.index');
    }
}
