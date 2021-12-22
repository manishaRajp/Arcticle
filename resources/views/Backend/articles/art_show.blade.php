@extends('Backend.Admin.layouts.master')
@section('content')
<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <br>
                <br>
                <br>
                <div class="card-header">
                    <h3>Article details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="main_cat">Category Name</label>
                            <input type="text" name="main_cat" id="main_cat" value="{{$art->maincat->name}}" class="form-control"  readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sub_cat">Sub Category Name</label>
                            <input type="text" name="sub_cat" id="sub_cat" value="{{$art->subcat->sub_name}}" class="form-control"  readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $art->title }}" class="form-control"  readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descrition">Description</label>
                            <input type="text" name="descrition" id="descrition" value="{!!$art->description!!}" class="form-control"  readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="restaurant">Like of this title</label>
                            <input type="text" name="restaurant" id="restaurant" value="{{ $art->like }}" class="form-control"  readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="restaurant">Commnet of this title</label>
                            <input type="text" name="restaurant" id="restaurant" value="{{ $art->comment }}" class="form-control" readonly>
                        </div>
                    </div>
                    <center>
                        <div class="form-group">
                            <label for="restaurant">Article Image</label><br>
                            <img src="{{asset('storage/ArticleImage/'.$art['image'])}}" class=" img-thumbnail float-center" width="100px" height="100px" alt="">
                        </div>
                        <a href="{{ route('admin.article.index') }}"> <button class="btn btn-success">| Go to Home</button></a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
