@extends('layouts.clients')
@section('content')
    <div class="container" style="margin-top: 52px; margin-bottom: 86px">
        <div class="row">
            <div class="col-md-6">
                <div class="hinhanh_sanpham">
                    <img src="{{ asset('assets/uploads/' . $product->hinhanh) }}" style="width: 550px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="chitiet_sanpham">
                    <h3 style="margin: 8px 0px;">{{ $product->ten_sp }}</h3>
                    
                    <div class="price d-flex ">
                        <h5 class="gia-now text-danger">Giá: {{ number_format($product->gia, 0, ',', '.') }}
                            VNĐ</h5>
                    </div>
                    <div class="soluong-sp">
                        <div class="row">
                            <p class="soluong-sp-p"><b>Số lượng:</b></p>
                            <div class="col-md-6">
                                <div class="soluong-container">
                                    <div class="soluong-sp-dem">
                                        <a class="soluong-sp-dem-icon" href="#"><i class="fa-solid fa-minus"></i></a>
                                        <input class="soluong-sp-input text-center ms-2 me-2" type="text" name="soluong"
                                            value="1" style="width:30px">
                                        <a class="soluong-sp-dem-icon" href="#"><i class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="soluong-sp-info" style="margin:0 -70px">
                                    <p class="soluong-sp-cosan d-inline text-muted">
                                        {{ $product->soluong }}</p>
                                    <span class="soluong-sp-cosan-text d-inline text-muted">Món ăn còn sẵn</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="mota">
                        <p class="mota-text"><b>Danh mục món ăn: </b>{{ $product->tenhangsp }} </p>
                    </div>
                    
                    <div class="mota">
                        <p class="mota-text"><b>Mô tả:</b> {{ $product->mota }}</p>
                    </div>
                    <div class="rating d-flex align-items-center">
                        {{-- <span class="review-no mr-2 text-warning">5.0</span> --}}
                        <div style="" class="stars mb-2">
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                            <span class="fa fa-star checked text-warning"></span>
                        </div>
                    </div>

                    <div class="input-themcart d-inline-flex align-items-center bg-danger rounded">
                        <button type="button" data-id="{{ $product->id_sp }}"
                            class="btn btn-danger px-3 py-2 add-to-cart">
                            <i class="fa-solid fa-cart-plus text-white mr-2"></i>
                            Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script type="text/javascript">
        var soluong = document.querySelector('.soluong-sp-input');
        var demPlus = document.querySelector('.soluong-sp-dem-icon .fa-plus');
        var demMins = document.querySelector('.soluong-sp-dem-icon .fa-minus');

        demPlus.addEventListener('click', function() {
            // console.log("Before increment:", soluong.value);
            soluong.value = Number(soluong.value) + 1;
            // console.log("After increment:", soluong.value);
            // soluong.value = Number(soluong.value) + 1;
        });

        demMins.addEventListener('click', function() {
            soluong.value = Number(soluong.value) - 1;
        });
    </script>
@endsection
