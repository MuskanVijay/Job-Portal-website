<header class="bg-info text-white py-3">
    <div class="container">

    <div class="d-flex justify-content-center align-items-center ">
    <img src="{{ asset('Images/WOrk wise.png') }}" alt="Job Portal Logo" class="img-fluid me-2" style="max-width: 50px; margin:20px;">
    <h1 class="m-0">WorkWise</h1>
</div>
        <nav class="navbar navbar-expand-lg navbar-white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link text-white hover" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover" href="{{ route('job-listings') }}">Job Listings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover " href="{{ route('about') }}">About Us</a>
                    </li>
                    @auth
                            <li class="nav-item">
                                <a class="nav-link text-white hover" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item ">
                                <a class="nav-link text-white hover" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white hover" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                </ul>
            </div>
        </nav>
    </div>
    
</header>
