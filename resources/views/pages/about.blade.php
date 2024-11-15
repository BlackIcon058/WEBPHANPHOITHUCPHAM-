
@extends('welcome')
@section('content')

<main>

<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center"
        data-background="{{asset('public/frontend/assets/img/hero/about.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Về chúng tôi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hero Area End -->
<!-- Support Company Start-->
<div class="support-company-area fix section-padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2">
                        <span>Thực phẩm dư thừa?</span>
                        <h2>Vấn Đề Thực Phẩm Dư Thừa và Giải Pháp Phân Phối Thực Phẩm</h2>
                    </div>
                    <div class="support-caption">
                        <p class="pera-top">Mặc dù thế giới chúng ta sản xuất đủ thực phẩm để cung cấp đầy đủ nhu cầu dinh dưỡng cho mọi người, nhưng vấn đề lãng phí thực phẩm vẫn là một thách thức lớn. Mỗi năm, hàng tỷ tấn thực phẩm bị lãng phí trên toàn cầu, trong khi hàng triệu người vẫn phải đối mặt với đói nghèo và thiếu hụt thực phẩm. Sự không cân đối này không chỉ gây ra sự bất bình đẳng trong xã hội mà còn tác động đến môi trường và tài nguyên tự nhiên</p>
                        <p>Một trong những nguyên nhân chính của sự lãng phí thực phẩm là hệ thống phân phối phức tạp và không hiệu quả. Từ nơi sản xuất đến điểm bán lẻ, thực phẩm đi qua nhiều bước trung gian và điều kiện lưu trữ khác nhau, dẫn đến sự mất mát và lãng phí trong quá trình vận chuyển và bảo quản.

Để giải quyết vấn đề này, cần có sự hợp tác và nỗ lực từ cộng đồng toàn cầu. Việc xây dựng các nền tảng và giải pháp công nghệ có thể giúp cải thiện hiệu quả trong phân phối thực phẩm và giảm thiểu lãng phí.</p>
                        <a href="#" class="btn post-btn">Quan tâm</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="support-location-img">
                    <img src="{{asset('public/frontend/assets/img/service/support-img.png')}}" alt="">
                    <div class="support-img-cap text-center">
                        <p></p>
                        <span>2024</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Support Company End-->
<!-- How  Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{asset('public/frontend/assets/img/hero/about.png')}}">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle white-text text-center">
                    <span><b>Quy trình phân phối sản phẩm</b></span>
                    <h2><b>Hoạt động như thế nào?</b></h2>
                </div>
            </div>
        </div>
        <!-- Apply Process Caption -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-search"></span>
                    </div>
                    <div class="process-cap">
                        <h5>1. Tìm kiếm cửa hàng</h5>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-curriculum-vitae"></span>
                    </div>
                    <div class="process-cap">
                        <h5>2. Tiếp cận người mua</h5>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-process text-center mb-30">
                    <div class="process-ion">
                        <span class="flaticon-tour"></span>
                    </div>
                    <div class="process-cap">
                        <h5>3. Người mua nhận sản phẩm</h5>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How  Apply Process End-->
<!-- Testimonial Start -->
<!-- <div class="testimonial-area testimonial-padding">
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="h1-testimonial-active dot-style">
                   
                    <div class="single-testimonial text-center">
                 
                        <div class="testimonial-caption ">
                          
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{asset('public/frontend/assets/img/testmonial/testimonial-founder.png')}}" alt="">
                                    <span>Nguyễn Lan</span>
                                    <p></p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                    responsibility! So start caring for your body and it will care for you. Eat
                                    clean it will care for you and workout hard.”</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="single-testimonial text-center">
                        
                        <div class="testimonial-caption ">
                            
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{asset('public/frontend/assets/img/testmonial/testimonial-founder.png')}}" alt="">
                                    <span>Nguyễn Lan</span>
                                    <p>Creative Director</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                    responsibility! So start caring for your body and it will care for you. Eat
                                    clean it will care for you and workout hard.”</p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="single-testimonial text-center">
                        
                        <div class="testimonial-caption ">
                            
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{asset('public/frontend/assets/img/testmonial/testimonial-founder.png')}}" alt="">
                                    <span>Nguyễn Lan</span>
                                    <p>Creative Director</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                    responsibility! So start caring for your body and it will care for you. Eat
                                    clean it will care for you and workout hard.”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->
<!-- Online CV Area Start -->
<!-- <div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="{{asset('public/frontend/assets/img/gallery/cv_bg.jpg')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="cv-caption text-center">
                    <p class="pera1">FEATURED TOURS Packages</p>
                    <p class="pera2"> Make a Difference with Your Online Resume!</p>
                    <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Online CV Area End-->



<!-- Blog Area Start -->
<div class="home-blog-area blog-h-padding">
    <!-- <div class="container">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Our latest blog</span>
                    <h2>Our recent news</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="{{asset('public/frontend/assets/img/blog/home-blog1.jpg')}}" alt="">
                            
                            <div class="blog-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="blog-cap">
                            <p>| Properties</p>
                            <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                            </h3>
                            <a href="#" class="more-btn">Read more »</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="home-blog-single mb-30">
                    <div class="blog-img-cap">
                        <div class="blog-img">
                            <img src="{{asset('public/frontend/assets/img/blog/home-blog2.jpg')}}" alt="">
                            
                            <div class="blog-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="blog-cap">
                            <p>| Properties</p>
                            <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                            </h3>
                            <a href="#" class="more-btn">Read more »</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     -->
</div>
<!-- Blog Area End -->

</main>


@endsection