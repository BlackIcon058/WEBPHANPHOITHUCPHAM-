@extends('welcome')
@section('content')

<style>
    #header-carousel {
        display: none;
    }
</style>

<div style="margin-top: -100px">
    <!-- Modal Search Start -->
    <!-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal Search End -->


    <!-- Main Post Section Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img src="{{asset('public/frontend/news/img/tin34.png')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 phút đọc</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Lượt xem</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> Bình luận</a>
                            <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Chia sẻ</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="{{URL::to('/detail-news3')}}" class="display-4 text-dark mb-0 link-hover">Điểm danh 5 trang phục truyền thống Việt Nam đặc biệt nhất</a>
                    </div>
                    <p class="mt-3 mb-4">
                    Áo dài là trang phục truyền thống của Việt Nam. Nó được coi là biểu tượng đặc trưng của văn hóa và sự thanh lịch của phụ nữ Việt Nam.

Áo dài gồm hai phần chính: áo và váy. Áo dài có kiểu dáng ôm sát, tôn lên vẻ đẹp và đường cong của người mặc. Áo thường dài tới đùi hoặc gối, có đường cổ cao và tay dài.  Váy dài đến mắt cá chân hoặc thậm chí tới gót chân, mang lại cảm giác trang nhã và nữ tính.
                    </p>
                    <div class="bg-light p-4 rounded">
                        <div class="news-2">
                            <h3 class="mb-4">Đọc nhiều nhất</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="{{asset('public/frontend/news/img/avt5.png')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="{{URL::to('/detail-news2')}}" class="h3">TOP 15 cách phối đồ với áo sơ mi form rộng chuẩn thời trang</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="{{asset('public/frontend/news/img/avt6.png')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="{{URL::to('/detail-news1')}}" class="h3">10 cách phối đồ với áo khoác gió bomber nữ DẪN ĐẦU XU HƯỚNG</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="{{asset('public/frontend/news/img/avt4.png')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="{{URL::to('/detail-news2')}}" class="h3">TOP 15+ kiểu tóc xoăn bé trai đáng yêu và siêu sành điệu</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="rounded overflow-hidden">
                                    <img src="{{asset('public/frontend/news/img/avt8.png')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="#" class="h4 mb-2">Thời trang nữ xu hướng</a>
                                    <p class="fs-5 mb-0"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="fs-5 mb-0"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt9.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">1001 cách phối đồ với áo hoodie trẻ em SIÊU HOT</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt10.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">5 mẫu áo dài bé trai & Cách chọn áo dài Tết cho bé trai</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt11.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">5 TIPS lựa chọn quần áo trẻ em 10 tuổi hiện đại, năng động</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt12.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Gợi ý TOP 5 đôi giày cao gót trẻ em xinh xắn, dễ thương</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt13.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">20+ Cách phối đồ cho bé gái theo từng độ tuổi siêu đáng yêu</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{asset('public/frontend/news/img/avt14.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Thời trang tuổi 15: 12+ tips phối đồ siêu cá tính, đáng yêu</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid py-5" style="margin-top: -200px;">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    <div class="position-relative overflow-hidden rounded">
                        <img src="img/news-1.jpg')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 phút đọc</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Lượt xem</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> Bình luận</a>
                            <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Chia sẻ</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <a href="{{URL::to('/detail-news1')}}" class="display-4 text-dark mb-0 link-hover">Lorem Ipsum is simply dummy text of the printing</a>
                    </div>
                    <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley standard dummy text ever since the 1500s, when an unknown printer took a galley...
                    </p>
                    <div class="bg-light p-4 rounded">
                        <div class="news-2">
                            <h3 class="mb-4">Đọc nhiều nhất</h3>
                        </div>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="rounded overflow-hidden">
                                    <img src="img/news-2.jpg')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column">
                                    <a href="{{URL::to('/detail-news2')}}" class="h3">Stoneman Clandestine Ukrainian claims successes against Russian.</a>
                                    <p class="mb-0 fs-5"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="mb-0 fs-5"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="rounded overflow-hidden">
                                    <img src="img/news-3.jpg')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <a href="#" class="h4 mb-2">Get the best speak market, news.</a>
                                    <p class="fs-5 mb-0"><i class="fa fa-clock"> 06 phút đọc</i> </p>
                                    <p class="fs-5 mb-0"><i class="fa fa-eye"> 3.5k Lượt xem</i></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-3.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-4.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-5.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-6.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-7.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-4 align-items-center">
                                    <div class="col-5">
                                        <div class="overflow-hidden rounded">
                                            <img src="img/news-7.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="features-content d-flex flex-column">
                                            <a href="{{URL::to('/detail-news1')}}" class="h6">Get the best speak market, news.</a>
                                            <small><i class="fa fa-clock"> 06 phút đọc</i> </small>
                                            <small><i class="fa fa-eye"> 3.5k Lượt xem</i></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Main Post Section End -->

    <!-- Latest News Start -->
    <!-- <div class="container-fluid latest-news py-5">
        <div class="container py-5">
            <h2 class="mb-4">Latest News</h2>
            <div class="latest-news-carousel owl-carousel">
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="img/news-7.jpg')}}" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="img/news-6.jpg')}}" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="img/news-3.jpg')}}" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="img/news-4.jpg')}}" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="latest-news-item">
                    <div class="bg-light rounded">
                        <div class="rounded-top overflow-hidden">
                            <img src="img/news-5.jpg')}}" class="img-zoomin img-fluid rounded-top w-100" alt="">
                        </div>
                        <div class="d-flex flex-column p-4">
                            <a href="#" class="h4 ">Lorem Ipsum is simply dummy text of...</a>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="small text-body link-hover">by Willum Skeem</a>
                                <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Latest News End -->
</div>

<script src="{{asset('public/frontend/news/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('public/frontend/news/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('public/frontend/news/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('public/frontend/news/js/main.js')}}"></script>



@endsection