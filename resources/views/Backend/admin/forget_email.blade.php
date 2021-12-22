<html>
<title>Admin-Login</title>
<head>
    <link href="{{ asset('Admin/asset/css/fa-fa icon.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/asset/css/login.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <div class="form-container">
                        <div class="card-body">
                            <form class="form-container-forget" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <h3 class="title">Reset Password</h3>
                                <br>
                                <br>
                                <div class="row mb-3">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="E-Mail Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn1 btn signin">Send Password Reset Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
