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
                        <form class="form-horizontal" method="POST" action="{{ route('admin.admin_login') }}">
                            @csrf
                            <h3 class="title">Admin Login</h3>
                            <br>
                            <br>
                            <div class="row mb-3">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autofocus
                                    placeholder="Username" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <span class="forgot-pass"><a href="{{ route('admin.foregtpassword') }}">Lost password?</a></span>
                            <button class="btn signin">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>