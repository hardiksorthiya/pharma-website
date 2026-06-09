@extends('layouts.backend.auth')

@section('auth-subtitle')
    Sign in to your account
@endsection

@section('auth-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autofocus autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required
                autocomplete="current-password" placeholder="Enter your password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                <label class="custom-control-label" for="remember_me">Remember me</label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
            @endif
        </div>

        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Sign In
        </button>
    </form>
@endsection

@section('auth-footer')
    @if (Route::has('register'))
        Don't have an account?
        <a href="{{ route('register') }}">Create one</a>
    @endif
@endsection
