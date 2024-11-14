@extends('layouts.clients')
@section('style')
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
@endsection
<style>
.carousel-image-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
}

.carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    opacity: 1;
}

.pagination {
    display: flex;
    justify-content: center;
    padding: 20px 0;
    margin: 0;
    list-style: none;
    background-color: transparent;
}

.pagination .page-item {
    margin: 0 12px;
}

.pagination .page-link {
    padding: 12px 30px;
    font-size: 16px;
    color: #fff; 
    background-color: #333; 
    border: 2px solid #333; 
    border-radius: 50px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.pagination .page-item:first-child,
.pagination .page-item:last-child {
    display: none;
}

.pagination .page-link:hover {
    background-color: rgb(255, 203, 48);
    color: #fff;
    border-color: rgb(255, 203, 48);
    box-shadow: 0 0 10px 3px rgba(255, 203, 48, 0.8); 
    transition: box-shadow 0.3s ease;
}

.pagination .page-item.active .page-link {
    background-color: rgb(255, 203, 48);
    color: #fff;
    border-color: rgb(255, 203, 48);
}

.pagination .page-item.disabled .page-link {
    background-color: #f0f0f0;
    color: #ccc;
    cursor: not-allowed;
    border-color: #ddd;
}

@media (max-width: 576px) {
    .pagination .page-link {
        padding: 10px 20px;
        font-size: 14px;
    }
}
.product-heading-title {
    font-size: 30px; 
    font-weight: bold;
    color: rgb(255, 203, 48);
    text-align: center;
    margin-bottom: 20px; 
    letter-spacing: 1px;
    text-transform: uppercase;
    font-family: 'Arial', sans-serif;
    position: relative;
}
.product-heading-title::after {
    content: ""; 
    position: absolute;
    bottom: 0; 
    left: 50%; 
    width: 150px; 
    height: 3px; 
    background-color: rgb(255, 203, 48); 
    transform: translateX(-50%); 
    margin-top: 10px; 
}
.category-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #000000;
    text-transform: capitalize;
    transition: color 0.3s ease-in-out; 
    cursor: pointer; 
}

.category-name:hover {
    color: #FFCC33;
}

.menu-count {
    font-size: 1.2rem;
    font-weight: 400;
    color: #6c757d;
}

.product-heading {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px; 
}
</style>
@section('slider')
    <div class="container" style="max-width: 100%; box-sizing: border-box; margin: 0px; padding: 0px">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height:600px;">
                    <img src="{{ asset('assets/imgs/slider1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-item" style="height:600px;">
                    <img src="{{ asset('assets/imgs/slider2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
                <div class="carousel-item" style="height:600px;">
                    <img src="{{ asset('assets/imgs/slider3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-overlay"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
@section('content')
    <div class="product" style="min-height: 800px" data-aos="fade-up">
        <div class="container">
            <p class="product-heading mt-0 py-3 fs-5 fw-semibold">
                {{-- {{ $tt }} --}}
                <h4 class="product-heading-title">Thực đơn nhà hàng</h4>

                <span class="category-name">
                    {{ !empty($category_name) ? $category_name : 'Tất cả món ăn' }}
                </span>
            
                <span class="menu-count">
                    {{ !empty($sl->soluong) ? ' (' . $sl->soluong . ' món ăn)' : '' }}
                </span>
            </p>
            <div class="products-list row">
                @foreach ($products as $item)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card  border-0 shadow-sm" style="height: 420px !important">
                            <div class="product-img position-relative">
                                <img class="card-img-top rounded-0" alt="..." style="object-fit:contain"
                                    src="{{ asset('assets/uploads/' . $item->hinhanh) }}" alt="" style="width:300px">
                            </div>
                            <div class="card-body text-center pt-0">
                                <div class="product-info">
                                    <div class="card-content">
                                        <h5 class="card-title mb-0 w-75 mx-auto"><a
                                                href="{{ route('showpro', ['id' => $item->id_sp]) }}"
                                                class="text-dark text-decoration-none fw-semibold">{{ $item->ten_sp }}</a>
                                        </h5>
                                        <span
                                            class="text-danger h4 mb-3 d-block fw-semibold">{{ number_format($item->gia, 0, ',', '.') . 'đ' }}</span>
                                    </div>
                                    <div class="product-actions">
                                        <a href="#" data-id="{{ $item->id_sp }}"
                                            class="btn btn-warning color-white btn-sm m-1 add-to-cart">Thêm vào giỏ hàng
                                        </a><br>
                                        <a href="{{ route('showpro', ['id' => $item->id_sp]) }}"
                                            class='btn btn-danger color-white btn-sm m-1'>Xem chi tiết</a>
                                    </div>
                                    <div style="margin: 0 8px" class="stars">
                                        <span class="fa fa-star checked text-warning"></span>
                                        <span class="fa fa-star checked text-warning"></span>
                                        <span class="fa fa-star checked text-warning"></span>
                                        <span class="fa fa-star checked text-warning"></span>
                                        <span class="fa fa-star checked text-warning"></span>
                                    </div>
                                    <span>{{ $item->mota }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul class="pagination justify-content-center">
                {{ $products->links() }}
                {{-- phân trang --}}

            </ul>

        </div>
    </div>
@endsection
