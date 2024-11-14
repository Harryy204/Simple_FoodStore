@extends('layouts.admin')

@section('dashboard')
<div class="container-xxl mt-4">
    <h4 class="mt-3 mb-4 text-center">Quản lý mức giá</h4>
    <form action="{{ route('category.posteditprice', ['id' => $gia->id_mucgia]) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-normal text-center mb-4">Sửa mức giá</h5>

                        <div class="input-group mb-3">
                            <label for="mucgia" class="form-label col-4 fw-bold">Mức giá:</label>
                            <input type="text" class="form-control col-8" id="mucgia" name="mucgia" value="{{ $gia->mucgia }}" required>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Cập nhật </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
