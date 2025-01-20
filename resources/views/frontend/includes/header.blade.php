<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        /* Navbar background color */
        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Navbar brand styling */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40 !important;
        }

        /* Navbar links default */
        .nav-link {
            font-size: 1rem;
            color: #555 !important;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        /* Navbar links hover effect */
        .nav-link:hover {
            color: white !important;
            background-color: #fa8888 !important;
            border-radius: 5px;
        }

        /* Search form styling */
        .search-form input[type="text"] {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-form {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50%;
            max-width: 400px;
            margin: 0 auto;
        }

        .search-form input[type="text"]:focus {
            border-color: #fa8888;
            box-shadow: 0 0 5px rgba(250, 136, 136, 0.5);
        }

        /* Login and register links */
        .login-link,
        .register-link {
            font-size: 1rem;
            color: #555 !important;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link:hover,
        .register-link:hover {
            color: #fa8888 !important;
        }

        .login-link i,
        .register-link i {
            margin-right: 5px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Enhanced Header</title>
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productpage') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorypage') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" {{-- href="{{route('dealpage')}}" --}}>Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">
                            <i class="fa-solid fa-cart-shopping"></i> Cart( {{ cartCount() }} )
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Non-Collapsible Section -->
            <div class="d-flex align-items-center">
                <form class="search-form me-3" action="{{ route('searchproduct') }}" method="post">
                    @csrf
                    <input type="text" value="" name="product" placeholder="Search product">
                </form>

                @if (Auth::check())
                <!-- Dropdown for logged-in users -->
                <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                                <i class="fa-solid fa-user-circle me-2 text-primary"></i> Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                    <i class="fa-solid fa-sign-out-alt me-2 text-danger"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

                @else
                <a class="login-link me-3" href="{{ route('login') }}">
                    <i class="fa-solid fa-sign-in-alt"></i> Login
                </a>
                <a class="register-link" href="{{ route('register') }}">
                    <i class="fa-solid fa-user-plus"></i> Register
                </a>
                @endif
            </div>
        </div>
    </nav>

</body>

</html>
