<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
    <!-- External CSS Links -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"> <!-- Custom CSS for Admin Styles -->

</head>
<style>

body {
    background-color: #f4f6f9;
}

.wrapper {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    background-color: #86b7fe;
}

.sidebar .nav-item {
    padding: 10px;
}

.sidebar .nav-link {
    color: #fff;
    font-size: 16px;
    padding: 10px 20px;
}

.sidebar .nav-link:hover {
    background-color: #79aee3;
}

.content-wrapper {
    margin-left: 250px;
    padding: 20px;
}

.content-wrapper .header {
    background-color: #007bff;
    color: white;
}

.content-wrapper h1 {
    font-size: 2rem;
    font-weight: 600;
}

.logout-btn a:hover{
    background: red !important;
    color: white !important;
}

@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
    }

    .content-wrapper {
        margin-left: 0;
    }
}

</style>
<body>
    <div class="wrapper d-flex">
        <div class="sidebar  text-white p-3">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand">
                    <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </a>
            </div>
            <p class="mb-0 text-center rounded p-2">
                @if (Session::has('admin'))
                    <span>Xin chào, {{ Session::get('admin') }}</span>
                @endif
            </p>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home.index') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('category.index') }}"><i class="fa fa-list"></i> Quản lý danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('product.index') }}"><i class="fa fa-cogs"></i> Quản lý sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('user.index') }}"><i class="fa fa-users"></i> Quản lý người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('order.index') }}"><i class="fa fa-box"></i> Quản lý đơn hàng</a>
                </li>
            </ul>
            <div class="mt-4 logout-btn">
                <a href="{{ route('Admin.logout') }}" class="nav-link text-danger mt-2 border border-danger" style="border-radius: 5px; text-align: center;"><i class="fas fa-power-off"></i> Đăng xuất</a>
            </div>
        </div>

        <div class="content-wrapper flex-grow-1 p-4">
            <div class="header bg-primary text-white text-center py-4 mb-4">
                <h1 class="fw-semibold">Trang quản trị</h1>
            </div>
            @yield('dashboard')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

</html>
