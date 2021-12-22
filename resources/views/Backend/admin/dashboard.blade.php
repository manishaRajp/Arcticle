@extends('Backend.Admin.layouts.master')
@section('content')

<div class="full_container">
    <div class="inner_container">
        <!-- dashboard inner -->
        <div class="midde_cont">
            <div class="container-fluid">
                <div class="row column_title">
                    <div class="col-md-12">
                        <div class="page_title">
                            <h2>Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="row column1">
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-user yellow_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">741-852</p>
                                    <p class="head_couter">Counting of Employee</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-clock-o blue1_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">123.50</p>
                                    <p class="head_couter">Miniter Availab</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-cloud-download green_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">1,805</p>
                                    <p class="head_couter">CPU Avalable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full counter_section margin_bottom_30">
                            <div class="couter_icon">
                                <div>
                                    <i class="fa fa-comments-o red_color"></i>
                                </div>
                            </div>
                            <div class="counter_no">
                                <div>
                                    <p class="total_no">54</p>
                                    <p class="head_couter">Keyboard Avalable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row column1 social_media_section">
                    <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons fb margin_bottom_30">
                            <div class="social_icon">
                                <i class="fa fa-desktop"></i>

                            </div>
                            <div class="social_cont">
                                <ul>
                                    <li>
                                        <span><strong>Monite</strong></span>
                                        <span></span>
                                    </li>
                                 <li>
                                     <span><strong>3543</strong></span>
                                 </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons tw margin_bottom_30">
                            <div class="social_icon">
                                <i class="fa fa-keyboard-o"></i>

                            </div>
                            <div class="social_cont">
                                <ul>
                                    <li>
                                        <span><strong>Keyboard</strong></span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span><strong>Counting</strong></span>
                                        <span>741</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons linked margin_bottom_30">
                            <div class="social_icon">
                                <i class="fa fa-mouse"></i>


                            </div>
                            <div class="social_cont">
                                <ul>
                                    <li>
                                        <span><strong>CPU</strong></span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span><strong>Counting</strong></span>
                                        <span>741</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="full socile_icons google_p margin_bottom_30">
                            <div class="social_icon">
                                <i class="fa fa-cpu"></i>
                            </div>
                            <div class="social_cont">
                                <ul>
                                    <li>
                                        <span><strong>Mouse</strong></span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span><strong>Counting</strong></span>
                                        <span>741</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end dashboard inner -->
    </div>
</div>
@endsection
