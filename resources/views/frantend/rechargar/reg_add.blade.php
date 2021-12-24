<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('frontend/assest/css/style_user.css') }}" rel="stylesheet" />
@extends('frantend.layouts.master')
<div class="container contact">
    <div class="row">
        <div class="col-md-9">
            <div class="contact-form">
                <div class="form-group">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('rechger.store') }}" enctype="multipart/form-data">
                            @csrf
                            <h1>Request for Recharge</h1>
                            <div class="mx-auto"><strong>Total points = </strong>
                                <strong class="mx-10">{{ $sum }}</strong>
                            </div>
                            <div class="mx-auto"><strong>After Recharge points = </strong>
                                <strong class="mx-10">{{ $value }}</strong>
                            </div>

                            @if($sum <= 30) <h5>opps**You Are not able to recharge
                                </h5>
                                <a href="{{ route('post.create') }}">Go and get points
                                </a>
                                @else
                                <input id="points" type="text" class="form-control @error('points') is-invalid @enderror" name="points" autocomplete="points">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('contact')
                                    {{ $message }} @enderror</p>
                                @error('points')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{route('rechger.index')}}">Cancel</a>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
