@extends('frantend.layouts.master')
@section('content')
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<center>
    <a href="{{ route('rechger.create') }}" class="btn-lg btn-success float-center">Send Request For Rechage</a>&nbsp;
</center>
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
                    <div class="blog-card-image">
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
                    <div class="blog-card-image">
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
