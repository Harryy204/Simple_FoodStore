@extends('layouts.admin')
@section('dashboard')
<div class="container">
    <div class="row mt-4">
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số món ăn
                    <br>
                    <span class="fs-2 text-primary">
                        {{$slsp}}
                    </span>
                </p>
            </div>
        </div>
        {{-- <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số sản phẩm
                    <br>
                    <span class="fs-2 text-primary">
                        {{$slsptong}}
                    </span>
                </p>
            </div>
        </div> --}}
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tài khoản đã đăng ký
                    <br>
                    <span class="fs-2 text-primary">
                        {{$tk}}
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Số lượng danh mục
                    <br>
                    <span class="fs-2 text-primary">
                        {{$slhsp}}
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Tổng số món ăn đã bán
                    <br>
                    <span class="fs-2 text-primary">
                        {{$spdb}}
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng hôm nay
                    <br>
                    <span class="fs-2 text-primary">
                        {{$dh_hn}}
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng chờ xác nhận
                    <br>
                    <span class="fs-2 text-primary">
                        {{$sl_dh_xl}}
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng đang giao
                    <br>
                    <span class="fs-2 text-primary">
                        {{$sl_dh_dg}}
                    </span>
                </p>
            </div>
        </div>
        <div class="col-3 " style="height: 120px">
            <div class="border border-primary rounded d-flex align-items-center justify-content-center w-100 h-100">
                <p class="text-center fw-medium text-body my-0">
                    Đơn hàng giao thành công
                    <br>
                    <span class="fs-2 text-primary">
                        {{$sl_dh_tc}}
                    </span>
                </p>
            </div>
        </div>
    </div>
    
</div>
@endsection
