@extends('Backend.Admin.layouts.master')
@section('content')
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="white_shd full margin_bottom_30">
            <form method="Post" action="{{ route('admin.Category.store') }}">
                @csrf
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="col-md-8 grid-margin stretch-card">
                            <br>
                            <br>
                            <h4 style="font-size:200%;" class="card-title">Select Main Category</h4>
                            <div class="form-group">
                                <form method="post" action="#">
                                    @csrf
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select id="categoryList" class="form-control category_id" name="category_id" required>
                                            @foreach ($main_cat as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <h4 style="font-size:200%;" class="card-title">Select Sub Category</h4>
                                        <label>Subcategory</label>
                                        <select id="subcategoryList" class="form-control" name="subcategory_id" required>
                                        @foreach ($sub_cat as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
