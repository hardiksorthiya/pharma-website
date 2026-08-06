@extends('layouts.backend.admin')

@section('title', 'Contact Message Details')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <div class="page-header mb-0">
            <h4 class="mb-1 font-weight-bold">Message Details</h4>
            <p class="text-muted mb-0">Submitted on {{ $message->created_at->format('M d, Y h:i A') }}</p>
        </div>
        <a href="{{ route('contact-messages.index') }}" class="btn btn-auth-outline btn-outline-secondary">Back to List</a>
    </div>

    <div class="card admin-card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Full Name</p>
                    <p class="font-weight-semibold mb-0">{{ $message->name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Email</p>
                    <p class="mb-0"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Phone</p>
                    <p class="mb-0"><a href="tel:{{ preg_replace('/[^\d+]/', '', $message->phone) }}">{{ $message->phone }}</a></p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Company</p>
                    <p class="mb-0">{{ $message->company ?: '—' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="text-muted small mb-1">Subject</p>
                    <p class="mb-0">{{ $message->subject_label }}</p>
                </div>
                <div class="col-12 mb-3">
                    <p class="text-muted small mb-1">Message</p>
                    <p class="mb-0">{{ $message->message }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
