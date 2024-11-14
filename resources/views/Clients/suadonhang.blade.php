@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/oder.css') }}">
@endsection
@section('content')
    <div class="container mb-5" style="min-height:750px">
        <form class="w-40" action="{{ route('postsua', ['id' => $code_cart]) }}" method="POST">
            @csrf
            <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Sửa thông tin nhận hàng</p>
            <div class="dathang-infor">
                <div class="mb-3">
                    <label for="hoten" class="form-label">Tên người nhận</label>
                    <input type="text" class="form-control" id="hoten" required name="hoten"
                        value="{{ $donhang->tennguoinhan }}">
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" required name="sdt"
                        value="{{ $donhang->sdt }}">
                </div>
                <div class="mb-4">
                    <label for="dc" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="dc" required name="diachi"
                        value="{{ $donhang->dc }}">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="thanhtoan">Hình thức thanh toán</label>
                    <select class="form-select" id="thanhtoan" name="httt">

                        @if ($donhang->thanhtoan == 'Chuyển khoản')
                            <option selected value="Chuyển khoản">Chuyển khoản</option>
                            <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        @else
                            <option value="Chuyển khoản">Chuyển khoản</option>
                            <option selected value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="xacnhan">Xác nhận</button>
            </div>
        </form>
    </div>
@endsection
