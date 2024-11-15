@extends('welcome')
@section('content')


<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Tin tức</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_1.png" alt="">
                            <!-- <a href="" class="blog_item_date">
                                <h3>17</h3>
                                <p>Tháng 6</p>
                            </a> -->
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{URL::to('/detail-news1')}}">
                                <h2>Tái Chế Thực Phẩm Dư Thừa Để Tạo Ra Cơ Hội Kinh Doanh Mới</h2>
                            </a>
                            <p>Trên toàn thế giới, hơn một trăm triệu người đang chịu đựng nạn đói. Để đối phó với điều này, các quốc gia trên thế giới đang tìm cách tái sử dụng thực phẩm dư thừa để tạo ra những bữa ăn ngon và bổ dưỡng. Điều này không chỉ cung cấp thức ăn cho nhiều người hơn, mà còn có lợi cho Môi trường Toàn cầu.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Tái chế thực phẩm</a></li>
                                <li><a href="#"><i class="fa fa-Bình luận"></i> 03 Bình luận</a></li>
                            </ul>
                        </div>
                    </article>

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_2.png" alt="">
                            <!-- <a href="#" class="blog_item_date">
                                <h3>16</h3>
                                <p>Tháng 6</p>
                            </a> -->
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{URL::to('/detail-news2')}}">
                                <h2>Hạn chế sản xuất dư thừa giúp cải tiến năng suất trong doanh nghiệp</h2>
                            </a>
                            <p>Giảm thiểu lãng phí trong sản xuất kinh doanh luôn là giải pháp được xem xét khi thực hiện các chương trình cải tiến năng suất tại doanh nghiệp. Trong đó, sản xuất dư thừa là một trong những lãng phí được đánh giá là nghiêm trọng và tồi tệ nhất trong các dạng lãng phí vì sản xuất dư thừa tiềm ẩn hoặc tạo ra các lãng phí khác.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Hạn chế sản phẩm dư thừa</a></li>
                                <li><a href="#"><i class="fa fa-Bình luận"></i> 03 Bình luận</a></li>
                            </ul>
                        </div>
                    </article>

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="assets/img/blog/single_blog_3.png" alt="">
                            <!-- <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Tháng 6</p>
                            </a> -->
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{URL::to('/detail-news3')}}">
                                <h2>Startup biến thức ăn thừa của nhà hàng thành bữa ăn rẻ</h2>
                            </a>
                            <p>Trên khắp châu Á, công nghệ khởi nghiệp đang lấy thực phẩm mang đi chôn lấp và phân phối các bữa ăn giảm giá thông qua ứng dụng điện thoại trên thiết bị di động.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Startup</a></li>
                                <li><a href="#"><i class="fa fa-Bình luận"></i> 03 Bình luận</a></li>
                            </ul>
                        </div>
                    </article>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Từ khóa tìm kiếm' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm từ khóa'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Tìm kiếm</button>
                        </form>
                    </aside>

                    <!-- <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Resaurant food</p>
                                    <p>(37)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Travel news</p>
                                    <p>(10)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Modern technology</p>
                                    <p>(03)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Product</p>
                                    <p>(11)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Inspiration</p>
                                    <p>21</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Health Care (21)</p>
                                    <p>09</p>
                                </a>
                            </li>
                        </ul>
                    </aside> -->

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Bài đăng mới nhất</h3>
                        <div class="media post_item">
                            <img src="{{asset('public/frontend/news/img/tin1.jpg')}}" style="width: 50px;"  alt="post">
                            <div class="media-body">
                                <a href="{{URL::to('/detail-news1')}}">
                                    <h3>Tái Chế Thực Phẩm Dư Thừa Để Tạo Ra Cơ Hội Kinh Doanh Mới</h3>
                                </a>
                                <p>16-05-2024</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="{{asset('public/frontend/news/img/tin2.jpg')}}" style="width: 50px;" alt="post">
                            <div class="media-body">
                                <a href="{{URL::to('/detail-news2')}}">
                                    <h3>Hạn chế sản xuất dư thừa giúp cải tiến năng suất trong doanh nghiệp</h3>
                                </a>
                                <p>02 Giờ trước</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="{{asset('public/frontend/news/img/tin3.jpg')}}" style="width: 50px;" alt="post">
                            <div class="media-body">
                                <a href="{{URL::to('/detail-news3')}}">
                                    <h3>Startup biến thức ăn thừa của nhà hàng thành bữa ăn rẻ</h3>
                                </a>
                                <p>03 Giờ trước</p>
                            </div>
                        </div>
                        
                    </aside>

                    <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside> -->


                    <!-- <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside> -->


                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Liên hệ</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Nhập email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Đăng ký</button>
                        </form>
                    </aside>


                </div>
            </div>
        </div>
    </div>
</section>


@endsection