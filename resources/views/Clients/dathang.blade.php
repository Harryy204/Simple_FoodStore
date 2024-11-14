@extends('layouts.clients')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/oder.css') }}">
    <style>
        .dathang {
            background-color: #fafafa;
            padding: 40px 0;
            font-family: Arial, sans-serif;
        }

        .cart-heading {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .dathang-infor, .product-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .form-control, .form-select {
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            color: #555;
        }

        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #555;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #333;
        }

        .table td {
            background-color: #fff;
        }

        .table img {
            width: 80px;
            height: auto;
            border-radius: 8px;
        }

        .cart-product-totals {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
        }

        .cart-product-foot {
            background-color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="dathang">
        <form action="{{ route('postdathang') }}" method="POST">
            @csrf
            <div class="container mb-5">
                <p class="cart-heading">Thông tin đơn hàng</p>
                <div class="dathang-infor">
                    <div class="mb-3">
                        <label for="hoten" class="form-label">Người nhận</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" value="{{ $user->hoten }}">
                    </div>
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" required value="{{ $user->sodienthoai }}">
                    </div>
                    <div class="mb-4">
                        <label for="dc" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="dc" name="diachi" required value="{{ $user->diachi }}">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="thanhtoan">Hình thức thanh toán</label>
                        <select class="form-select" id="thanhtoan" name="httt">
                            <option selected value="Chuyển khoản">Chuyển khoản</option>
                            <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        </select>
                    </div>
                </div>

                <div class="product-list">
                    <p class="cart-heading">Sản phẩm</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Số tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/uploads/' . $item['hinhanh']) }}" alt="{{ $item['ten'] }}">
                                            <p class="cart-product-name ms-3 m-0">{{ $item['ten'] }}</p>
                                        </div>
                                    </td>
                                    <td>{{ number_format($item['gia'], 0, ',', '.') }} đ</td>
                                    <td>{{ $item['soluong'] }}</td>
                                    <td>{{ number_format($item['gia'] * $item['soluong'], 0, ',', '.') }} đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-product-foot">
                        <div class="cart-product-totals">
                            Tổng tiền: {{ number_format($tong, 0, ',', '.') }} đ
                        </div>
                        <div class="cart-product-oder">
                            <button type="submit" class="btn btn-primary">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
