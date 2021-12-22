@extends('frantend.layouts.master')

@section('content')

<!--------------------------blog profile------------------------------------------>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<section class="page-section bg-light" id="team">
    <div class="text-center">
        <h2 class="section-heading text-uppercase" id="blogProfile">Blogs</h2>
        <h3 class=" font-weight-bold text-monospace  text-uppercase ">read and enjoy</h3>
    </div>
    <div class="container">
        <div class="row">
            @if($art)
            @foreach($art as $key => $value)

            <div class="col-md-3">
                <div class="blog-card blog-card-blog">
                    <div class="blog-card-image">
                        <a href="Comment">
                            <img class="img-fluid" src="{{asset('storage/ArtivleImage/'.$value->image)}}" alt="..." />
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
                            @if($like_user)
                            <a href="{{ route ('dislikes', $value->id) }}"><button class="btn1" style="color:red"><i class="fa fa-heart"></i></button></a>

                            @else
                            <a href="{{ route ('like', $value->id) }}" title=" {{ App\Models\Like::with('likes')->where('art_id', $value->id)->count() }}"> <button class="btn1"><i class="fa fa-hevalue"></i></button></a>
                            @endif
                            <a href="#textarea"><button class="btn2" title="{{ App\Models\Comment::with('blogComment')->where('art_id', $value->id)->count() }}"><i class=" fa fa-comment"></i></button></a>
                            <br>

                            {{-- <h6><br><br><i class="fa fa-comment"></i>
                                {{ App\Models\Comment::with('blogComment')->where('blog_id', $value->id)->count() }}
                            Comments
                            <h6><i class="fa fa-heart"></i>
                                {{ App\Models\Like::with('likes')->where('blog_id', $value->id)->count() }}
                                Likes
                            </h6> --}}
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

<!----------------------------------user profile--------------------------------------->
@if(auth()->user())
<section class="page-section" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" id="user_profile">Welcom to bloggers {{ auth()->user()->name}}.....</h2>
            {{-- <a href="{{ route('user_profile_view') }}"> View More </a> --}}
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ auth()->user()->profile }}" alt="no image" />
                </div>

            </div>
        </div>
    </div>
</section>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
@endif

<!------------------------------------ About Us------------------------------- -->
<section class="page-section bg-light" id="about-us">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About US</h2>
            <h3 class="section-subheading text-muted">Blogs Change the way og thinking</h3>
        </div>
        <div class="row">
            {{-- @foreach($about as $item)
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="img-fluid" src="{{$item->image}}" class="rounded-circle float-left" width="100px" height="100px" alt="..." />
            <h4>{{$item->title}}</h4>
            <p class="text-muted">{{$item->description}}</p>
        </div>
    </div>
    @endforeach --}}
    </div>
    </div>
</section>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">

<!---------------------------------------- Contact----------------------------->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Share Your Feedback </h3>
        </div>
        <form id="contactForm" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class=" row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name *" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your Email *" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone *" />
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" name="message" placeholder="Your Message *"></textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button></div>
        </form>
    </div>
</section>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
@endsection
