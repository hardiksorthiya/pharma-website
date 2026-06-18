@extends('layouts.backend.admin')

@section('title', 'Homepage Sliders')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Homepage Sliders</h4>
            <p class="text-muted mb-0">Manage homepage hero slides with image or video backgrounds.</p>
        </div>
        <a href="{{ route('sliders.create') }}" class="btn btn-auth">Add Slider</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card admin-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Background</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>
                                    @if ($slider->background_image_url)
                                        <img src="{{ $slider->background_image_url }}" alt="" class="admin-table-thumb">
                                    @elseif ($slider->background_type === 'video')
                                        <span class="badge badge-light border">Video</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="font-weight-semibold">{{ $slider->title }}</td>
                                <td>{{ ucfirst($slider->background_type) }}</td>
                                <td>{{ $slider->sort_order }}</td>
                                <td>
                                    @if ($slider->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this slider?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    No sliders yet.
                                    <a href="{{ route('sliders.create') }}" class="admin-link">Add your first slider</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($sliders->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $sliders->links() }}
        </div>
    @endif
@endsection
