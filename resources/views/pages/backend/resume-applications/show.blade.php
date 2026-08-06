@extends('layouts.backend.admin')

@section('title', 'Resume Application Details')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Application Details</h4>
            <p class="text-muted mb-0">Submitted on {{ $application->created_at->format('M d, Y h:i A') }}</p>
        </div>
        <a href="{{ route('resume-applications.index') }}" class="btn btn-auth-outline btn-outline-secondary">Back to List</a>
    </div>

    <div class="card admin-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Full Name</p>
                    <p class="font-weight-semibold mb-0">{{ $application->name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Email</p>
                    <p class="mb-0"><a href="mailto:{{ $application->email }}">{{ $application->email }}</a></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Phone</p>
                    <p class="mb-0"><a href="tel:{{ preg_replace('/[^\d+]/', '', $application->phone) }}">{{ $application->phone }}</a></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Position Applied For</p>
                    <p class="mb-0">{{ $application->position ?: '—' }}</p>
                </div>
                <div class="col-12 mb-3">
                    <p class="text-muted small mb-1">Cover Message</p>
                    <p class="mb-0">{{ $application->message ?: '—' }}</p>
                </div>
                <div class="col-12">
                    <p class="text-muted small mb-1">Resume File</p>
                    <a href="{{ $application->resume_url }}" class="btn btn-auth" target="_blank" rel="noopener">
                        Download Resume
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
