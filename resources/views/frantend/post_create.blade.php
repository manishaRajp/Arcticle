@extends('frantend.layouts.master')
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                    <h4 style="font-size:200%;" class="card-title">Create Blog</h4>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                </div>
                <form class="forms-sample" method="post" id="form_blog" action="{{ route('post.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{auth()->user()->id }}">
                    <div class="form-group">
                        <label for="" class="col-sm-5 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                value="{{ old('title') }}" name="title" placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="ckeditor form-control form-control @error('body') is-invalid @enderror"
                                name="body" id="body">{{ old('body') }}</textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-form-label ">Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('post.index') }}">Go to Home </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

    $('#form_blog').validate({
        rules: {
            title: {
                required: true
            }
            , body: {
                required: true
            }
            , image: {
                required: true
            }
            , 
        }
        , highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        }
        , unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

</script>
@endpush