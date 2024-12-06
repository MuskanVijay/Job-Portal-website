@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h2 class="text-center mb-4">Job Listings</h2>

    <!-- Search Form -->
    <div class="row mb-4">
    <form method="GET" action="{{ route('job-listings') }}" class="row">
        <!-- Search Bar -->
        <div class="col-md-6">
            <input type="text" name="search" class="form-control" 
                   placeholder="Search for jobs..." 
                   value="{{ request('search') }}">
        </div>

        <!-- Category Dropdown -->
        <div class="col-md-3">
            <select name="category" class="form-control">
                <option value="">Category</option>
                <option value="IT" {{ request('category') == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="Marketing" {{ request('category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Finance" {{ request('category') == 'Finance' ? 'selected' : '' }}>Finance</option>
            </select>
        </div>

        <!-- Location Dropdown -->
        <div class="col-md-3">
            <select name="location" class="form-control">
                <option value="">Location</option>
                <option value="Dubai" {{ request('location') == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                <option value="Pakistan" {{ request('location') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                <option value="China" {{ request('location') == 'China' ? 'selected' : '' }}>China</option>
                <option value="France" {{ request('location') == 'France' ? 'selected' : '' }}>France</option>
            </select>
        </div>

        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

    <!-- Job Listings -->
    <div class="row">
        @foreach($jobs as $job)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('Images/default-job-image.png') }}" class="card-img-top" alt="{{ $job->company }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p class="card-text">{{ $job->company }}</p>
                    <p class="text-muted mb-1">Location: {{ $job->location }}</p>
                    <p class="text-muted">Salary: {{ $job->salary ? '$' . number_format($job->salary, 2) : 'Negotiable' }}</p>
                    <a href="#" class="btn text-light bg-secondary">Apply Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <h3>Have a Job to Offer?</h3>
        <p>Click below to add a new job listing and connect with the best talent.</p>
        <a href="{{ route('jobs.create') }}" class="btn btn-lg text-light bg-secondary">Add Job</a>

        <div class="mt-3">
            <a href="{{ route('jobs.index') }}" class="btn btn-lg text-light bg-secondary">View Jobs</a>
        </div>
    </div>

</div>
@endsection
