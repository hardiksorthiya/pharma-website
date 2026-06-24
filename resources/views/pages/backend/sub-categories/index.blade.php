@extends('layouts.backend.admin')

@section('title', 'Product Sub Categories')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Product Sub Categories</h4>
            <p class="text-muted mb-0">Manage sub categories under your main product categories.</p>
        </div>
        <a href="{{ route('product-sub-categories.create') }}" class="btn btn-auth">Add Sub Category</a>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subCategories as $subCategory)
                            <tr>
                                <td>
                                    @if ($subCategory->image)
                                        <img src="{{ $subCategory->image_url }}" alt="{{ $subCategory->title }}" class="admin-table-thumb">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="font-weight-semibold">{{ $subCategory->title }}</td>
                                <td>{{ $subCategory->category?->title ?: '—' }}</td>
                                <td><code>{{ $subCategory->slug }}</code></td>
                                <td class="admin-table-desc">{{ Str::limit($subCategory->description, 80) }}</td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('product-sub-categories.edit', $subCategory) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('product-sub-categories.destroy', $subCategory) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this sub category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    No product sub categories yet.
                                    <a href="{{ route('product-sub-categories.create') }}" class="admin-link">Add your first sub category</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($subCategories->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $subCategories->links() }}
        </div>
    @endif
@endsection
