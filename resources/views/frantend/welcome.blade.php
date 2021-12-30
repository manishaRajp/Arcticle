@extends('frantend.layouts.master')
@section('content')
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
{{----------------------------------------model to send request and create post-------------}}
<center>
    {{-- Add Post --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Post
    </button>
    <form class="forms-sample" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{auth()->user()->id }}">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="col-sm-5 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" name="title" placeholder="Title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class=" form-control @error('body') is-invalid @enderror ckeditor" name="body" id="body">{{ old('body') }}</textarea>
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
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Send Request --}}
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#requestModal">
        Send Request
    </button>
    <form method="post" action="{{ route('sendrequest') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @if(Auth::user())
                    <div class="mx-auto"><strong>Total points = </strong>
                        <strong class="mx-10">{{ Auth::user()->points }}</strong>
                    </div>
                    @if(Auth::user()->points > 31)
                    <label class="col-sm-3 col-form-label ">Enter point</label>
                    <input id="points" type="text" class="form-control @error('points') is-invalid @enderror" name="points">
                    @error('points')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">Request</button>
                    @else
                    <label>
                        Go and get points
                    </label>
                    <input id="points" type="text" class="form-control @error('points') is-invalid @enderror" name="points" readonly placeholder="oppss********please eran points">

                    @endif
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</center>


{{----------------------------------------------Post Display--------------------------------}}
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<section class="page-section bg-light" id="team">
    <div class="text-center">
        <h2 class="section-heading text-uppercase" id="blogProfile">Posts</h2>
        <h3 class=" font-weight-bold text-monospace  text-uppercase ">read and enjoy</h3>
    </div>
    <div class="container">
        <div class="row">
            @if($posts)
            @foreach($posts as $value)
            <div class="col-md-3">
                <div class="blog-card blog-card-blog">
                    <div class="">
                        <img src="{{asset('storage/PostImage/'.$value['image'])}}" class="img-responsive" alt="image post">
                        <div class="ripple-cont"></div>
                    </div>
                    <div class="blog-table">
                        <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> READ AND ENJOY</h6>
                        <br>
                        <h4 class="blog-card-caption">
                            <a href="#">{{ ($value->title) }}</a>
                        </h4>
                        <p class="blog-card-description"> </p>
                        <div class="ftr">
                            <div class="author">
                                <h6>
                                    <div>{{ $value->description }}</div>
                                </h6>
                            </div>
                        </div>
                        <div class="stats"> <i class="far fa-clock"></i> 10 min </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

{{----------------------------------------------Article Display-----------------------------}}
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<section class="page-section bg-light" id="team">
    <div class="text-center">
        <h2 class="section-heading text-uppercase" id="blogProfile">Article</h2>
        <h3 class=" font-weight-bold text-monospace  text-uppercase ">read and enjoy</h3>
    </div>
    <div class="container">
        <div class="row">
            @if($art)
            @foreach($art as $value)
            <div class="col-md-3">
                <div class="blog-card blog-card-blog">
                    <div class="">
                        <img src="{{asset('storage/ArticleImage/'.$value['image'])}}" class="img-responsive" alt="image post">
                        <div class="ripple-cont"></div>
                    </div>
                    <div class="blog-table">
                        <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> READ AND ENJOY</h6>
                        <br>
                        <h4 class="blog-card-caption">
                            <a href="#">{{ ($value->title) }}</a>
                        </h4>
                        <p class="blog-card-description"> </p>
                        <div class="ftr">
                            <div class="author">
                                <h6>
                                    <div>{{ $value->description }}</div>
                                </h6>
                            </div>
                        </div>
                        @if($like_user !== ' ')
                        <a href="{{ route ('like', $value->id) }}"><button class="btn1"><i class="fa fa-heart"></i></button></a>
                        @else
                        <a href="{{ route ('dislikes', $value->id) }}"><button class="btn1" style="color:red"><i class="fa fa-heart"></i></button></a>
                        @endif
                        <form method="post" action="{{route('submit_comment',$value->id)}}">
                            @csrf
                            <div class="form-group">
                                <input id="textarea" class="status-box" name="comment" rows="3" cols="60" placeholder="Enter your comment here..."></input>
                                <input type="submit" name="post" class="btn btn-primary" value="POST" title="Post YOur Comment">
                            </div>
                            <div class="button-group pull-CENTERt anyClass">
                                @foreach($value->comment_count as $comment_details)
                                <div class="col-10 details comment_parent_div ">
                                    <div class="overflow-auto">
                                        <h6>{{$comment_details->name}}</h6>
                                        <p class="my_comment_id" hidden></p>
                                        <b>
                                            <p class="my_comment">{{$comment_details->comment}}</p>
                                        </b>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
