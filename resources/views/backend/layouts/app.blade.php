<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .bg-dark {
        background-color: #ffebeb !important;
    }

    .sidebar-title {
        font-size: 4rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 0px;
        color: rgb(255, 0, 174);
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-1 d-none d-sm-inline sidebar-title">Dash Board</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Category</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('deals.index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Deals</span>
                            </a>
                        </li> --}}
                        <li>
                        <a href="{{ route('admin.orders.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span>
                        </a>
                        </li>
                        <li>
                            <a href="{{ route('role.index') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Role</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>
