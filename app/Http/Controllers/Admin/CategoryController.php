<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArticleSubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\ArticleSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(ArticleSubCategoryDataTable $dataTable)
    {
         return $dataTable->render('Backend.ArtticleCat.table');

    }

    public function create()
    {
        //   
    }
    
    public function store(Request $request)
    {
        // 
    }
   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
