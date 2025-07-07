<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('page_name')</title>
</head>


<body class="d-flex flex-column min-vh-100">
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-coffee me-2"></i>Cafeteria System
        </a>

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link nav-item-custom" href="{{ route('user.home') }}">
                    <i class="fas fa-home me-2"></i>Home
                </a>

            </li>

            @yield('navbar')
        </ul>
               <ul class="navbar-nav ms-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>{{ __('Login') }}
                        </a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>{{ __('Register') }}
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                        role="button" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center me-2"
                            style="width: 32px; height: 32px;">
                                                        <img src="{{ Auth::user()->image && file_exists(public_path(Auth::user()->image)) ? asset(Auth::user()->image) : asset('images/no-photo.png') }}"
                                alt="User Avatar" class="rounded-circle border me-2"
                                style="width: 40px; height: 40px; object-fit: cover;">

                        </div>
                        {{ Auth::user()->name }}
                        @if (Auth::user()->role === 'admin')
                            <span class="badge bg-warning text-dark ms-2">Admin</span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header"><i class="fas fa-user-circle me-2"></i>Account</h6>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Profile Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<main class="flex-grow-1">
    <div class="container">
        @yield('our-menu')
        <h1>@yield('title')</h1>
        @yield('content')
        @yield('addCategory')
        @yield('editCategory')
        @yield('addProduct')
        @yield('editProduct')
        @yield('userHome')

    </main>
    </div>

        <footer class="bg-coffee text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-coffee me-2"></i>Golden Bean Cafeteria</h5>
                <p class="mb-0">Your perfect coffee experience awaits.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">© 2025 Golden Bean. All rights reserved.</p>
                <div class="mt-2">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
