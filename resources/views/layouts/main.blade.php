<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Codezilla Blog')</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        body {
            background-color: #f1e3d2ff; 
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #d2b48c;">
    <div class="container-fluid">
        
        <a class="navbar-brand fw-bold fs-4 text-dark" href="{{ route('posts.home') }}">
            Line of Thoughts
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link fw-semibold text-dark mx-2" 
                   style="transition: 0.3s;" 
                   onmouseover="this.style.color='white'" 
                   onmouseout="this.style.color='black'"
                   href="{{ route('posts.home') }}">
                   Home
                </a>

                <a class="nav-link fw-semibold text-dark mx-2" 
                   style="transition: 0.3s;" 
                   onmouseover="this.style.color='white'" 
                   onmouseout="this.style.color='black'"
                   href="{{ route('posts.index') }}">
                   All Articles
                </a>

                @guest
                    <a class="nav-link mx-2" href="{{ route('login') }}">Login</a>
                    <a class="nav-link mx-2" href="{{ route('register') }}">Register</a>
                @endguest

                @auth
                    <span class="nav-link mx-2">Welcome, {{ auth()->user()->name }}</span>
                    
                   
                       




                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

  
    <div class="container">
        @yield('content')
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

