@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/oder.css') }}">
@endsection
@section('content')
    <div class="container mb-5">
        <p class="cart-heading mt-0 py-3 fs-5 fw-bold">Đơn hàng của bạn</p>
        <div class="cart-product-heading row rounded-2">
            <p class="col-1 text-center">Mã ĐH</p>
            <p class="col-2 text-center">Người nhận</p>
            <p class="col-1 text-center">SDT</p>
            <p class="col-3 text-center">Địa chỉ</p>
            <p class="col-1 text-center">Ngày đặt</p>
            <p class="col-1 text-center">Ngày nhận</p>
            <p class="col-2 text-center">HTTT</p>
            <p class="col-1 text-center">Trạng thái</p>
        </div>
        <div class="oder-list">
            @foreach ($donhang as $row)
                <div class="oder-item mt-2 row rounded-2 border border-light-subtle">
                    <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                        <a href="{{ route('chitietdh', ['id' => $row->code_cart]) }}">{{ $row->code_cart }}</a>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center fw-semibold text-center">
                        <span>{{ $row->hoten }}</span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                        <span>{{ $row->sdt }}</span>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-center fw-semibold ps-4 pe-4 text-center">
                        <span>{{ $row->dc }}</span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                        <span>{{ date('d-m-Y', strtotime($row->ngaydat)) }}</span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">
                        <span>
                            @if ($row->ngaynhan != '')
                                {{ date('d-m-Y', strtotime($row->ngaynhan)) }}
                            @endif
                        </span>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center fw-semibold text-center ps-2 pe-2">
                        <span>{{ $row->thanhtoan }}</span>
                    </div>
                    <div class="col-1 d-flex align-items-center justify-content-center fw-semibold text-center">

                        @if ($row->trangthai == 1)
                            <span class='text-danger'>Chờ xác nhận</span>
                        @elseif ($row->trangthai == 2)
                            <span class='text-primary'>Đang giao</span>
                        @elseif ($row->trangthai == 3)
                            <span class='text-success'>Đã nhận</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
