@extends('layouts.clients')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/personal.css') }}">
@endsection
@section('content')
    <div class="account d-flex">
        <div class="image text-center mb-4">
            <img src="{{ asset('assets/imgs/profile.png') }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
        </div>
        <div class="inforr ">
            <h2 class="infor-title">Hồ sơ của tôi</h2>
            <div class="information">
                <div class="thongtinchitiet">
                    <label for="">Họ và tên: </label>
                    <span>{{ $user->hoten }}</span>
                </div>
                <div class="thongtinchitiet">
                    <label for="">Email: </label>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="thongtinchitiet">
                    <label for="">Số điện thoại: </label>
                    <span>{{ $user->sodienthoai }}</span>
                </div>
                <div class="thongtinchitiet">
                    <label for="">Địa chỉ: </label>
                    <span>{{ $user->diachi }}</span>
                </div>
            </div>
            <div class="update mt-4">
                <a href="{{ route('updateTT') }}" class="btn btn-primary">Cập nhật thông tin</a>
            </div>
        </div>
    </div>
@endsection
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
