@extends('layouts.backend.admin')

@section('title', 'Blogs')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Blogs</h4>
            <p class="text-muted mb-0">Manage blog posts for your website.</p>
        </div>
        <a href="{{ route('blogs.create') }}" class="btn btn-auth">Add Blog</a>
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
                            <th>Categories</th>
                            <th>Slug</th>
                            <th>Meta Title</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog)
                            <tr>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="admin-table-thumb">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="font-weight-semibold">{{ $blog->title }}</td>
                                <td class="admin-table-desc">
                                    @if ($blog->categories->isNotEmpty())
                                        {{ $blog->categories->pluck('title')->join(', ') }}
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td><code>{{ $blog->slug }}</code></td>
                                <td class="admin-table-desc">{{ $blog->meta_title ?: '—' }}</td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    No blog posts yet.
                                    <a href="{{ route('blogs.create') }}" class="admin-link">Add your first blog</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($blogs->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    @endif
@endsection
