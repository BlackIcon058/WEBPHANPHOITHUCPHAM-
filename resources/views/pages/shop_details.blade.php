@extends('welcome')
@section('content')




<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="hero-cap text-center">
                            @foreach($shop_detail as $shop_detail)
                            <a href="#"><img src="{{asset('public/uploads/avt/' . $shop_detail->avatar)}}" width="200px" height="200px" style="border-radius: 100%;" alt=""></a>
                            <h2>{{$shop_detail->fullname}}</h2>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <!-- <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-list1.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>Nhà hàng 5 sao</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Giới thiệu</h4>
                            </div>
                            <p>{{$shop_detail->intro}}</p>
                        </div>
                        <!-- <div class="post-details2  mb-50">
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <ul>
                                <li>System Software Development</li>
                                <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                <li>Research and code , libraries, APIs and frameworks</li>
                                <li>Strong knowledge on software development life cycle</li>
                                <li>Strong problem solving and debugging skills</li>
                            </ul>
                        </div>
                        <div class="post-details2  mb-50">
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                            <ul>
                                <li>3 or more years of professional design experience</li>
                                <li>Direct response email experience</li>
                                <li>Ecommerce website design experience</li>
                                <li>Familiarity with mobile and web apps preferred</li>
                                <li>Experience using Invision a plus</li>
                            </ul>
                        </div> -->
                    </div>


                    <hr>

                    <div>
                        <h4>Bài đăng</h4>
                    </div>

                    @foreach($bai_dang as $key => $bai)

                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{URL::to('/detail/' . $bai->id_bai_dang)}}"><img src="{{ asset('public/uploads/post/product/' . $bai->product_image) }}" alt="" width="100px"></a>

                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="{{URL::to('/detail/' . $bai->id_bai_dang)}}">
                                    <h4>{{$bai->product_name}}</h4>
                                </a>
                                <ul>
                                    <li><a style="color: #908080;" href="{{URL::to('/shop-details/' . $bai->id_nguoi_ban)}}"><i class="fa-solid fa-store"></i>{{$bai->fullname}}</a></li>

                                </ul>
                                <ul>
                                    <li><i class="fa-solid fa-weight-scale"></i>Còn lại: {{$bai->product_qty}} {{$bai->don_vi_sp}}</li>
                                    <li style="margin-left: 15px;"><i class="fa-solid fa-money-check"></i>{{$bai->product_price}} VNĐ</li>
                                </ul>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$bai->address}}</li>
                                </ul>
                                @if(Auth::check())

                                <ul>
                                    <li>
                                        <a target="_blank" href="{{URL::to('/chatify/' . $bai->id_nguoi_ban)}}" style="color: #2C7865;"><i class="fa-brands fa-rocketchat"></i>Chat trực tiếp</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('giohang.add', $bai->product_id) }}" style="color: #2C7865;"><i class="fa-solid fa-cart-shopping"></i>Đặt hàng</a>
                                    </li>
                                </ul>

                                @else
                                <ul>
                                    <li>
                                        <a onclick="alert('Vui lòng đăng nhập để chat trực tiếp!')" href="{{URL::to('/login')}}" style="color: #2C7865;"><i class="fa-brands fa-rocketchat"></i>Chat trực tiếp</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/login')}}" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng!')" style="color: #2C7865;"><i class="fa-solid fa-cart-shopping"></i>Đặt hàng</a>
                                    </li>
                                </ul><samp></samp>
                                @endif
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <!-- <a href="job_details.html">{{ \Carbon\Carbon::parse($bai->open_time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($bai->open_time_end)->format('H:i') }} -->
                            </a>



                            @php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngayDang = \Carbon\Carbon::parse($bai->ngay_dang);
                            $ngayHienTai = now();

                            $khoangThoiGian = $ngayHienTai->diff($ngayDang);

                            $ngay = $khoangThoiGian->d;
                            $gio = $khoangThoiGian->h;
                            $phut = $khoangThoiGian->i;
                            $giay = $khoangThoiGian->s;
                            @endphp
                            <span>
                                @if ($ngay > 0)
                                {{ $ngay }} ngày
                                @endif
                                {{ $gio }} giờ {{ $phut }} phút trước


                        </div>
                    </div>

                    <!-- <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-list2.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="#">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>VNĐ3500 - VNĐ4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div>
                   
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="#"><img src="{{asset('public/frontend/assets/img/icon/job-list3.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle job-tittle2">
                                <a href="#">
                                    <h4>Digital Marketer</h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                    <li>VNĐ3500 - VNĐ4000</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link items-link2 f-right">
                            <a href="job_details.html">Full Time</a>
                            <span>7 hours ago</span>
                        </div>
                    </div> -->

                    @endforeach

                    <!-- Pagination Start -->
                    <div class="pagination-area pb-115 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-wrap d-flex justify-content-center">
                                        {{ $bai_dang->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination End -->

                </div>



                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Tổng quan</h4>
                        </div>
                        <ul>
                            <!-- <li>Posted date : <span>12 Aug 2019</span></li> -->
                            <li>Địa chỉ : <span>{{$shop_detail->address}}</span></li>
                            <!-- <li>Vacancy : <span>02</span></li> -->
                            <li>Thời gian hoạt động : <span>{{ \Carbon\Carbon::parse($shop_detail->open_time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($shop_detail->open_time_end)->format('H:i') }}</span></li>
                            <li>Số đơn thành công : <span>{{$numOrderSuccess}}</span></li>
                            <li>Ngày tham gia : <span>{{ \Carbon\Carbon::parse($shop_detail->created_at)->format('d-m-Y') }}</span></li>
                        </ul>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- <div class="ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                            </div> -->


                            <div class="ratings">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$averageRating) <i class="fa fa-star rating-color"></i>
                                    @elseif ($i > $averageRating && $i - 1 < $averageRating) <i class="fa fa-star-half-alt rating-color"></i>
                                        @else
                                        <i class="fa fa-star"></i>
                                        @endif
                                        @endfor
                            </div>
                            <!-- averageRating -->
                            <h5 class="review-count">{{$numRating}} Đánh giá</h5>
                        </div>
                        <br><br>
                        <div class="apply-btn2">
                            <a target="_blank" href="{{URL::to('/chatify/' . $shop_detail->id)}}" class="btn">Chat trực tiếp</a>
                        </div>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Thông tin liên hệ</h4>
                        </div>
                        <!-- <span>Colorlib</span>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout.</p> -->
                        <ul>
                            <!-- <li>Name: <span>Colorlib </span></li>
                            <li>Web : <span> colorlib.com</span></li> -->
                            <li>Số điện thoại : <span> {{$shop_detail->phone}}</span></li>
                            <li>Email: <span>{{$shop_detail->email}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->



</main>


<style>
    .ratings {
        margin-right: 10px;
    }

    .ratings i {
        color: #cecece;
        font-size: 25px;
    }

    .rating-color {
        color: #fbc634 !important;
    }

    .review-count {
        font-weight: 400;
        margin-bottom: 2px;
        font-size: 24px !important;
    }
</style>

@endsection