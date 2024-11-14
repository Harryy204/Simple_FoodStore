@extends('layouts.admin')
@section('dashboard')
    <div class="container my-5">
        <p class="cart-heading text-center mt-0 py-3 fs-5 fw-semibold">Danh sách đơn hàng</p>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-light text-center">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã DH</th>
                    <th scope="col">Người nhận</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SDT</th>
                    <th scope="col">HTTT</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Ngày nhận</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $stt = 1;
                @endphp
                @foreach ($ds as $h)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $h->code_cart }}</td>
                        <td>{{ $h->tennguoinhan }}</td>
                        <td>{{ $h->dc }}</td>
                        <td>{{ $h->sdt }}</td>
                        <td>{{ $h->thanhtoan }}</td>
                        <td>{{ $h->ngaydat }}</td>
                        <td>{{ $h->ngaynhan }}</td>
                        <td class="fw-semibold">
                            @if ($h->trangthai == 1)
                                <span class="text-warning">Chờ xác nhận</span>
                                <br>
                                <a class="btn btn-sm btn-success" href="{{ route('order.xacnhandonhang', ['code' => $h->code_cart]) }}">Giao hàng</a>
                            @elseif ($h->trangthai == 2)
                                <span class="text-primary">Đang giao</span>
                            @else
                                <span class="text-success">Đã nhận</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('order.detail', ['code' => $h->code_cart]) }}">Xem chi tiết</a> |
                            <a class="btn btn-warning btn-sm" href="{{ route('order.edit', ['code' => $h->code_cart]) }}">Sửa</a> |
                            <a href="#" onclick="confirmDelete('{{ route('order.delete', ['code' => $h->code_cart]) }}')" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(url) {
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
