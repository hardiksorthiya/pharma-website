@extends('layouts.backend.admin')

@section('title', 'Events')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Events</h4>
            <p class="text-muted mb-0">Manage events with descriptions, dates, and photo galleries.</p>
        </div>
        <a href="{{ route('events.create') }}" class="btn btn-auth">Add Event</a>
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
                            <th>Event Date</th>
                            <th>Gallery</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td class="font-weight-semibold">{{ $event->title }}</td>
                                <td>{{ $event->event_date->format('M d, Y') }}</td>
                                <td>
                                    @if ($event->images_count > 0)
                                        <span class="badge badge-light border">{{ $event->images_count }} {{ Str::plural('image', $event->images_count) }}</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('events.edit', $event) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">Edit</a>
                                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    No events yet.
                                    <a href="{{ route('events.create') }}" class="admin-link">Add your first event</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($events->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $events->links() }}
        </div>
    @endif
@endsection
