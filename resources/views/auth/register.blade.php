@extends('layouts.backend.auth')

@section('auth-subtitle')
    Create your account
@endsection

@section('auth-content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" required autofocus autocomplete="name"
                placeholder="Enter your name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autocomplete="username"
                placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required
                autocomplete="new-password" placeholder="Enter your password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror" required
                autocomplete="new-password" placeholder="Confirm your password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Register
        </button>
    </form>
@endsection

@section('auth-footer')
    Already have an account?
    <a href="{{ route('login') }}">Sign in</a>
@endsection
