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
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>UI/UX Designer</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Hero Area End -->
    <!-- job post company Start -->

    @foreach($bai_dang as $key => $bai)

    <div class="job-post-company pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <!-- <div class="col-xl-7 col-lg-7"> -->
                <!-- job single -->
                <!-- <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ asset('public/uploads/post/product/' . $bai->product_image) }}" width="120px" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{$bai-> product_name}}</h4>
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
                <!-- 
                    <div style="margin-bottom: 50px;">

                    </div>
                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            
                            <div class="small-section-tittle">
                                <h4>Mô tả sản phẩm</h4>
                            </div>
                            <p>{{$bai-> product_desc}}</p>
                        </div>
                        <div class="post-details2  mb-50">
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
                        </div>
                    </div> -->

                <!-- </div> -->
                <!-- Right Content -->
                <div class="col-xl-6 col-lg-6" style="margin: 0 auto;">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle" style="text-align: center;">
                            <h2><b>{{$bai-> product_name}}</b></h2>
                        </div>
                        <br>
                        <div style="text-align: center;">
                            <img src="{{ asset('public/uploads/post/product/' . $bai->product_image) }}" width="400px" alt="">
                        </div>
                        <br>
                        <ul>
                            <?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $het_han = \Carbon\Carbon::parse($bai->het_han)->format('H:i d:m:Y');
                            ?>
                            <li>Ngày hết hạn bán : <span> {{$het_han}} </span></li>

                            <li>Cửa hàng: <span>{{$bai->fullname}}</span></li>
                            <li>Địa chỉ : <span>{{$bai->address}}</span></li>
                            <li>Số lượng còn lại : <span>{{$bai->product_qty}} {{$bai->don_vi_sp}}</span></li>
                            <li>Giá tiền : <span>{{$bai->product_price}} VNĐ</span></li>
                            <!-- <li>Số lượng đánh giá : <span>12</span></li> -->
                        </ul>
                        <div>
                            <h5>Mô tả sản phẩm</h5>
                            <p>{{$bai->product_desc}}</p>
                        </div>

                        <br>




                        @if(Auth::check())
                        @php
                        $currentDateTime = now();
                        @endphp

                        @if($bai->product_qty != 0 && $bai->id_nguoi_ban != Auth::user()->id && $currentDateTime < $bai->het_han)
                            <div class="apply-btn2" style="text-align: center;">
                                <a href="{{ route('giohang.add', $bai->product_id) }}" class="btn">Thêm vào giỏ hàng</a>
                            </div>
                            @else


                            @endif
                            @else

                            <div class="apply-btn2" style="text-align: center;">
                                <a href="{{URL::to('/login')}}" onclick="alert('Vui lòng đăng nhập để thêm vào giỏ hàng!')" class="btn">Thêm vào giỏ hàng</a>
                            </div>


                            @endif



                    </div>

                    <!-- <div class="post-details4  mb-50">
                        
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>Colorlib</span>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout.</p>
                        <ul>
                            <li>Name: <span>Colorlib </span></li>
                            <li>Web : <span> colorlib.com</span></li>
                            <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

    <hr>

    <!-- comment -->
    @if(Auth::check())
    <div class="container bootdey" style="padding-bottom: 50px;">
        <h4>Bình luận</h4>
        <div class="col-md-12 bootstrap snippets">
            <div class="panel">
                <form action="{{URL::to('/submit-comment')}}" method="POST">
                    @csrf
                    <input type="hidden" class="post_id" name="post_id" value="{{$bai->id_bai_dang }}">
                    <input type="hidden" class="user_id" name="user_id" value="{{Auth::user()->id}}">

                    <div class="panel-body">
                        <textarea class="form-control" name="comment" rows="2" placeholder="Bình luận với vai trò {{Auth::user()->name}}" required></textarea>
                        <div class="mar-top clearfix">
                            <button class="btn btn-sm  pull-right" type="submit"><i class="fa fa-comment fa-fw"></i>Gửi bình luận</button>
                            <!-- <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                        <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                        <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a> -->
                        </div>
                    </div>
                </form>
            </div>


            <div class="panel">
                <div class="panel-body">
                    @foreach($comment as $key3 => $comm)

                    <div class="media-block">
                        <a class="media-left" style="margin-right: 10px;" href="{{ URL::to('/user-profile/' . $comm->user_id) }}"><img class="img-circle img-sm" alt="Profile Picture" src="{{ asset('public/uploads/avt/' . $comm->avatar) }}"></a>
                        <div class="media-body">
                            <form action="{{URL::to('/edit-comment')}}" method="post">
                                @csrf
                                <div class="mar-btm">
                                    <a href="{{ URL::to('/user-profile/' . $comm->user_id) }}" class="btn-link text-semibold media-heading box-inline">{{$comm->name}}</a>
                                    @php
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                                    $ngayDang = \Carbon\Carbon::parse($comm->comment_date);
                                    $ngayHienTai = now();

                                    $khoangThoiGian = $ngayHienTai->diff($ngayDang);

                                    $gio = $khoangThoiGian->h;
                                    $phut = $khoangThoiGian->i;
                                    @endphp
                                    <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> Đã bình luận - {{ $gio }} giờ {{ $phut }} phút trước</p>

                                </div>

                                @if(Auth::user()->id == $comm->user_id)
                                <!-- <p>{{$comm->comment}}</p> -->
                                <textarea name="comment" id="" cols="50" rows="3">{{$comm->comment}}</textarea>

                                <input type="hidden" class="comment_id" name="comment_id" value="{{$comm->comment_id}}">
                                <input type="hidden" class="post_id" name="post_id" value="{{$comm->post_id}}">

                                <div class="pad-ver">
                                    <div class="btn-group">
                                        <button name="button_name" value="btn_edit" style="margin-right: 10px;" class="btn btn-sm btn-default btn-hover-success"><i class="fa fa-pencil"></i>Chỉnh sửa</button>
                                        <button name="button_name" value="btn_delete" class="btn btn-sm btn-default btn-hover-danger"><i class="fa fa-trash"></i>Xóa</button>
                                    </div>
                                    <!-- <a class="btn btn-sm btn-default btn-hover-primary" href="#"><i class="fa fa-comment"></i>Comment</a> -->
                                </div>
                                @else
                                <p>{{$comm->comment}}</p>
                                @endif
                            </form>
                            <hr>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    @else
    <div class="container bootdey" style="padding-bottom: 50px;">
        <h4>Bình luận</h4>
        <div class="col-md-12 bootstrap snippets">
            <!-- <div class="panel">
                <div class="panel-body">
                    <textarea class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
                    <div class="mar-top clearfix">
                        <button class="btn btn-sm  pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                    </div>
                </div>
            </div> -->


            <div class="panel">
                <div class="panel-body">
                    @foreach($comment as $key3 => $comm)
                    <div class="media-block">
                        <a class="media-left" style="margin-right: 10px;" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="{{ asset('public/uploads/avt/' . $comm->avatar) }}"></a>
                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">{{$comm->name}}</a>
                                @php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');

                                $ngayDang = \Carbon\Carbon::parse($comm->comment_date);
                                $ngayHienTai = now();

                                $khoangThoiGian = $ngayHienTai->diff($ngayDang);

                                $gio = $khoangThoiGian->h;
                                $phut = $khoangThoiGian->i;
                                @endphp
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> Đã bình luận - {{ $gio }} giờ {{ $phut }} phút trước</p>

                            </div>
                            <p>{{$comm->comment}}</p>
                            <!-- <div class="pad-ver">
                                <div class="btn-group">
                                    <a style="margin-right: 10px;" class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#"><i class="fa fa-comment"></i>Comment</a>
                            </div> -->

                            <hr>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    @endif



    @endforeach
</main>


<style type="text/css">
    body {
        margin-top: 20px;
        /* background: #ebeef0; */
    }

    .img-sm {
        width: 46px;
        height: 46px;
    }

    .panel {
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 15px;
    }

    .panel .panel-footer,
    .panel>:last-child {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .panel .panel-heading,
    .panel>:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .panel-body {
        padding: 25px 20px;
    }


    .media-block .media-left {
        display: block;
        float: left
    }

    .media-block .media-right {
        float: right
    }

    .media-block .media-body {
        display: block;
        overflow: hidden;
        width: auto
    }

    .middle .media-left,
    .middle .media-right,
    .middle .media-body {
        vertical-align: middle
    }

    .thumbnail {
        border-radius: 0;
        border-color: #e9e9e9
    }

    .tag.tag-sm,
    .btn-group-sm>.tag {
        padding: 5px 10px;
    }

    .tag:not(.label) {
        background-color: #fff;
        padding: 6px 12px;
        border-radius: 2px;
        border: 1px solid #cdd6e1;
        font-size: 12px;
        line-height: 1.42857;
        vertical-align: middle;
        -webkit-transition: all .15s;
        transition: all .15s;
    }

    .text-muted,
    a.text-muted:hover,
    a.text-muted:focus {
        color: #acacac;
    }

    .text-sm {
        font-size: 0.9em;
    }

    .text-5x,
    .text-4x,
    .text-5x,
    .text-2x,
    .text-lg,
    .text-sm,
    .text-xs {
        line-height: 1.25;
    }

    .btn-trans {
        background-color: transparent;
        border-color: transparent;
        color: #929292;
    }

    .btn-icon {
        padding-left: 9px;
        padding-right: 9px;
    }

    .btn-sm,
    .btn-group-sm>.btn,
    .btn-icon.btn-sm {
        padding: 5px 10px !important;
    }

    .mar-top {
        margin-top: 15px;
    }

    /* danh gia sao */
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