@extends('layouts.backend.admin')

@section('title', 'Settings')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Website Settings</h4>
        <p class="text-muted mb-0">Manage your site logo, favicon, and contact information.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-10">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('pages.backend.settings._form', ['settings' => $settings])

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
