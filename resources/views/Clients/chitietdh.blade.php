@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/oder.css') }}">
@endsection
@section('content')
    <div class="container" style="min-height: 800px;">
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold">Chi tiết đơn hàng
            <span class='text-primary'>{{ $code_cart }}</span>
        </p>
        <div class="phongbi"></div>
        <div class="person-infor">
            <p class="fs-5 fw-semibold mt-4">Thông tin đơn hàng</p>
            <p class="fs-6 fw-semibold mb-1">Người nhận: {{ $dataCart->hoten }}</p>
            <p class="fs-6 fw-medium mb-1">SDT: {{ $dataCart->sdt }}</p>
            <p class="fs-6 fw-medium mb-1">Địa chỉ: {{ $dataCart->dc }}</p>
            <p class="fs-6 fw-medium mb-1">Hình thức thanh toán: {{ $dataCart->thanhtoan }}</p>
            <p class="fs-6 fw-medium mb-1">Ngày đặt: {{ date('d-m-Y', strtotime($dataCart->ngaydat)) }}</p>
            <p class="fs-6 fw-medium mb-1">Ngày nhận:
                @if ($dataCart->ngaynhan != '')
                    {{ date('d-m-Y', strtotime($dataCart->ngaynhan)) }}
                @else
                    --/--/----
                @endif
            </p>
            <p class="fs-6 fw-medium mb-1">Trạng thái đơn hàng:

                @if ($dataCart->trangthai == 1)
                    <span class='text-danger'>Chờ xác nhận</span>
                @elseif ($dataCart->trangthai == 2)
                    <span class='text-primary'>Đang giao</span>
                @else
                    <span class='text-success'>Đã nhận</span>
                @endif
            </p>

            @if ($dataCart->trangthai != 3)
                <p class="fw-semibold mt-2 mb-1 text-danger" style="font-size: 14px;">Lưu ý: Đối với đơn hàng đang giao
                    không
                    thể sửa thông tin nhận được, vui lòng báo lại với Shop để sửa thông tin này</p>
            @endif
            @if ($dataCart->trangthai == 1)
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-block mt-3"
                    href="{{ route('suadonhang', ['id' => $code_cart]) }}">
                    <button type="button" class="btn btn-primary">Sửa thông tin nhận hàng</button>
                </a>
            @endif

            @if ($dataCart->trangthai != 3)
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-block mt-3"
                    href="{{ route('huydonhang', ['id' => $code_cart]) }}">
                    <button type="button" class="btn btn-danger">Hủy đơn hàng</button>
                </a>
            @endif
            @if ($dataCart->trangthai == 2)
                <a class="link-offset-2 link-underline link-underline-opacity-0 d-block mt-3"
                    href="{{ route('danhandonhang', ['id' => $code_cart]) }}">
                    <button type="button" class="btn btn-success">Đã nhận được hàng</button>
                </a>
            @endif
        </div>
        
        <div class="cart-product-heading mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSP as $item)
                        <tr>
                            <td class="text-center">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/uploads/' . $item->hinhanh) }}" alt="{{ $item->ten_sp }}" style="width: 80px; height: auto; border-radius: 8px; margin-right: 10px;">
                                    <p class="m-0">{{ $item->ten_sp }}</p>
                                </div>
                            </td>
                            <td class="text-center">{{ number_format($item->gia, 0, ',', '.') }} đ</td>
                            <td class="text-center">{{ $item->sl }}</td>
                            <td class="text-center">{{ number_format($item->gia * $item->sl, 0, ',', '.') }} đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="cart-product-foot rounded-3 mb-4" style="height:60px">
            <div class="row h-100 justify-content-between">
                <div
                    class="col-3 cart-product-totals d-flex align-items-center justify-content-center fw-semibold fs-5 text-primary">
                    <p class="m-0" style="color: #28a745">
                        Tổng tiền :
                        {{ number_format($tong, 0, ',', '.') }}
                        đ
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
