@extends('layouts.admin')

@section('dashboard')
<div class="container mb-5" style="min-height:750px;">
    <form action="{{ route('order.postedit', ['code' => $dh->code_cart]) }}" method="POST">
        @csrf
        <p class="cart-heading mt-0 py-3 fs-5 fw-semibold text-center">Sửa thông tin đơn hàng</p>
        <div class="card p-4 shadow-sm">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="idkh" class="form-label">ID Khách hàng</label>
                        <input type="text" class="form-control" id="idkh" disabled name="id" value="{{ $dh->id_khachhang }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hoten" class="form-label">Người nhận</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" value="{{ $dh->tennguoinhan }}">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt"  name="sdt" value="{{ $dh->sdt }}">
                    </div>
                </div>
                @error('sdt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="col-md-6">
                    <div class="mb-4">
                        <label for="dc" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="dc"  name="diachi" value="{{ $dh->diachi }}">
                    </div>
                </div>
                @error('diachi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ngaynhan" class="form-label">Ngày nhận</label>
                        <input type="date" class="form-control" id="ngaynhan" name="ngaynhan" value="{{ $dh->ngaynhan }}" disabled>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-4 py-2 mt-3" name="xacnhan">Xác nhận</button>
            </div>
        </div>
    </form>
</div>
@endsection
