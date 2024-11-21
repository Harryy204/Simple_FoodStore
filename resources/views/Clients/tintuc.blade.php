@extends('layouts.clients')

@section('style')
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
@endsection
<style>
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        background-color: transparent;
        color: rgb(255, 203, 48);
        /* border: 2px solid rgb(255, 203, 48);  */
        border-radius: 0;
        padding: 8px 16px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
        font-size: 16px;
    }

    .pagination .page-link:hover {
        background-color: rgba(255, 203, 48, 0.1);
        color: rgb(255, 203, 48);
        border-color: rgb(255, 203, 48);
    }

    .pagination .page-item.active .page-link {
        background-color: rgb(255, 203, 48);
        border-color: rgb(255, 203, 48);
        color: white;
        font-weight: 700;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f0f0f0;
        color: #b0b0b0;
        border-color: #f0f0f0;
    }

    .pagination .page-item i {
        font-size: 24px;
        color: rgb(255, 203, 48);
    }
</style>
@section('content')
    <main class="main">
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="fw-bold text-warning">Tin Tức</h1>
                            <p class="mb-0 fw-bold">Cập nhật những thông tin mới nhất, chia sẻ kiến thức và kinh nghiệm từ nhiều
                                lĩnh vực khác nhau. Hãy đọc và khám phá thêm nhiều bài viết hữu ích.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="blog-posts" class="blog-posts section py-5">

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 gy-4">

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n1.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Admin</p>
                                        <p class="post-date mb-0"><time datetime="2024-01-01">1 Tháng 1, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n2.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Amin</p>
                                        <p class="post-date mb-0"><time datetime="2024-06-05">5 Tháng 6, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n1.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Amin</p>
                                        <p class="post-date mb-0"><time datetime="2024-06-22">22 Tháng 6, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n2.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Admin</p>
                                        <p class="post-date mb-0"><time datetime="2024-06-30">30 Tháng 6, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n1.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Admin</p>
                                        <p class="post-date mb-0"><time datetime="2024-01-30">30 Tháng 1, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col">
                        <article class="card shadow-sm border-light">
                            <img src="https://themewagon.github.io/delfood/images/n2.jpg" style="height: 300px" alt="Hình ảnh blog" class="card-img-top">
                            <div class="card-body">
                                <p class="post-category text-warning fw-bold">Ẩm thực</p>
                                <h5 class="card-title">
                                    <a href="#" class="text-dark fw-bold">Tìm hiểu về ẩm thực Việt Nam và các nước trên thế giới</a>
                                </h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="{{ asset('assets/imgs/admin.png') }}" alt="Hình ảnh tác giả"
                                        class="img-fluid post-author-img flex-shrink-0 rounded-circle"
                                        style="width: 40px; height: 40px;">
                                    <div class="post-meta ms-2">
                                        <p class="post-author mb-0">Admin</p>
                                        <p class="post-date mb-0"><time datetime="2024-11-1">1 Tháng 11, 2024</time></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>
            </div>

        </section>

        <section id="blog-pagination" class="blog-pagination section py-5">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                        <li class="page-item"><a class="page-link" href="#">10</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>




    </main>
@endsection
