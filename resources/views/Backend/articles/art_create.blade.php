@extends('Backend.Admin.layouts.master')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <br>
            <br>
            <br>
            <h4 style="font-size:200%;" class="card-title">Add Article</h4>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <form class="forms-sample" method="post" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-md-6">
                        <select class="form-control @error('maincat_id') is-invalid @enderror" id="maincat_id" name="maincat_id">
                            <option value="0">Select Main Category</option>
                            @foreach ($main_cat as $main_cat)
                            <option value="{{ $main_cat->id }}">{{$main_cat->name}}</option>
                            @endforeach
                        </select>
                        @error('maincat_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-md-6">
                        <select class="form-control @error('subcat_id') is-invalid @enderror" id="subcat_id" name="subcat_id">
                            <option value="0">Select Category</option>
                            @foreach ($sub_cat as $cat)
                            <option value="{{ $cat->id }}">{{$cat->sub_name}}</option>
                            @endforeach
                        </select>
                        @error('subcat_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="ckeditor form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label ">image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush


