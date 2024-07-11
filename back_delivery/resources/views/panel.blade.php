<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Barra de navegación lateral (sidebar) -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <!-- Puedes personalizar la barra lateral según tus necesidades -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <div>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    Dashboard
                                </a>
                            </li>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <ion-icon name="apps-outline"></ion-icon>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <ion-icon name="storefront-outline"></ion-icon>
                                <span>Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <ion-icon name="cart-outline"></ion-icon>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <ion-icon name="grid-outline"></ion-icon>
                                <span>Menu</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <<ion-icon name="restaurant-outline"></ion-icon>
                                <span>Restaurants</span>
                            </a>
                        </li>
                        <!-- Puedes agregar más elementos de menú según tus necesidades -->
                    </ul>
                </div>
            </nav>
            
            <!-- Contenido principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-auto">
                @extends('categories.app')
                @yield('content')
                @include('categories.index')
                <!-- Contenido de la página principal va aquí -->
                
            </main>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
