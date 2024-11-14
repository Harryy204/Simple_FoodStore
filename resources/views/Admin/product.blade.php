@extends('layouts.admin')

@section('dashboard')
    <div class="container">
        <h4 class="mt-3 mb-4 text-center">Quản lý sản phẩm</h4>
        <form action="{{ route('product.postcreate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold text-primary mb-4">Thêm sản phẩm:</h5>

                    @foreach ([
                        ['Mã sản phẩm', 'masp', 'text', ''],
                        ['Tên sản phẩm', 'tensp', 'text', ''],
                        ['Hình ảnh', 'hinhanh', 'file', ''],
                        ['Danh mục', 'idhangsp', 'select', $hang],
                        ['Giá', 'giasp', 'number', '']
                    ] as $field)
                        <div class="input-group input-group-sm mb-3">
                            <label for="{{ $field[1] }}" class="form-label col-4 fw-bold">{{ $field[0] }}</label>
                            @if ($field[2] == 'select')
                                <select name="{{ $field[1] }}" class="form-control col-8">
                                    @foreach ($field[3] as $item)
                                        <option value="{{ $item->id_hangsp }}">{{ $item->tenhangsp }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="{{ $field[2] }}" class="form-control col-8" name="{{ $field[1] }}" {{ $field[3] }} />
                            @endif
                           
                        </div> 
                        @if ($errors->has($field[1]))
                            <span class="text-danger">{{ $errors->first($field[1]) }}</span>
                        @endif
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h5 class="fw-bold text-primary mb-4">Thông tin chi tiết:</h5>

                    @foreach ([
                        ['Mô tả', 'motasp', 'textarea', ''],
                        ['Số lượng', 'soluongsp', 'number', ''],
                        ['Đã bán', 'dabansp', 'number', ''],
                        ['Trạng thái', 'trangthaisp', 'select', ['1' => 'Đang bán', '0' => 'Ẩn']],
                        ['Ngày bán', 'timerammat', 'datetime-local', '']
                    ] as $field)
                        <div class="input-group input-group-sm mb-3">
                            <label for="{{ $field[1] }}" class="form-label col-4 fw-bold">{{ $field[0] }}</label>
                            @if ($field[2] == 'select')
                                <select name="{{ $field[1] }}" class="form-control col-8">
                                    @foreach ($field[3] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="{{ $field[2] }}" class="form-control col-8" name="{{ $field[1] }}" />
                            @endif
                            
                        </div>
                        @if ($errors->has($field[1]))
                            <span class="text-danger">{{ $errors->first($field[1]) }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg w-50 fw-bold">Thêm Sản Phẩm</button>
            </div>
        </form>

        <div class="mt-4">
            <h4 class="fs-5 text-center fw-bold text-primary">Danh sách sản phẩm</h4>
            <table class="table table-striped table-bordered table-hover">
                
                <thead class="table-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã món</th>
                        <th scope="col" >Tên món</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Đã bán</th>
                        <th scope="col">Trạng Thái</th>
                        <th class="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php $stt = 1; @endphp
                    @foreach ($ds as $sp)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{ $sp->ma_sp }}</td>
                            <td>{{ $sp->ten_sp }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/' . $sp->hinhanh) }}" class="img-thumbnail" width="100px" />
                            </td>
                            <td>{{ $sp->id_hangsp }}</td>
                            <td>{{ $sp->mota }}</td>
                            <td>{{ $sp->soluong }}</td>
                            <td>{{ $sp->daban }}</td>
                            <td>{{ $sp->trangthai == 1 ? 'Đang bán' : 'Ẩn' }}</td>
                            <td>
                                <a href="#" onclick="confirmDelete('{{ route('product.delete', ['id' => $sp->id_sp]) }}')" class="btn btn-danger btn-sm">Xóa</a> | 
                                <a href="{{ route('product.edit', ['id' => $sp->id_sp]) }}" class="btn btn-warning btn-sm">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">{{ $ds->links() }}</div>
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            if (confirm('Bạn có chắc chắn muốn xóa món ăn này')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
