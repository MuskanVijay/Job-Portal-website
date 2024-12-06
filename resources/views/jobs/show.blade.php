@extends('layouts.app')

@section('content')
<div class="container">
    <div class="job-details-card mx-auto">
        <!-- Job Title -->
        <h1 class="text-center mb-4 job-title">{{ $job->title }}</h1>
        <hr>

        <!-- Job Information -->
        <p><strong>Company:</strong> {{ $job->company }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>
        <p><strong>Description:</strong> {{ $job->description }}</p>

        <!-- Apply Now Button -->
        <div class="text-center mt-4">
            @if(Auth::check())
            <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success btn-lg">Apply Now</button>
</form>

            @else
                <a href="{{ route('login') }}" class="btn btn-warning btn-lg">Login to Apply</a>
            @endif
        </div>

        <!-- Numbered List of Jobs -->
        <div class="mt-4">
            <h4 class="text-center">Other Job Listings:</h4>
            <div class="numbered-list-box">
                @foreach ($jobs as $index => $otherJob)
                    <div class="job-number">
                        <a href="{{ route('jobs.show', $otherJob->id) }}">
                            {{ $index + 1 }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Back to Job Listings -->
    <div class="text-center mt-3">
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Job Listings</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

<style>
    .numbered-list-box {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
    justify-content: center; /* Centers the list horizontally */
    align-items: center; /* Aligns items vertically */
}

    .job-number {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
    }


    .job-number a {
        text-decoration: none;
        color: #333;
        font-size: 18px;
    }

    .job-number a:hover {
        color: orange;
    }
        body {
            background-color: #f8f9fa;
        }
        .job-details-card {
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        .job-title {
            color: #007bff;
            font-weight: bold;
        }
        .btn-apply {
            background-color: #007bff;
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-apply:hover {
            background-color: #0056b3;
        }
        .btn-list{
            margin: 20px;
            padding:5px;
            justify-content: center; /* Centers the list horizontally */
            align-items: center;
        }
    </style>