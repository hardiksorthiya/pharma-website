@extends('layouts.backend.app')

@section('content')
    <div class="auth-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-5">

                    <div class="text-center mb-4">
                        <div class="brand-icon mb-3">S</div>
                        <h4 class="font-weight-bold text-dark mb-1">{{ config('app.name', 'Sanskruti Pharma') }}</h4>
                        <p class="text-muted small mb-0">@yield('auth-subtitle')</p>
                    </div>

                    <div class="card auth-card">
                        <div class="card-body p-4 p-md-5">

                            @if (session('status') && session('status') !== 'verification-link-sent')
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            @yield('auth-content')

                        </div>
                    </div>

                    @hasSection('auth-footer')
                        <div class="text-center text-muted small mt-4 auth-footer mb-0">
                            @yield('auth-footer')
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
