@extends('layouts.backend.auth')

@section('auth-subtitle')
    Verify your email address
@endsection

@section('auth-content')
    <p class="text-muted small mb-4">
        Thanks for signing up! Before getting started, please verify your email address by clicking the link we sent you. If you did not receive the email, we will gladly send another.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-auth btn-primary btn-block py-2">
            Resend Verification Email
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary btn-block py-2 auth-btn-outline">
            Log Out
        </button>
    </form>
@endsection
