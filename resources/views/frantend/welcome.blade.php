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
@endsection
