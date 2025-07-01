<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>@yield('page_name')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fas fa-coffee me-2"></i>Cafeteria System</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link nav-item-custom" href="#"><i class="fas fa-home me-2"></i>Home</a>
                <a class="nav-link nav-item-custom" href="#"><i class="fas fa-box me-2"></i>Products</a>
                <a class="nav-link nav-item-custom" href="#"><i class="fas fa-users me-2"></i>Users</a>
                <a class="nav-link nav-item-custom" href="{{ route(('products')) }}"><i
                        class="fas fa-clipboard me-2"></i>Manual Order</a>
                <a class="nav-link nav-item-custom" href="#"><i class="fas fa-check-circle me-2"></i>Checks</a>
            </div>
            <div class="ms-3 d-flex align-items-center">
                <i class="fas fa-user-circle fa-2x text-light me-2"></i>
                <span class="text-light">admin</span>
            </div>
        </div>
    </nav>
    <div class="contanier">
        <h1>@yield('title')</h1>
        @yield('ordercontent')
    </div>
</body>

</html>