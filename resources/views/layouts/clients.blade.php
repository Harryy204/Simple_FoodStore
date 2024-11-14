<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GoodFood</title>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    @yield('style')

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<style>
.header-bot {
    background-color: rgb(255 203 48);
    padding: 10px 0;
}

.navbar-nav .nav-item .nav-link {
    padding: 10px 20px;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 600;
    transition: all 0.3s ease;
}

.navbar-nav .nav-item .nav-link:hover {
    background-color: rgb(255 203 48);
    color: white;
    border-radius: 4px;
}

.nav-item.dropdown .dropdown-toggle {
    padding: 10px 15px;
    font-weight: bold;
    border-radius: 4px;
    background-color: transparent;
    color: #333;
    transition: all 0.3s ease;
}

.nav-item.dropdown .dropdown-toggle:hover {
    /* color: rgb(255 203 48); */
    color: white;
    background-color: transparent;
}

.header-menu-choose {
    min-width: 250px;
    padding: 10px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.list-product-content {
    font-size: 16px;
    margin-bottom: 10px;
}

.list-group-item {
    padding: 10px 15px;
    border: none;
    font-size: 14px;
    color: #555;
    transition: background-color 0.3s ease;
}

.list-group-item:hover {
    background-color: #f0f0f0;
    cursor: pointer;
}

.list-product-by-brain, .list-product-by-price {
    margin-bottom: 10px;
}

.navbar-nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.navbar-nav .nav-item {
    margin: 0 10px;
}

.navbar-nav .nav-item .nav-link {
    font-size: 16px;
    padding: 10px 15px;
}

.login-btn:hover {
    background-color: rgb(255, 180, 50);
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}


</style>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="container text-center header-top">
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('trangchu') }}" class=""><img src="{{ asset('assets/imgs/logo.png') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-5 d-flex align-items-center">
                        <form class="d-flex w-100" role="search" action="{{ route('search') }}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm món ăn..."
                                name="tukhoa" aria-label="Tìm kiếm món ăn...">
                            <button class="btn btn-warning" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-2">
                        <div class="row h-100 align-items-center">
                            <div class="col-3">
                                <i class="fa-solid fa-phone fs-3 ms-4 text-warning"></i>
                            </div>
                            <div class="col-9">
                                <p class="mb-0 fs-6">Tư vấn hỗ trợ</p>
                                <p class="mb-0 fs-5 fw-bold text-warning">0123456789</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row h-100 align-item-center">
                            <div class="col-5">
                                <div class="row h-100 align-items-center">
                                    <div class="col-6">
                                        <div class="cart-block">
                                            <a href="{{ route('client.giohang') }}"
                                                class="link-underline link-underline-opacity-0 d-block mt-2">
                                                <i class="fa-solid fa-cart-shopping w-100 fs-4" style="color: rgb(255 203 48)"></i>
                                                <div class="cart-quantity">
                                                    @if (Session::has('cart'))
                                                        {{ count(Session::get('cart')) }}
                                                    @else
                                                        0
                                                    @endif
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                    @if (Session::has('user'))
                                        <div class="col-6">
                                            <div class="cart-block">
                                                <a href="{{ route('xemdonhang') }}"
                                                    class="link-underline link-underline-opacity-0 d-block mt-2">
                                                    <i class="fa-solid fa-truck w-100 fs-4" style="color: rgb(255 203 48)"></i>

                                                    <div class="cart-quantity" style="right:5px;top:2px;" style="color: black">
                                                        {{ $cart_quantity }}
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="row h-100 align-items-center g-0">
                                    <div class="col-12">
                                        @if (empty(Session::get('user')))
                                            <a href="{{ route('client.login') }}"
                                                class="link-underline link-underline-opacity-0 col-6 login-btn" style="color: black; padding:10px; background-color: rgb(255 203 48);">Đăng nhập
                                            </a>
                                            {{-- <span>/ </span>
                                            <a href="{{ route('register') }}"
                                                class="link-underline link-underline-opacity-0 col-6">Đăng ký
                                            </a> --}}
                                        @else
                                            <div class="dropdown">
                                                <button class="btn noborder dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    @php
                                                        $user = DB::table('users')
                                                            ->WHERE('id_khachhang', '=', Session::get('user'))
                                                            ->first();
                                                    @endphp
                                                    Chào, {{ $user->hoten }}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('thongTinUser') }}">Thông tin</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ route('dangxuat') }}">Đăng
                                                            xuất</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- menu --}}
            <div class=" header-bot">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav fs-6 nav-header">
                                    <li class="nav-item dropdown">
                                        <button class="btn btn-dmsp dropdown-toggle d-flex align-items-center p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-bars me-2"></i> Danh mục món ăn
                                        </button>
                                        <div class="dropdown-menu p-0 header-menu-choose w-100" aria-labelledby="dropdownMenuButton">
                                            <div class="d-flex flex-column">
                                                <div class="list-product-by-brain mb-3">
                                                    <p class="list-product-content fw-bold">Tất cả danh mục</p>
                                                    <div class="list-group">
                                                        @foreach ($hangsp as $item)
                                                            <a href="{{ route('theohang', ['hang_id' => $item->id_hangsp]) }}" class="list-group-item list-group-item-action fw-bold">
                                                                {{ $item->tenhangsp }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
            
                                                {{-- <div class="list-product-by-price mb-3">
                                                    <p class="list-product-content fw-bold">Chọn theo mức giá</p>
                                                    <div class="list-group">
                                                        @foreach ($mucgia as $key => $item)
                                                            @if ($key == 0)
                                                                <a class="list-group-item list-group-item-action" href="{{ route('theogia', ['from' => 0, 'to' => (isset($mucgia[$key + 1]) ? $mucgia[$key + 1]->mucgia : 0)]) }}">
                                                                    Dưới {{ isset($mucgia[$key + 1]) ? $mucgia[$key + 1]->mucgia : 0 }} nghìn
                                                                </a>
                                                            @elseif($key >= 1 && $key < $mucgia->count() - 1)
                                                                <a class="list-group-item list-group-item-action" href="{{ route('theogia', ['from' => $item->mucgia, 'to' => (isset($mucgia[$key + 1]) ? $mucgia[$key + 1]->mucgia : -1)]) }}">
                                                                    Từ {{ $item->mucgia }} nghìn đến {{ isset($mucgia[$key + 1]) ? $mucgia[$key + 1]->mucgia : -1 }} nghìn
                                                                </a>
                                                            @else
                                                                <a class="list-group-item list-group-item-action" href="{{ route('theogia', ['from' => $item->mucgia, 'to' => -1]) }}">
                                                                    Trên {{ $item->mucgia }} nghìn
                                                                </a>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{ route('trangchu') }}">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('gioithieu') }}">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tintuc') }}">Tin tức</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trangchu') }}">Câu hỏi thường gặp</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('trangchu') }}">Tuyển dụng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('lienhe') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            

        </div>
        <div class="modal-notify {{ Session::has('thongbao') ? 'show' : '' }}">
            <div class="notify">
                <div class="notify-header">
                    <p class="fs-5 fw-semibold mb-0">
                        GoodFood
                    </p>
                </div>
                <div class="content notify-content">
                    <p class="fs-6 fw-semibold mb-0 text-center notify-contents px-4">
                        {{ session('thongbao') }}
                    </p>
                </div>
                <div class="action">
                    <button id="btnhiden" onclick="notify()" class="btn btn-primary w-4">Đồng ý</button>
                </div>
            </div>
        </div>


        @yield('slider')


        @yield('content')
        <footer id="footer" class="footer">

            <div class="container">
                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6 d-flex">
                        <i class="bi bi-geo-alt icon"></i>
                        <div>
                            <h4>Địa chỉ</h4>
                            <p>
                                123, abc <br>
                                Đà Nẵng, Việt Nam<br>
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                        <i class="bi bi-telephone icon"></i>
                        <div>
                            <h4>Thông tin liên hệ</h4>
                            <p>
                                <strong>Số điện thoại:</strong> +84 123 456 789<br>
                                <strong>Email:</strong> goodfood@gmail.com<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                        <i class="bi bi-clock icon"></i>
                        <div>
                            <h4>Giờ mở cửa</h4>
                            <p>
                                <strong>Thứ hai - Thứ bảy: 6:00</strong> - 23:00<br>
                                Chủ nhật: Đóng cửa
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Theo dõi chúng tôi</h4>
                        <div class="social-links d-flex">
                            <a href="#" class="tiktok text-white me-3" style="font-size: 1.5rem;">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            
                            <a href="#" class="facebook me-3" style="font-size: 1.5rem; color:#1ebcdb">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            
                            <a href="#" class="instagram me-3" style="font-size: 1.5rem; color:#CD486B">
                                <i class="fa-brands fa-square-instagram"></i>
                            </a>
                            
                            <a href="#" class="youtube text-danger me-3" style="font-size: 1.5rem;">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Bản quyền thuộc về <strong><span>GoodFood</span></strong>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
                    {{-- Designed by <a href="">BootstrapMade</a> --}}
                </div>
            </div>

    </div>
</body>

</html>
@yield('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
<script>
    function notify() {
        let model = document.querySelector(".modal-notify");
        model.classList.remove('show');
    }

    function updateCart() {
        event.preventDefault();
        let urlCart = $(this).data('url');
        let id = $(this).data('id');
        // alert(urlCart);
        $.ajax({
            type: "GET",
            url: urlCart,
            success: function(data) {
                if (data.code == 200) {
                    if (data.soluong >= 1) {
                        $(".quantity").val(data.soluong);
                        let totalItem = Intl.NumberFormat('vi-VN', {
                            style: 'decimal',
                            currency: 'VND'
                        }).format(Number(data.gia) * Number(data.soluong));
                        $(".total-item-" + id).html(totalItem + " đ");
                        $(".total").html(Intl.NumberFormat('vi-VN', {
                            style: 'decimal',
                            currency: 'VND'
                        }).format(data.tong))
                    } else {
                        // alert("xóa");
                        $('.item-' + id).remove();
                        $(".total").html(Intl.NumberFormat('vi-VN', {
                            style: 'decimal',
                            currency: 'VND'
                        }).format(data.tong));
                        $(".cart-quantity").html(data.count);
                    }
                    if (data.count == 0) {
                        // $(".khongcohang").show();
                        // $(".cohang").remove();
                        $('.dathang').prop('disabled', true);
                    }

                }
            },
            error: function() {

            }
        });
    }

    function deleteItem(event) {
        event.preventDefault();
        let urlCart = $(this).data('url');
        let name = $(this).data('name');
        let id = $(this).data('id');
        if (confirm("Bạn có muốn xóa sản phẩm " + name + " ?")) {
            $.ajax({
                type: "GET",
                url: urlCart,
                success: function(data) {
                    if (data.code == 200) {
                        $('.item-' + id).remove();
                        $(".total").html(Intl.NumberFormat('vi-VN', {
                            style: 'decimal',
                            currency: 'VND'
                        }).format(data.tong));
                        // alert(data.count);
                        if (data.count == 0) {
                            $('.dathang').prop('disabled', true);
                        }
                    }
                },
                error: function() {

                }
            });
        }
    }

    function addToCart(event) {
        event.preventDefault();
        let urlCart = "/themgiohang/";
        let id = $(this).data("id");
        let soluong = $(".soluong-sp-input").val();
        if (soluong == undefined) {
            soluong = 1;
        }
        console.log(soluong);
        $.ajax({
            type: "GET",
            url: urlCart + id + "/" + soluong,
            success: function(data) {
                if (data.code == 200) {
                    // $('.item-' + id).remove();
                    $(".cart-quantity").html(data.count);
                    $(".notify-content").html(data.mes);
                    $(".modal-notify").addClass('show');
                    // alert(data.mes);
                }
            },
            error: function() {

            }
        })
    }
    $(function() {
        $('.add-to-cart').on('click', addToCart);
    })
    $(function() {
        $('.updateCart').on('click', updateCart);
    });
    $(function() {
        $('.deleteItem').on('click', deleteItem);
    })
</script>
