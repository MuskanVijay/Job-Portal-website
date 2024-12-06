<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- makes the page width equal to the device screen -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZv5I7y/2pW02h9YNL/TM6KmU/kD3FgP4r6+8fWX8M1C+SQIsVZltV9K4JeG3hU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <title>Job Portal</title>
</head>
<body class="font-sans antialiased">

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
    <div>
        {{-- Conditionally include navigation --}}
        @auth
            {{-- For logged-in users --}}
            @include('layouts.navigation')
        @else
            {{-- For guests --}}
            @include('partials.header')
        @endauth

        <div class="container">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>
</body>
</html>
