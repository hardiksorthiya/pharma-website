@extends('layouts.backend.admin')

@section('title', 'Profile')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Profile</h4>
        <p class="text-muted mb-0">Manage your account settings and security.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card mb-4">
                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card admin-card mb-4">
                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card admin-card admin-card-danger mb-4">
                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
