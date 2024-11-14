@extends('layouts.admin')
@section('dashboard')
<div class="container" style="min-height: 800px;">
    <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Chi tiết đơn hàng</p>

<div class="card p-4 mt-4 shadow-sm">
    <p class="fs-5 fw-semibold mb-3">Thông tin đơn hàng</p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th class="fw-semibold" style="width: 150px;">Họ Tên</th>
                <td>{{ $dh->hoten }}</td>
            </tr>
            <tr>
                <th class="fw-semibold">Số điện thoại</th>
                <td>{{ $dh->sodienthoai }}</td>
            </tr>
            <tr>
                <th class="fw-semibold">Địa chỉ</th>
                <td>{{ $dh->diachi }}</td>
            </tr>
            <tr>
                <th class="fw-semibold">Hình thức thanh toán</th>
                <td>{{ $dh->thanhtoan }}</td>
            </tr>
            <tr>
                <th class="fw-semibold">Ngày đặt</th>
                <td>{{ $dh->ngaydat }}</td>
            </tr>
            <tr>
                <th class="fw-semibold">Ngày nhận</th>
                <td>{{ $dh->ngaynhan }}</td>
            </tr>
        </tbody>
    </table>
    <a class="link-offset-2 link-underline link-underline-opacity-0 mt-4 d-block text-center" 
       href="{{ route('order.edit', ['code' => $dh->code_cart]) }}">
        <button class="btn btn-primary px-4 py-2">Sửa</button>
    </a>
</div>

    {{-- <table class="table table-bordered mt-4">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Tên món ăn</th>
                <th class="text-center">Hình ảnh</th>
                <th class="text-center">Đơn giá</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Số tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
                $tong = 0;
            @endphp
            @foreach($ds as $item)
                @php
                    $tong += $item->gia * $item->soluong;
                @endphp
                <tr>
                    <td class="text-center align-items-center">
                        <div class="cart-product-name flex-column align-items-center justify-content-center fw-semibold">
                            <p class="m-0">{{$item->ten_sp}}</p>
                        </div>
                    </td>
                    <td class="text-center align-items-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('assets/uploads/'.$item->hinhanh)}}" alt="Product Image" class="img-fluid" style="width: 150px;">
                        </div>
                    </td>
                    <td class="text-center fw-semibold">{{number_format($item->gia, 0, ',', '.')}} đ</td>
                    <td class="text-center fw-semibold">{{$item->soluong}}</td>
                    <td class="text-center fw-semibold">{{number_format($item->gia * $item->soluong, 0, ',', '.')}} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cart-product-foot rounded-3 mb-4" style="height:60px">
        <div class="row h-100 justify-content-between">
            <div class="col-3 cart-product-totals d-flex align-items-center justify-content-center fw-semibold fs-5 text-primary">
                <p class="m-0">Tổng tiền : {{number_format($tong, 0, ',', '.')}} đ</p>
            </div>
        </div>
    </div>
</div> --}}
@endsection
