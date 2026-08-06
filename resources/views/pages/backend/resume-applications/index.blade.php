@extends('layouts.backend.admin')

@section('title', 'Resume Applications')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Resume Applications</h4>
            <p class="text-muted mb-0">Review career applications submitted from the Careers page.</p>
        </div>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Position</th>
                            <th>Submitted</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                <td class="font-weight-semibold">{{ $application->name }}</td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->phone }}</td>
                                <td>{{ $application->position ?: '—' }}</td>
                                <td>{{ $application->created_at->format('M d, Y h:i A') }}</td>
                                <td class="text-right text-nowrap">
                                    <a href="{{ route('resume-applications.show', $application) }}" class="btn btn-sm btn-auth-outline btn-outline-secondary mr-1">View</a>
                                    <form action="{{ route('resume-applications.destroy', $application) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this application?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-auth-danger btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    No resume applications yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($applications->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $applications->links() }}
        </div>
    @endif
@endsection
