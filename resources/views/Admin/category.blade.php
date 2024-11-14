@extends('layouts.admin')
@section('dashboard')
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mt-3 mb-4 text-center">Quản lý danh mục món ăn</h4>
                        <h5 class="fw-normal mb-3">Thêm danh mục món ăn:</h5>
                        <form action="{{ route('category.create') }}" method="POST">
                            @csrf
                            <div class="input-group input-group-sm mb-2 row">
                                <p class="fs-6 mb-0 col-4">Tên danh mục</p>
                                <input type="text" class="form-control col-8" name="tenhangsp">
                            </div>
                            @if ($errors->has('tenhangsp'))
                                <div class="alert alert-danger" style="background: none; border:none; color:red">
                                    <strong>{{ $errors->first('tenhangsp') }}</strong>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary btn-sm" name="themhangsp">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mt-3 mb-4 text-center">Quản lý mức giá</h4>
                        <h5 class="fw-normal mb-3">Thêm mức giá:</h5>
                        <form action="{{ route('category.postprice') }}" method="post">
                            @csrf
                            <div class="input-group input-group-sm mb-2 row">
                                <p class="fs-6 mb-0 col-4">Mức giá</p>
                                <input type="text" class="form-control col-8" name="mucgia" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="themmucgia">Thêm</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="container-xxl mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Danh sách loại món ăn</h5>
                        <table class="table table-bordered border-primary caption-top">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-3">Mã món ăn</th>
                                    <th scope="col" class="col-4">Tên món ăn</th>
                                    <th scope="col" class="col-2">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $hang)
                                    <tr>
                                        <td> {{ $hang->id_hangsp }} </td>
                                        <td> {{ $hang->tenhangsp }} </td>
                                        <td>
                                            <a href="#" onclick="confirmDelete('{{ route('category.delete', ['id' => $hang->id_hangsp]) }}')" class="btn btn-danger btn-sm">Xóa</a> | 
                                            <a href="{{ route('category.edit', ['id' => $hang->id_hangsp]) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Danh sách mức giá</h5>
                        <table class="table table-bordered border-primary caption-top">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-3">Mã Mức Giá</th>
                                    <th scope="col" class="col-4">Mức Giá</th>
                                    <th scope="col" class="col-3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dsg as $item)
                                    <tr>
                                        <td>{{ $item->id_mucgia }}</td>
                                        <td>{{ $item->mucgia }}</td>
                                        <td>
                                            <a href="#" onclick="confirmDelete('{{ route('category.deleteprice', ['id' => $item->id_mucgia]) }}')" class="btn btn-danger btn-sm">Xóa</a>
                                            <a href="{{ route('category.editprice', ['id' => $item->id_mucgia]) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script>
        function confirmDelete(url) {
            if (confirm('Bạn có chắc chắn muốn xóa mục này')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
