<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="job-details-card mx-auto">
            <h1 class="text-center mb-4 job-title">{{ $job->title }}</h1>
            <hr>
            <p><strong>Company:</strong> {{ $job->company }}</p>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>
            <p><strong>Description:</strong> {{ $job->description }}</p>
            

            <div class="text-center mt-4">
                <a href="#" class="btn btn-warning btn-lg">Apply Now</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
