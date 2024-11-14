@extends('layouts.clients')

@section('style')
<link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
@endsection
<style>
    .custom-primary {
        background-color: rgb(255, 203, 48) !important;
        border-color: rgb(255, 203, 48) !important;
        font-weight: bold;
    }

    iframe {
        border-radius: 10px;
    }

    .form-floating > label {
        font-size: 0.95rem;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.7);
    }

    .form-control {
        border-radius: 10px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: rgb(255, 203, 48) !important;
        box-shadow: 0 0 5px rgba(255, 203, 48, 0.6);
    }

    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: rgb(255, 203, 48);
    }

    .row.g-3 {
        margin-bottom: 2rem;
    }

    .col-md-6 {
        padding: 15px;
    }
    .contact-box {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .contact-box:hover {
        background-color: rgb(245, 248, 82);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .contact-box i {
        font-size: 1.3rem;
    }
</style>

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-warning fw-bold">Liên Hệ Với Chúng Tôi</h5>
            <h1 class="mb-5 uppercase">Liên Hệ Để Giải Đáp Mọi Thắc Mắc</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="contact-box rounded p-4 shadow-lg">
                            <p><i class="fa fa-envelope-open text-warning me-2"></i>goodfood@gmail.com</p>
                            <p class="mt-2"><i class="fa fa-phone-alt text-warning me-2"></i>(+84) 123-456-789</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-box rounded p-4 shadow-lg">
                            <p><i class="fa fa-envelope-open text-warning me-2"></i>goodfood@gmail.com</p>
                            <p class="mt-2"><i class="fa fa-phone-alt text-warning me-2"></i>(+84) 123-456-789</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-box rounded p-4 shadow-lg">
                            <p><i class="fa fa-envelope-open text-warning me-2"></i>goodfood@gmail.com</p>
                            <p class="mt-2"><i class="fa fa-phone-alt text-warning me-2"></i>(+84) 123-456-789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.860589024336!2d108.15555157495511!3d16.072722584607302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218d8e079dde1%3A0xe3e52d75710ca396!2zVHJ1bmcgdMOibSBIw6BuaCBjaMOtbmggUXXhuq1uIExpw6puIENoaeG7g3U!5e0!3m2!1sen!2sbd!4v1731537590289!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Tên Của Bạn">
                                    <label for="name">Tên Của Bạn</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Email Của Bạn">
                                    <label for="email">Email Của Bạn</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Chủ Đề">
                                    <label for="subject">Chủ Đề</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Điền vấn đề của bạn" id="message" style="height: 150px"></textarea>
                                    <label for="message">Nội dung</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn custom-primary w-100 py-3 fs-5 " type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
