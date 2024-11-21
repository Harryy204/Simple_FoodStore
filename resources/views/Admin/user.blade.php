@extends('layouts.admin')

@section('dashboard')
<div class="container-xxl mt-4">
    <h4 class="mt-3 mb-4 text-center">Quản lý tài khoản người dùng</h4>
    <form action="{{ route('user.postcreate') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-normal mb-3 text-center">Thêm người dùng</h5>

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="mb-3">
                            <label for="tentk" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="tentk" name="tentk" required>
                        </div>

                        <div class="mb-3">
                            <label for="sdt" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdt" name="sdt" required>
                        </div>

                        <div class="mb-3">
                            <label for="mk" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" id="mk" name="mk" required>
                        </div>

                        <div class="mb-3">
                            <label for="dc" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="dc" name="dc" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg w-50">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="mt-5">
        <p class="fs-5 fw-semibold text-center">Danh sách người dùng</p>
        <table class="table table-bordered border-primary table-striped">
            <thead class="table-light text-center">
                <tr>
                    <th scope="col" class="col-1">ID</th>
                    <th scope="col" class="col-2">Tên tài khoản</th>
                    <th scope="col" class="col-2">Số điện thoại</th>
                    {{-- <th scope="col" class="col-2">Mật khẩu</th> --}}
                    <th scope="col" class="col-2">Địa chỉ</th>
                    <th scope="col" class="col-2">Email</th>
                    <th scope="col" class="col-1">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($ds as $u)
                    <tr>
                        <td>{{ $u->id_khachhang }}</td>
                        <td>{{ $u->hoten }}</td>
                        <td>{{ $u->sodienthoai }}</td>
                        {{-- <td>{{ $u->matkhau }}</td> --}}
                        <td>{{ $u->diachi }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <a href="#" onclick="confirmDelete('{{ route('user.delete', ['id' => $u->id_khachhang]) }}')" class="btn btn-danger btn-sm">Xóa</a> |
                            <a href="{{ route('user.edit', ['id' => $u->id_khachhang]) }}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmDelete(url) {
        if (confirm('Bạn có chắc chắn muốn xoá người dùng này')) {
            window.location.href = url;
        }
    }
</script>
@endsection
