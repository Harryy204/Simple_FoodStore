@extends('layouts.clients')

{{-- @section('style')
<link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet"> --}}
<style>
    .team-item {
        border: 2px solid #f0f0f0;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .team-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .team-item .btn-square {
        transition: transform 0.3s ease;
    }

    .team-item:hover .btn-square {
        transform: scale(1.1);
    }
</style>
{{-- @endsection --}}

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="https://demo.htmlcodex.com/2098/bootstrap-restaurant-template/img/about-1.jpg" alt="Ảnh 1">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="https://demo.htmlcodex.com/2098/bootstrap-restaurant-template/img/about-2.jpg" style="margin-top: 25%;" alt="Ảnh 2">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="https://demo.htmlcodex.com/2098/bootstrap-restaurant-template/img/about-3.jpg" alt="Ảnh 3">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="https://demo.htmlcodex.com/2098/bootstrap-restaurant-template/img/about-4.jpg" alt="Ảnh 4">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-warning fw-bold">Về Chúng Tôi</h5>
                <h2 class="mb-4 fw-bold">Chào Mừng Đến Với GoodFood <i class="fa fa-utensils text-warning me-2"></i></h2>
                <p class="mb-4">Chúng tôi cung cấp những món ăn ngon và đậm đà hương vị, với nguyên liệu tươi ngon nhất được chọn lọc kỹ càng từ các nguồn cung cấp đáng tin cậy. Chúng tôi cam kết đem đến trải nghiệm ẩm thực tuyệt vời cho mọi thực khách.</p>
                <p class="mb-4">Chúng tôi tự hào là nơi bạn có thể tìm thấy các món ăn đa dạng, từ các món truyền thống đến các món hiện đại, với đội ngũ đầu bếp tài ba và nhiệt huyết. Hãy đến và thưởng thức những món ăn tuyệt vời tại nhà hàng của chúng tôi.</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-warning px-3">
                            <h1 class="flex-shrink-0 display-5 text-warning mb-0" data-toggle="counter-up">100</h1>
                            <div class="ps-4">
                                <p class="mb-0">Món Ăn</p>
                                <h6 class="text-uppercase mb-0">từ nhiều nước</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-warning px-3">
                            <h1 class="flex-shrink-0 display-5 text-warning mb-0" data-toggle="counter-up">100</h1>
                            <div class="ps-4">
                                <p class="mb-0">Đầu Bếp Nổi Tiếng</p>
                                <h6 class="text-uppercase mb-0">Hàng đầu thế giới</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-warning py-3 px-5 mt-2" href="#">Xem Thêm</a>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-warning fw-normal">Các Thành Viên Trong Đội</h5>
            <h1 class="mb-5 fw-bold">Đội Ngũ Đầu Bếp Hàng Đầu Thế Giới</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center  overflow-hidden">
                    <div class="border-5 overflow-hidden m-4">
                        <img class="img-fluid" src="{{ asset('assets/imgs/gordon.jpg') }}" style="height:245px" alt="Thành viên 1">
                    </div>
                    <h5 class="mb-0">Gordon Ramsay</h5> 
                    <div class="d-flex justify-content-center mt-3 mb-4">
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item text-center overflow-hidden">
                    <div class=" overflow-hidden m-4" >
                        <img class="img-fluid" src="{{ asset('assets/imgs/joe.jpg') }}" style="height: 245px" alt="Thành viên 2">
                    </div>
                    <h5 class="mb-0">Joe Bastianich</h5>
                    <div class="d-flex justify-content-center mt-3 mb-4">
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item text-center overflow-hidden">
                    <div class=" overflow-hidden m-4">
                        <img class="img-fluid" src="{{ asset('assets/imgs/graham.jpg') }}" style="width:245px" alt="Thành viên 3">
                    </div>
                    <h5 class="mb-0">Graham Elliot</h5>
                    <div class="d-flex justify-content-center mt-3 mb-4">
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item text-center overflow-hidden">
                    <div class=" overflow-hidden m-4">
                        <img class="img-fluid" src="{{ asset('assets/imgs/tosi.jpg') }}" style="height:245px" alt="Thành viên 4">
                    </div>
                    <h5 class="mb-0">Christina Tosi</h5>
                    <div class="d-flex justify-content-center mt-3 mb-4">
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-warning mx-1" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
