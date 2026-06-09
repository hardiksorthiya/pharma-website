@extends('layouts.backend.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Dashboard</h4>
        <p class="text-muted mb-0">Welcome back, {{ Auth::user()->name }}</p>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card admin-stat-card">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Products</p>
                    <h3 class="mb-0 font-weight-bold">0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card admin-stat-card">
                <div class="card-body">
                    <p class="text-muted small mb-1">Total Orders</p>
                    <h3 class="mb-0 font-weight-bold">0</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card admin-stat-card">
                <div class="card-body">
                    <p class="text-muted small mb-1">Customers</p>
                    <h3 class="mb-0 font-weight-bold">0</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
