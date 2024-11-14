@extends('layouts.clients')
<style>
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
</style>
@section('content')
    <div class="product">
        <div class="container">
            <p class="product-heading mt-0 py-3 fs-5 fw-semibold">Từ khóa tìm kiếm:{{ $search }} ({{ $count }})
            </p>
            <div class="products-list row">
                @foreach ($productList as $item)
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
                {{ $productList->links() }}
            </ul>
        </div>
    </div>
@endsection
