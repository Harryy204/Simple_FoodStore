@extends('layouts.admin')
@section('dashboard')
<div class="container mb-5" style="min-height:750px">
    <form action="{{ route('user.postedit', ['id' => $u->id_khachhang]) }}" method="POST">
        @csrf
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold text-center">Sửa thông tin tài khoản</p>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <div class="mb-3">
                        <label for="idkh" class="form-label">ID</label>
                        <input type="text" class="form-control" id="idkh" disabled name="id" value="{{ $u->id_khachhang }}">
                    </div>
                    <div class="mb-3">
                        <label for="hoten" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" id="hoten" name="tentk" value="{{ $u->hoten }}">
                    </div>
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" required value="{{ $u->sodienthoai }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="mk" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" id="mk" name="matkhau" required value="{{ $u->matkhau }}">
                    </div> --}}
                    <div class="mb-3">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" required value="{{ $u->diachi }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $u->email }}">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
