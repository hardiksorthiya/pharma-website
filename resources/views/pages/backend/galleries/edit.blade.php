@extends('layouts.backend.admin')

@section('title', 'Edit Gallery')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Gallery</h4>
        <p class="text-muted mb-0">Update gallery title, images, and display order.</p>
    </div>

    <form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.galleries._form', ['gallery' => $gallery])

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Update Gallery</button>
                    <a href="{{ route('galleries.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection
