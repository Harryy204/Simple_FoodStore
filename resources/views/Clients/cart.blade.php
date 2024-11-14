@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endsection
<style></style>
@section('content')
    <div class="cart">
        <div class="container mb-5 cohang" style="height: 800px">
            <p class="cart-heading mt-0 py-3 fs-5 fw-bold">Giỏ hàng của bạn</p>
            <div class="cart-product-heading row ps-1 pe-4 rounded-2">
                <p class="col-5 text-center fw-semibold">Sản phẩm</p>
                <p class="col-2 text-center fw-semibold">Đơn giá</p>
                <p class="col-2 text-center fw-semibold">Số lượng</p>
                <p class="col-2 text-center fw-semibold">Số tiền</p>
                <p class="col-1 text-center fw-semibold">Thao tác</p>
            </div>
            

            <div class="cart-product-list mt-2 ">
                @php
                    $tong = 0;
                @endphp


                @foreach (Session::get('cart', []) as $key => $item)
                    @php $tong += $item['soluong'] * $item['gia'] @endphp
                    <div class="row cart-product-item mb-2 ms-1 me-1 item-{{ $key }}">
                        <div class="col-5 d-flex h-100">
                            <div
                                class="col-6 cart-product-name d-flex flex-column align-items-center justify-content-center fw-semibold">
                                <p class="m-0 fs-6">{{ $item['ten'] }}</p>
                            </div>
                            <div class="col-6 cart-product-image d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/uploads/' . $item['hinhanh']) }}" alt="">
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-price text-center">
                                <p class="m-0 ">
                                    <span class="price-{{ $key }}">{{ number_format($item['gia'], 0, ',', '.') }}
                                    </span>
                                    đ
                                </p>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-quantity d-flex">

                                <a href="" data-id="{{ $key }}"
                                    data-url="{{ route('update', ['action' => 'giamsl', 'id' => $key]) }}"
                                    class="updateCart">
                                    <button type="button" class="btn btn-light btn-sm">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                </a>
                                <input readonly type="text" name="quantity" value="{{ $item['soluong'] }}"
                                    style="width:30px" class="text-center mx-2 quantity">
                                <a href="" data-id="{{ $key }}"
                                    data-url="{{ route('update', ['action' => 'tangsl', 'id' => $key]) }}"
                                    class="updateCart">
                                    <button type="button" class="btn btn-light btn-sm">
                                        <i class="fa-solid fa-plus"></i>
                                    </button></a>
                            </div>
                        </div>
                        <div class="col-2 d-flex align-items-center justify-content-center fw-semibold">
                            <div class="cart-product-cost">
                                <p class="m-0 total-item-{{ $key }}">
                                    {{ number_format($item['gia'] * $item['soluong'], 0, ',', '.') }} đ
                                </p>
                            </div>
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <div class="cart-product-action">
                                <a href="" data-id="{{ $key }}"
                                    data-url="{{ route('deleteItem', ['id' => $key]) }}" data-name="{{ $item['ten'] }}"
                                    class="link-underline link-underline-opacity-0 deleteItem">
                                    <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="cart-product-foot rounded-3">
                <div class="row h-100 justify-content-between">
                    <div
                        class="col-3 cart-product-totals d-flex align-items-center justify-content-center fw-semibold fs-5 text-primary">
                        <p class="m-0" style="color: #28a745">
                            Tổng tiền :
                            <span class="total">{{ number_format($tong, 0, ',', '.') }}</span>
                            đ
                        </p>
                    </div>
                    <div class="col-2 cart-product-oder d-flex align-items-center justify-content-center fw-semibold">
                        <button type="button" class="btn btn-warning dathang"><a href="{{ route('dathang') }}"
                                class="link-offset-2 link-underline link-underline-opacity-0 text-white fw-medium px-1 py-2">Đặt
                                hàng</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
