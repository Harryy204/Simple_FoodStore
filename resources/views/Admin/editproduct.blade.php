@extends('layouts.admin')

@section('dashboard')
    <div class="container">
        <h4 class="mt-3 mb-4 text-center">Sửa món ăn</h4>
        
        <form action="{{ route('product.postedit', ['id'=>$sp->id_sp])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold text-primary mb-3">Thông tin món ăn</h5>

                    <div class="input-group mb-3">
                        <label for="masp" class="form-label col-4 fw-bold">Mã món ăn</label>
                        <input type="text" class="form-control col-8" value="{{$sp->ma_sp}}" name="masp" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <label for="tensp" class="form-label col-4 fw-bold">Tên món ăn</label>
                        <input type="text" class="form-control col-8" value="{{$sp->ten_sp}}" name="tensp">
                    </div>
                    @error('tensp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <label for="hinhanh" class="form-label col-4 fw-bold">Hình ảnh</label>
                        <div class="col-8">
                            <input type="file" class="form-control" name="hinhanh">
                            <div class="border border-secondary p-2 mt-2 d-flex justify-content-center">
                                <img src="{{asset('assets/uploads/'.$sp->hinhanh)}}" width="150px">
                            </div>
                        </div>
                    </div>
                    @error('hinhanh')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <label for="idhangsp" class="form-label col-4 fw-bold">Mã loại món ăn</label>
                        <input type="number" class="form-control col-8" value="{{$sp->id_hangsp}}" name="idhangsp">
                    </div>
                    @error('idhangsp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <label for="giasp" class="form-label col-4 fw-bold">Giá</label>
                        <input type="number" class="form-control col-8" value="{{$sp->gia}}" name="giasp">
                    </div>
                    @error('giasp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold text-primary mb-3">Thông tin chi tiết</h5>

                    <div class="input-group mb-3">
                        <label for="motasp" class="form-label col-4 fw-bold">Mô tả</label>
                        <textarea class="form-control col-8" name="motasp">{{$sp->mota}}</textarea>
                    </div>

                    <div class="input-group mb-3">
                        <label for="soluongsp" class="form-label col-4 fw-bold">Số lượng</label>
                        <input type="number" class="form-control col-8" value="{{$sp->soluong}}" name="soluongsp">
                    </div>

                    <div class="input-group mb-3">
                        <label for="dabansp" class="form-label col-4 fw-bold">Đã bán</label>
                        <input type="number" class="form-control col-8" value="{{$sp->daban}}" name="dabansp">
                    </div>

                    <div class="input-group mb-3">
                        <label for="trangthaisp" class="form-label col-4 fw-bold">Trạng thái</label>
                        <select class="form-control col-8" name="trangthaisp">
                            <option value="1" {{ $sp->trangthai == 1 ? 'selected' : '' }}>Đang bán</option>
                            <option value="0" {{ $sp->trangthai == 0 ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <label for="timerammat" class="form-label col-4 fw-bold">Ngày đăng bán</label>
                        <input type="date" class="form-control col-8" value="{{$sp->time_rammat}}" name="timerammat">
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
