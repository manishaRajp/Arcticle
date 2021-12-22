@extends('Backend.Admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                        <br>
                        <br>
                        <br>
                        <h4 style="font-size:200%;" class="card-title">Edit Articlel</h4>
                    </div>
                    <form class="forms-sample" method="post" action="{{ route('admin.article.update',$art_edit->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$art_edit->id}}">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-form-label">Category</label>
                            <select class="form-control @error('maincat_id') is-invalid @enderror" id="maincat_id" name="maincat_id">
                                @foreach ($maincat as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-form-label"> Sub Category</label>
                            <select class="form-control @error('maincat_id') is-invalid @enderror" id="maincat_id" name="maincat_id">
                                @foreach ($subcat as $category)
                                <option value="{{ $category->id }}">{{ $category->sub_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Title Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Meal name" value="frsgdfghd">
                            @error('meal_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_name">Description </label>
                            <input type="text" class="form-control" id="sub_name" name="sub_name" @error('sub_name') is-invalid @enderror placeholder="meal sub name" value="dfgvdxvgx">
                        </div>
                    
                        <div class="form-group">
                            <img src="{{asset('storage/ArtivleImage/'.$art_edit['image'])}}" alt="image" width="50" height="50" />
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary"></input>
                        <input type="button" class="btn btn-dabger"><a href="{{route('admin.article.index')}}">Cancel</a></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
