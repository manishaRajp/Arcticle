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
            <form class="forms-sample myform" method="POST" action="{{route('admin.article.store')}}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-md-6">
                        <select class="form-control maincat_id @error('maincat_id') is-invalid @enderror" id="maincat_id" name="maincat_id">
                            <option value="">Select Main Category</option>
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
                <select class="form-control subcat_id @error('subcat_id') is-invalid @enderror" id="subcat_id" name="subcat_id">
                    <option value="0">Select Category</option>
                    {{-- @foreach ($sub_cat as $cat)
                    <option value="{{ $cat->id }}">{{$cat->sub_name}}</option>
                    @endforeach --}}
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
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
    $('.myform').on('change', '.maincat_id', function() {

        $this = $(this);
        subcat = $this.val();
        alert(subcat);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            , }
            , url: '{{route("admin.getcate")}}'
            , type: 'post'
            , data: {
                subcat: subcat
            , }
            , dataType: "JSON"
            , success: function(data) {
                console.log(data);
                $this.parent().parent().find(".subcat_id").html('');
                $this.parent().parent().find(".subcat_id").html('<option value="">Select subcat</option>');
                $.each(data.data, function(key, value) {
                    $this.parent().parent().find(".subcat_id").append('<option value="' + value.id + '">' + value.sub_name + '</option>');
                });
            }
        });
    });

</script>



@endpush
