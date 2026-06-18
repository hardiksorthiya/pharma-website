@extends('layouts.backend.admin')

@section('title', 'Add Event')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Add Event</h4>
        <p class="text-muted mb-0">Create a new event with rich text description, date, and gallery images.</p>
    </div>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.events._form')

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Save Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('assets/js/backend/event-form.js') }}"></script>
@endpush
