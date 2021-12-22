@extends('Backend.Admin.layouts.master')
@section('content')


    <!-- profile contant section -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Profile</h2>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Admin profile</h2>
                    </div>
                </div>
                <div class="container-fluid center">
                    <div class="row mt-3">
                        <div class="col-lg-36">
                            <div class="card profile-card-2">
                                <div class="card-body pt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Edit Profile</h4>
                                        <img src="{{ asset('Admin/asset/images/layout_img/user_img.jpg') }}" width="100"
                                            height="100" alt="profile-image" class="profile">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.profile_update') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                                        name="name" value="{{ Auth::guard('admin')->user()->name }}" autocomplete="off">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                                        name="email" value="{{ Auth::guard('admin')->user()->email }}" autocomplete="off">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Update Profile">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- end row -->
    </div>

    <!-- end user profile section -->

@endsection
