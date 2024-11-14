@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/personal.css') }}">
@endsection
@section('content')
    <form action="{{ route('postUpdate') }}" method="POST">
        @csrf
        <div class="account">
            <div class="image text-center mb-4">
                <img src="{{ asset('assets/imgs/profile.png') }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
            </div>
            <div class="inforr">
                <div class="infor-title mb-4">
                    <h2>Hồ sơ của tôi</h2>
                </div>
                <div class="information" style="margin: 0 auto; width: 50%;">
                    <label class="fw-bold" for="hoten">Họ và tên:</label>
                    <div class="thongtinchitiet mb-3">
                        <input class="form-control form-control-lg" id="hoten" name="hoten" value="{{ $user->hoten }}" required placeholder="Nhập họ và tên" />
                    </div>
                    <label class="fw-bold" for="email">Email:</label>
                    <div class="thongtinchitiet mb-3">
                        <input class="form-control form-control-lg" id="email" name="email" value="{{ $user->email }}" required placeholder="Nhập email" />
                    </div>
                    <label class="fw-bold" for="sdt">Số điện thoại:</label>
                    <div class="thongtinchitiet mb-3">
                        <input class="form-control form-control-lg" id="sdt" name="sdt" value="{{ $user->sodienthoai }}" required placeholder="Nhập số điện thoại" />
                    </div>
                    <label class="fw-bold" for="diachi">Địa chỉ:</label>
                    <div class="thongtinchitiet mb-3">
                        <input class="form-control form-control-lg" id="diachi" name="diachi" value="{{ $user->diachi }}" required placeholder="Nhập địa chỉ" />
                    </div>
                </div>
                <div class="update text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Lưu thông tin</button>
                </div>
            </div>
        </div>
    </form>
@endsection
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
