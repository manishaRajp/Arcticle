@extends('frantend.layouts.master')
@section('content')
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
<section class="page-section1" id="portfolio">
    <br>
    <br>

    <!--------------------------blog profile------------------------------------------>
    <hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
    <section class="page-section bg-light" id="team">
        <a href="{{ route('rechger.create') }}" class="btn btn-success float-left">Send Request</a>&nbsp;
        <div class="text-center">
            <h2 class="section-heading text-uppercase" id="blogProfile">Blogs</h2>
            <h3 class=" font-weight-bold text-monospace  text-uppercase ">read and enjoy</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="blog-card blog-card-blog">
                        <div class="blog-card-image">
                            <a href="Comment">
                                <img class="img-fluid" src="" alt="..." />
                                <div class="ripple-cont"></div>
                        </div>
                        <div class="blog-table">
                            <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i> READ AND ENJOY</h6>
                            <br>
                            <h4 class="blog-card-caption">
                                <a href="#"></a>
                            </h4>
                            <p class="blog-card-description"> </p>
                            <div class="ftr">
                                <div class="author">
                                    <h6>
                                        <div></div>
                                    </h6>
                                </div>
                            </div>
                            <div class="stats"> <i class="far fa-clock"></i> 10 min </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">



</section>
<hr style="height:9px; border-width:5px; width: 10000px;  color:DarkOrange; background-color:DarkOrange">
@endsection

