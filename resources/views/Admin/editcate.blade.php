@extends('layouts.admin')

@section('dashboard')
    <div class="container-xxl mt-4">
        <h4 class="mt-3 mb-4 text-center">Quản lý danh mục món ăn</h4>
        <form action="{{ route('category.postedit', ['id' => $h->id_hangsp]) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-normal text-center mb-4">Sửa thông tin danh mục món ăn</h5>
                            <div class="input-group mb-3">
                                <label for="tenhangsp" class="form-label col-4 fw-bold">Tên danh mục món ăn:</label>
                                <input type="text" class="form-control col-8" id="tenhangsp" name="tenhangsp" value="{{ $h->tenhangsp }}" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
