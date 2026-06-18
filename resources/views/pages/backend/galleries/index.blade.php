@extends('layouts.backend.admin')

@section('title', 'Galleries')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Galleries</h4>
            <p class="text-muted mb-0">Manage gallery sections with a title and multiple images.</p>
        </div>
        <a href="{{ route('galleries.create') }}" class="btn btn-auth">Add Gallery</a>
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
                            <th>Title</th>
                            <th>Images</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $gallery)
                            <tr>
                                <td class="font-weight-semibold">{{ $gallery->title }}</td>
                                <td>
                                    @if ($gallery->images_count > 0)
                                        <span class="badge badge-light border">{{ $gallery->images_count }} {{ Str::plural('image', $gallery->images_count) }}</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $gallery->sort_order }}</td>
                                <td>
                                    @if ($gallery->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('galleries.edit', $gallery) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this gallery?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    No galleries yet.
                                    <a href="{{ route('galleries.create') }}" class="admin-link">Add your first gallery</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($galleries->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $galleries->links() }}
        </div>
    @endif
@endsection
