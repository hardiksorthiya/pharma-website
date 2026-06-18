@extends('layouts.backend.admin')

@section('title', 'Add Gallery')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Add Gallery</h4>
        <p class="text-muted mb-0">Create a gallery section with a title and multiple images.</p>
    </div>

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.galleries._form')

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Save Gallery</button>
                    <a href="{{ route('galleries.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection
