@extends('welcome')
@section('content')


@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif


<main>
    <!-- Hero Area Start-->
    <!-- <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('public/frontend/assets/img/hero/about.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Hero Area End -->
    <!-- Job List Area Start -->

    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)" d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                    </svg>
                                </div>
                                <h4>Bộ lọc</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Food Category Listing start -->
                    <div class="job-category-listing mb-50">

                        <!-- single one -->
                        <div class="single-listing">

                            <div class="search-container">
                                <form action="{{ URL::to('/tim-kiem/') }}" method="get">
                                    {{csrf_field()}}
                                    <input type="text" name="keywords_submit" class="search-box" placeholder="Tìm kiếm...">
                                    <button type="submit" class="search-button">Tìm kiếm</button>
                                </form>
                            </div>
                            <br>

                            <form action="{{URL::to('/danh-muc-san-pham/')}}" method="get">
                                {{csrf_field()}}

                                @if(!empty($keywords))
                                <input name="keywords" type="hidden" value="{{$keywords}}" />
                                @endif

                                <div class="small-section-tittle2">
                                    <h4>Danh mục</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <div style="cursor: pointer; border-radius: 5px; padding: 5px;" class="border dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tất cả danh mục
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId" style="z-index: 999;">
                                        <!-- <a class="dropdown-item" href="#">Latest</a> -->
                                        @foreach($cate_product as $key => $cate)
                                        <button type="submit" name="category_id" value="{{$cate->category_id}}" class="dropdown-item" href="#">{{$cate->category_name}}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </form>

                            <!-- select-Categories End -->
                            <div class="select-Categories pt-20 pb-20"></div>
                        </div>
                        <!-- single two -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Địa điểm</h4>
                            </div>

                            <div class="select-job-items2">
                                <select name="select">
                                    <option value="">Bất kì đâu</option>
                                    <option value="">Quận Cẩm Lệ</option>
                                    <option value="">Quận Hải Châu</option>
                                    <option value="">Huyện Hoàng Sa</option>
                                    <option value="">Huyện Hòa Vang</option>
                                    <option value="">Quận Liên Chiểu</option>
                                    <option value="">Quận Ngũ Hành Sơn</option>
                                    <option value="">Quận Sơn Trà</option>
                                    <option value="">Quận Thanh Khê</option>

                                </select>

                            </div>

                            <div class="select-Categories pt-30 pb-50">

                            </div>

                        </div>
                        <!-- single three -->
                        <div class="single-listing">
                            <!-- select-Categories start -->
                            <div class="select-Categories pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Đăng trong vòng</h4>
                                </div>
                                <label class="container">Bất kỳ thời điểm
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">Hôm nay
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">2 Ngày
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">3 Ngày
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">5 Ngày
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">10 Ngày
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- select-Categories End -->
                        </div>
                        <!-- <div class="single-listing">
                            <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                <div class="small-section-tittle2">
                                    <h4>Bộ lọc</h4>
                                </div>
                                <div class="widgets_inner">
                                    <div class="range_item">
                                        <input type="text" class="js-range-slider" value="" />
                                        <div class="d-flex align-items-center">
                                            <div class="price_text">
                                                <p>Price :</p>
                                            </div>
                                            <div class="price_value d-flex justify-content-center">
                                                <input type="text" class="js-input-from" id="amount" readonly />
                                                <span>to</span>
                                                <input type="text" class="js-input-to" id="amount" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div> -->
                    </div>
                    <!-- Food Category Listing End -->
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <h2><b>Danh mục: {{$category_name}}</b></h2>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{$so_luong_bai_dang}} Kết quả được tìm thấy</span>
                                        <!-- Select job items start -->

                                        <form action="{{URL::to('/tim-kiem-nang-cao-danh-muc')}}" method="get">
                                            {{csrf_field()}}
                                            <input type="hidden" name="category_name" value="{{$category_name}}">

                                            <div class="select-job-items">

                                                <!-- <span>Sắp xếp theo</span> -->
                                                <!-- <div class="dropdown ml-4"> -->

                                                <div style="cursor: pointer; border-radius: 5px; padding: 5px;" class="border dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Sắp xếp theo giá
                                                </div>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId" style="z-index: 999;">
                                                    <!-- <a class="dropdown-item" href="#">Latest</a> -->
                                                    <button type="submit" name="price_submit" value="1" class="dropdown-item" href="#">Từ thấp đến cao</button>
                                                    <button type="submit" name="price_submit" value="2" class="dropdown-item" href="#">Từ cao đến thấp</button>
                                                </div>

                                            </div>
                                        </form>
                                        <!--  Select job items End-->
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            <!-- single-job-content -->

                            <!-- single-job-content -->

                            @foreach($bai_dang as $key => $bai)
                            @if($bai->product_qty>0)

                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{URL::to('/detail/' . $bai->id_bai_dang)}}"><img src="{{ asset('public/uploads/post/product/' . $bai->product_image) }}" alt="" width="100px"></a>

                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="{{URL::to('/detail/' . $bai->id_bai_dang)}}">
                                            <h4><b>{{$bai->product_name}}</b></h4>
                                        </a>
                                        <ul>
                                            <li><a style="color: #908080;" href="{{URL::to('/shop-details/' . $bai->id_nguoi_ban)}}"><i class="fa-solid fa-store"></i><b>{{$bai->fullname}}</b></a></li>

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

                                            @if($bai->product_qty != 0 && $bai->id_nguoi_ban != Auth::user()->id)

                                            <li>
                                                <a href="{{ route('giohang.add', $bai->product_id) }}" style="color: #2C7865;"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ hàng</a>
                                            </li>
                                            @else
                                            @endif
                                        </ul>

                                        @else
                                        <ul>
                                            <li>
                                                <a onclick="alert('Vui lòng đăng nhập để chat trực tiếp!')" href="{{URL::to('/login')}}" style="color: #2C7865;"><i class="fa-brands fa-rocketchat"></i>Chat trực tiếp</a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('/login')}}" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng!')" style="color: #2C7865;"><i class="fa-solid fa-cart-shopping"></i>Thêm vào giỏ hàng</a>
                                            </li>
                                        </ul><samp></samp>
                                        @endif
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="job_details.html">{{ \Carbon\Carbon::parse($bai->open_time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($bai->open_time_end)->format('H:i') }}
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
                                    </span>

                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <!-- <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--Pagination End  -->
    <!-- Pagination Start -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        {{ $bai_dang->appends(['category_id' => $category_id])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pagination End -->

</main>



<style>
    .dropdown .btn {
        background-color: #fff;
        color: #000;
        border-color: #ccc;
        padding: 0.375rem 1.25rem;
        font-size: 14px;
    }

    .dropdown-menu {
        background-color: #fff;
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .dropdown-menu .dropdown-item {
        color: #000;
        font-size: 14px;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .dropdown-menu .dropdown-item[type="submit"] {
        background-color: transparent;

        border: none;
        color: #000;
        padding: 0.5rem 1rem;
        font-size: 14px;
        text-align: left;
    }

    .dropdown-menu .dropdown-item[type="submit"]:hover {
        background-color: #f8f9fa;
        cursor: pointer;
    }
</style>


@endsection