<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Web phan phoi thuc pham</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/responsive.css')}}">
    <script src="https://kit.fontawesome.com/bf8f778c02.js" crossorigin="anonymous"></script>
    <style>
        .search-container {
            position: relative;
            width: 100%;
            max-width: 100%;
        }

        .search-box {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .search-button {
            position: absolute;
            top: 0;
            right: 0;
            padding: 8px 5px;
            background-color: #90D26D;
            /* 90D26D */
            /* 2C7865 */
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/frontend/assets/img/logo/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/assets/img/logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                            <!-- <li><a href="job_listing.html">Find a Jobs </a></li> -->
                                            <li><a href="{{URL::to('/about')}}">Giới thiệu</a></li>
                                            <!-- <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                                            <li><a href="{{URL::to('/latest-news')}}">Tin tức</a></li>

                                            <!-- Nav Item - Messages -->
                                            <!-- <li class="nav-item dropdown no-arrow mx-1">
                                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-envelope fa-fw"></i>
                                                    
                                                    <span class="badge badge-danger badge-counter">7</span>
                                                </a>
                                                
                                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                                    <h6 class="dropdown-header">
                                                        Message Center
                                                    </h6>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="dropdown-list-image mr-3">
                                                            <img class="rounded-circle" src="{{asset('public/backend/img/undraw_profile_1.svg')}}" alt="...">
                                                            <div class="status-indicator bg-success"></div>
                                                        </div>
                                                        <div class="font-weight-bold">
                                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                                problem I've been having.</div>
                                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="dropdown-list-image mr-3">
                                                            <img class="rounded-circle" src="{{asset('public/backend/img/undraw_profile_2.svg')}}" alt="...">
                                                            <div class="status-indicator"></div>
                                                        </div>
                                                        <div>
                                                            <div class="text-truncate">I have the photos that you ordered last month, how
                                                                would you like them sent to you?</div>
                                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="dropdown-list-image mr-3">
                                                            <img class="rounded-circle" src="{{asset('public/backend/img/undraw_profile_3.svg')}}" alt="...">
                                                            <div class="status-indicator bg-warning"></div>
                                                        </div>
                                                        <div>
                                                            <div class="text-truncate">Last month's report looks great, I am very happy with
                                                                the progress so far, keep up the good work!</div>
                                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <div class="dropdown-list-image mr-3">
                                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                                            <div class="status-indicator bg-success"></div>
                                                        </div>
                                                        <div>
                                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                                told me that people say this to all dogs, even if they aren't good...</div>
                                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                                </div>
                                            </li> -->


                                            <li><a href="{{URL::to('/giohang')}}"><i class="fa-solid fa-cart-shopping"></i>Giỏ hàng ({{$giohang->count()}})</a></li>

                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->


                                @if(Auth::check())
                                <div class="header-btn d-none f-right d-lg-block">
                                    <!-- kiem tra quyen dang bai viet -->

                                    <a href="{{URL::to('/post')}}" style="color: #000; margin-right: 10px;"><i class="fa-solid fa-file-pen"></i>Đăng bài</a>
                                    <!-- kiem tra quyen dang bai viet -->
                                    <!-- $id -->

                                    <a href="{{ URL::to('/profile/' . Auth::user()->id) }}" style="color: #000;" href=""> <i class="fa-solid fa-user"></i>
                                        {{ Auth::user()->name }}
                                    </a>



                                    <!-- Button to trigger the modal -->
                                    <button style="color: #000;" id="openNotificationButton"><i class="fa-solid fa-bell" style="color: #2C7865;"></i>({{$thongBao->count()}})</button>

                                    <!-- The notification modal -->
                                    <div id="notificationModal" class="notification-modal">
                                        <!-- Modal content -->
                                        <div class="notification-modal-content">
                                            <!-- Close button -->
                                            <span class="notification-close">&times;</span>
                                            <h4><b>Thông báo từ hệ thống</b></h4>


                                            @foreach($thongBao as $key => $tb)

                                            <div class="thong-bao">
                                                <div class="tieu-de">
                                                    <b>{{$tb->tieu_de}}</b>
                                                </div>
                                                <div class="noi-dung">
                                                    <span>{{$tb->noi_dung}}</span>
                                                </div>
                                            </div>

                                            <!-- Your content inside the notification modal -->


                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                                @else
                                <div class="header-btn d-none f-right d-lg-block">

                                    <a href="{{URL::to('/register')}}" class="btn head-btn1">Đăng ký</a>
                                    <!-- <a href="{{URL::to('/login-customer')}}" class="btn head-btn2">Đăng nhập</a> -->
                                    <a href="{{URL::to('/login')}}" class="btn head-btn2">Đăng nhập</a>

                                </div>
                                @endif

                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>


    @yield('content')






    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>Về chúng tôi</h4>
                                    <div class="footer-pera">
                                        <p>Cung cấp những sản phẩm phù hợp cho bạn.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Thông tin liên hệ</h4>
                                <ul>
                                    <li>
                                        <p>Trụ sợ chính: 54 Nguyễn Đình Tứ, Hoà An, quận Cẩm Lệ, Đà Nẵng
                                        </p>
                                    </li>
                                    <li><a href="#">Số điện thoại : 0966228911</a></li>
                                    <li><a href="#">Email : nguyendinhtra10@gmail.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Chính sách hỗ trợ</h4>
                                <ul>
                                    <!-- <li><a href="#">View Project</a></li> -->
                                    <li><a href="#">Liên hệ</a></li>
                                    <!-- <li><a href="#">Testimonial</a></li> -->
                                    <!-- <li><a href="#">Proparties</a></li> -->
                                    <li><a href="#">Hỗ trợ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>BẢN TIN</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Trang web luôn cập nhật những tin tức mới xung quanh vấn đề phân phối thực phẩm</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email" placeholder="Địa chỉ email " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="{{asset('public/frontend/assets/img/icon/form.png')}}" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                            <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/assets/img/logo/logo2_footer.png')}}" alt=""></a>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <!-- <p>
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('public/frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('public/frontend/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Range -->
    <script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/price_rangs.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('public/frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('public/frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('public/frontend/assets/js/contact.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('public/frontend/assets/js/plugins.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/main.js')}}"></script>

    <!-- Chatra {literal} -->
    <script>
        (function(d, w, c) {
            w.ChatraID = 'm3aCXvy5nszMfW7Cn';
            var s = d.createElement('script');
            w[c] = w[c] || function() {
                (w[c].q = w[c].q || []).push(arguments);
            };
            s.async = true;
            s.src = 'https://call.chatra.io/chatra.js';
            if (d.head) d.head.appendChild(s);
        })(document, window, 'Chatra');

        window.ChatraSetup = {
            colors: {
                buttonText: '#ffffff',
                /* chat button text color */
                buttonBg: '#90D26D'
                /* chat button b
                               ackground color */
            }
        };


        // Cập nhật tình trạng đơn hàng
        $(document).ready(function() {
            $('.approve_order').change(function() {

                var order_id = $(this).children(":selected").attr("id");
                var order_status = $(this).val();
                var _token = $('input[name="_token"]').val();
                var qty = [];
                $("input[name='product_sales_quantity']").each(function() {
                    qty.push($(this).val());
                });
                var order_product_id = [];
                $("input[name='order_product_id']").each(function() {
                    order_product_id.push($(this).val());
                });

                // alert(order_id);
                // alert(order_status);

                number = 0;
                j = 0;
                for (i = 0; i < order_product_id.length; i++) {
                    //so luong khach dat
                    number++;
                    var order_qty = $('.order_qty_' + order_product_id[i]).val();
                    //so luong ton kho
                    var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                    // alert(order_qty);
                    // alert(order_qty_storage);
                    // console.log(order_qty);
                    // console.log(order_qty_storage);

                    if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                        j = j + 1;
                        if (j == 1) {
                            alert('Sản phẩm thứ ' + number + ' - Số lượng trong kho không đủ!');
                            $('.color_qty_' + order_product_id[i]).css('background', '#000');
                        }
                    }
                }
                if (j == 0) {
                    $.ajax({
                        url: "{{url('/update-order-status')}}",
                        type: 'POST',
                        data: {
                            _token: _token,
                            order_status: order_status,
                            order_id: order_id,
                            qty: qty,
                            order_product_id: order_product_id,
                        },

                        success: function(data) {
                            alert('Thay đổi tình trạng đơn hàng thành công!');
                            location.reload();
                        }
                    });
                }

            });
        });


        // Function to remove background color from stars
        function remove_background(product_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + product_id + '-' + count).css('color', '#ccc');
            }
        }

        var currentRating = 1; // Biến tạm để lưu giá trị rating

        function updateRating(index) {
            currentRating = index; // Lưu giá trị rating vào biến tạm
            $(this).attr("data-rating", index); // Cập nhật giá trị data-rating
        }

        // Click event handler for ratings
        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var order_id = $(this).data('order_id');
            var rating = $(this).data("rating");

            remove_background(order_id);

            // Update data-rating and data-index attributes
            $(this).data("rating", index);
            // $(this).attr("data-rating", index);

            updateRating(index); // Gọi hàm để cập nhật giá trị rating

            // index = parseInt($(this).attr("data-index"));
            for (var count = 1; count <= index; count++) {
                $('#' + order_id + '-' + count).css('color', '#ffcc00');
            }
        });

        // Click event handler for submitting review
        $(document).on('click', '#submit-review', function() {
            var index = currentRating;
            var order_id = $('.rating').data('order_id');
            var customer_id = $('.rating').data('customer_id');
            var review_text = $('#review-text').val();
            var seller_id = $('.rating').data('seller_id');


            // alert(index)

            var confirmRating = confirm('Bạn có chắc chắn muốn đánh giá ' + index + ' trên 5 sao không?');
            if (confirmRating) {
                if (index !== undefined && order_id !== undefined && customer_id !== undefined && review_text.trim() !== '' && seller_id !== undefined) {
                    $.ajax({
                        url: "{{ url('/insert-rating') }}",
                        method: "POST",
                        data: {
                            index: index,
                            order_id: order_id,
                            customer_id: customer_id,
                            review_text: review_text,
                            seller_id: seller_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data == 'done') {
                                alert('Bạn đã đánh giá ' + index + ' trên 5');
                                location.reload();
                            } else {
                                alert('Lỗi đánh giá');
                            }
                        }
                    });
                } else {
                    alert('Vui lòng điền đầy đủ thông tin đánh giá');
                }
            } else {
                alert('Bạn đã hủy đánh giá');
            }
        });



        // --------------------- Nguoi ban danh gia nguoi mua
        // Hàm để xóa nền cho đánh giá của người mua
        function remove_background_user(user_order_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + user_order_id + '-' + count).css('color', '#ccc');
            }
        }

        var currentRatingUser = 1; // Biến tạm để lưu giá trị rating của người mua

        // Hàm để cập nhật giá trị rating của người mua
        function updateRatingUser(index) {
            currentRatingUser = index; // Cập nhật giá trị rating vào biến tạm
            $(this).data("user-rating", index); // Cập nhật giá trị data-user-rating
        }

        $(document).on('click', '.user_rating', function() {
            var index = $(this).data("user-index");
            var order_id = $(this).data('user-order_id');
            var rating = $(this).data("user-rating");

            remove_background_user(order_id); // Gọi hàm để xóa nền của các đánh giá trước đó

            // Cập nhật data-rating và data-index cho sao được nhấn
            $(this).data("user-rating", index);

            updateRatingUser(index); // Gọi hàm để cập nhật giá trị rating của người mua

            // Tô màu cho các sao từ 1 đến sao được nhấn
            for (var count = 1; count <= index; count++) {
                $('#' + order_id + '-' + count).css('color', '#ffcc00');
            }
        });


        // Click event handler for submitting review
        $(document).on('click', '#submit-seller-review', function() {
            var index = currentRatingUser;
            var order_id = $('.user_rating').data('user-order_id');
            var customer_id = $('.user_rating').data('user-customer_id');
            var review_text = $('#review-text').val();
            var seller_id = $('.user_rating').data('user-seller_id');

            // alert(index)
            // alert(order_id)
            // alert(customer_id)
            // alert(review_text)
            // alert(seller_id)

            var confirmRating = confirm('Bạn có chắc chắn muốn đánh giá người mua ' + index + ' trên 5 sao không?');
            if (confirmRating) {
                if (index !== undefined && order_id !== undefined && customer_id !== undefined && review_text.trim() !== '' && seller_id !== undefined) {
                    $.ajax({
                        url: "{{ url('/insert-rating-user') }}",
                        method: "POST",
                        data: {
                            index: index,
                            order_id: order_id,
                            customer_id: customer_id,
                            review_text: review_text,
                            seller_id: seller_id,
                            "_token": "{{ csrf_token() }}"
                        },

                        success: function(data) {
                            if (data == 'done') {
                                alert('Bạn đã đánh giá người mua ' + index + ' trên 5');
                                location.reload();
                            } else {
                                alert('Lỗi đánh giá');
                            }
                        }
                    });
                } else {
                    alert('Vui lòng điền đầy đủ thông tin đánh giá');
                }
            } else {
                alert('Bạn đã hủy đánh giá');
            }
        });
    </script>

    <!-- /Chatra {/literal} -->
</body>

<style>
    #openNotificationButton {
        border: none;
        background: none;
        cursor: pointer;
    }

    .notification-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .notification-modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .notification-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .notification-close:hover,
    .notification-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .thong-bao {
        display: flex;
        width: 1000px;
        margin-bottom: 20px;
        transition: box-shadow 0.3s ease;
        padding: 10px;
    }

    .thong-bao .tieu-de {
        width: 400px;
    }

    .thong-bao .noi-dung {
        flex: 1;
        width: 400px;
        padding-left: 10px;
    }

    .thong-bao:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
    }
</style>

<script>
    var notificationModal = document.getElementById("notificationModal");
    var openNotificationButton = document.getElementById("openNotificationButton");
    var notificationClose = document.getElementsByClassName("notification-close")[0];
    openNotificationButton.onclick = function() {
        notificationModal.style.display = "block";
    }
    notificationClose.onclick = function() {
        notificationModal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == notificationModal) {
            notificationModal.style.display = "none";
        }
    }
</script>

</html>