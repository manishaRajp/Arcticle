<html>
<title>Admin-Login</title>
<head>
    <link href="{{ asset('Admin/asset/css/fa-fa icon.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/asset/css/login.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <div class="form-container">
                        <div class="card-body">
                            <form class="form-container-forget" method="POST" action="{{ route('admin.change_pass') }}">
                                @csrf
                                <h3 class="title">Reset Password</h3>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <input id="oldpassword" type="password"
                                            class="form-control @error('oldpassword') is-invalid @enderror"
                                            name="oldpassword" value="{{old('oldpassword')}}" autocomplete="oldpassword"
                                            autofocus placeholder="Please enter old password">
                                        @error('oldpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <input id="newpassword" type="password"
                                            class="form-control @error('newpassword') is-invalid @enderror"
                                            name="newpassword" value="{{old('newpassword')}}"
                                            autocomplete="newpassword" placeholder="Please enter new password">
                                        @error('newpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb-3">
                                        <input id="password_confirmation" type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" value="{{old('password_confirmation')}}"
                                            autocomplete="new-password" placeholder=" Confirm New password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn1 btn signin">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>