@extends('auth.authdefault')

@section('content')

<div class="login-page" style="background-image: url({{asset('admin_assets/images/bg.jpg')}})">
    <div class="login-from-wrap">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Select Role</label>
                <select class="form-control" id="userrole" name="usertype" required>
                    <option value="0">User</option>
                    <option value="2">Manager</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') }}" placeholder="Enter your Name" required autocomplete="name" autofocus>
                <small id="emailHelp" class="form-text text-muted">*We'll never share your email with anyone else.</small>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                <small id="emailHelp" class="form-text text-muted">*We'll never share your email with anyone else.</small>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password_confirmation" required autocomplete="confirm-password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $password_confirmation }}</strong>
                    </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="text-right text-muted">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('login') }}">
                    {{ __('Already Registered? Login here.') }}
                </a>
            @endif
            </p>
        </form>
    </div>
</div>
@endsection
