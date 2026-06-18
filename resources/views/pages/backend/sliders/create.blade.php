@extends('layouts.backend.admin')

@section('title', 'Add Slider')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Add Slider</h4>
        <p class="text-muted mb-0">Create a homepage hero slide with image or video background.</p>
    </div>

    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.sliders._form')

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Save Slider</button>
                    <a href="{{ route('sliders.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/backend/slider-form.js') }}"></script>
@endpush
