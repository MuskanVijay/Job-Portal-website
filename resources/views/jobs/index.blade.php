@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Job Listings</h2>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Add Job</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->location }}</td>
                <td>
                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
