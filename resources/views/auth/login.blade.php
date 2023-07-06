@extends('auth.authdefault')

@section('content')
    <style>
        .login-page .login-from-wrap {
            width: 40%;
            background: rgba(22, 232, 225, 0.6);
        }

        .btn-link {
            color: #021716 !important;
            border: 2px solid #021716;
            text-decoration: none !important;
        }
    </style>

    <div class="login-page" style="background-image: url({{ asset('admin_assets/images/bg2.jpg') }})">
        <div class="login-from-wrap">
            <h2>Welcome to <a href="{{ URL::to('/') }}">GoTours</a></h2>
            <h4>Login to your account</h4>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                {{ Session::forget('success') }}
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                {{ Session::forget('error') }}
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" aria-describedby="emailHelp" value="{{ old('email') }}"
                        placeholder="Enter your email" required autocomplete="email" autofocus>
                    <small id="emailHelp" class="form-text text-muted align-right">*We'll never share your email with anyone
                        else.</small>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <p class="text-right text-muted">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    @endif
                </p>
                <p class="text-centre">
                    @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </p>
            </form>
        </div>
    </div>
@endsection
