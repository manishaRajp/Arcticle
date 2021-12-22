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
        $edit_art = Article::where('id', $request['id'])->get()->first();
        if (isset($request['image'])) {
        $image = uploadFile($request['image'], 'Food');
        } else {
        $image = $edit_art->getRawOriginal('image');
        }
        $edit_art->meal_id = $request['category_id'];
        $edit_art->rest_id = $request['rest_id'];
        $edit_art->meal_name = $request['name'];
        $edit_art->sub_name = $request['sub_name'];
        $edit_art->price = $request['price'];
        $edit_art->quantity = $request['quantity'];
        $edit_art->image = $image;
        $edit_art->save();
        return redirect()->route('admin.meal.index');
    }

  
    public function destroy(Request $request)
    {
        $delete = Article::where('id', $request->id)->delete();
         return redirect()->route('admin.article.index');

    }
}
