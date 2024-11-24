@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($job) ? 'Edit Job' : 'Add Job' }}</h2>

    <form action="{{ isset($job) ? route('jobs.update', $job) : route('jobs.store') }}" method="POST">
        @csrf
        @if(isset($job))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $job->title ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $job->company ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $job->location ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ $job->salary ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ $job->description ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn  text-light bg-secondary">Submit</button>
    </form>
</div>
@endsection
