@extends('layouts.backend.auth')

@section('auth-subtitle')
    Reset your password
@endsection

@section('auth-content')
    <p class="text-muted small mb-4">
        Forgot your password? Enter your email address and we will send you a password reset link.
    </p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autofocus
                placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Email Password Reset Link
        </button>
    </form>
@endsection

@section('auth-footer')
    <a href="{{ route('login') }}">Back to sign in</a>
@endsection
