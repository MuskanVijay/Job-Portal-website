@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h2 class="text-center mb-4">Add New Job Listing</h2>

    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf
        <div class="row">
            <!-- Job Title -->
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Company Name -->
            <div class="col-md-6 mb-3">
                <label for="company" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>

            <!-- Category Dropdown -->
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finance">Finance</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>

            <!-- Location -->
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <!-- Salary -->
            <div class="col-md-6 mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" required>
            </div>

            <!-- Description -->
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Add Job</button>
            </div>
        </div>
    </form>

</div>
@endsection
