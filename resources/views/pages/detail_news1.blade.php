@extends('welcome')
@section('content')

<style>
    #header-carousel {
        display: none;
    }
</style>

<div>
    <div class="container-fluid py-5">
        <div class="container py-5">

            <div class="row g-4">
                <div class="col-lg-8" style="margin: 0 auto;">
                    <div class="mb-4">
                        <a href="#" style="color: #000" class="h1 display-5">Tái Chế Thực Phẩm Dư Thừa Để Tạo Ra Cơ Hội Kinh Doanh Mới</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                        <img src="{{asset('public/frontend/news/img/tin1.jpg')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                        <!-- <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">
                            VN Fashion
                        </div> -->
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-clock"></i> 06 phút đọc</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Lượt xem</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 3 Bình luận</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Chia sẻ</a>
                    </div>
                    <p class="my-4">
                        Một cuộc khảo sát của Innova Market Insights cho thấy nhiều người tiêu dùng sẵn lòng trả thêm tiền cho các sản phẩm và dịch vụ giải quyết vấn đề lãng phí thực phẩm; khoảng 63% người tiêu dùng thích đi ăn tại nhà hàng có chính sách giảm lãng phí thực phẩm. Ở Vương quốc Anh, "Dự án Thực phẩm Rác thực sự" liên quan đến cộng đồng địa phương để "thu hoạch" và tìm nguồn thực phẩm dư thừa trực tiếp từ siêu thị, cửa hàng địa phương, nhà phân phối và nhà bán lẻ. Các đầu bếp sau đó sáng tạo biến những "vụ thu hoạch" này thành những món ăn ngon để cung cấp cho những người cần, và qua đó, giảm lượng thực phẩm bị lãng phí một cách đáng kể. Ứng dụng "Too Good To Go" do Đan Mạch tạo ra cho phép người tiêu dùng tìm kiếm thực phẩm dư thừa trong cộng đồng địa phương của họ và mua nó với giá giảm. Ứng dụng này hiện đã có hàng chục triệu người dùng ở châu Âu và Bắc Mỹ. Ở Hoa Kỳ, một "cuộc cách mạng về nhãn hiệu thực phẩm" đang diễn ra, thay thế ngày hết hạn bằng ngày "tốt nhất trước" để giảm lượng thực phẩm bị lãng phí. Tại Ấn Độ, các nhà nghiên cứu đã phát triển một lớp phủ thực phẩm mới được làm từ yến mạch và lúa mì có thể được áp dụng lên bề mặt của các loại trái cây tươi, hiệu quả kéo dài thời gian bảo quản, từ đó giảm thiểu lượng trái cây bị hư hỏng. Ở Đài Loan, các cửa hàng tiện lợi và siêu thị tổ chức các chiến dịch giảm lượng thực phẩm bị lãng phí bằng cách giảm giá các mặt hàng sắp hết hạn, tạo sự cân bằng giữa tiết kiệm tiền và chăm sóc môi trường
                    </p>
                    <p class="my-4">
                        Kể từ năm 2023, dân số toàn cầu đã vượt qua con số 8 tỷ người, và dự báo cho thấy nhu cầu thực phẩm sẽ tăng 60% trong ba mươi năm tới khi dân số toàn cầu tiếp tục tăng. Ngoài việc giảm lượng thực phẩm bị lãng phí, các quốc gia đang bắt đầu chuyển đổi thực phẩm dư thừa và không sử dụng thành "thực phẩm tái chế", không chỉ thân thiện với môi trường mà còn giúp cung cấp thức ăn cho hàng triệu người. Theo một báo cáo của Allied Market Research, thị trường thực phẩm tái chế dự kiến sẽ đạt 97 tỷ đô la vào năm 2031, với tỷ suất tăng trưởng hàng năm (CAGR) là 6,2%. Thương hiệu thực phẩm tái chế nổi tiếng của Mỹ “Regrained” tái chế ngũ cốc đã qua sử dụng từ quá trình lên men thành bột giàu chất dinh dưỡng để sản xuất các sản phẩm như mì ống, bánh pizza, thanh dinh dưỡng và bánh mì. Một thương hiệu khác, “Brewers Foods”, cũng sử dụng ngũ cốc đã qua sử dụng của họ để làm Bánh quy, Bánh pita và Bánh mì giòn. “Wholy Greens” sử dụng rau thừa để sản xuất mì ống giàu chất xơ dinh dưỡng với các hương vị bao gồm Rau bina, Cà rốt, Bí ngô và Củ cải đường.

                        Ngoài ra, thức ăn dư thừa cũng có thể được sử dụng làm thức ăn cho động vật, có lợi cho môi trường và giảm lượng thực phẩm bị lãng phí. Công ty khởi nghiệp “Bright Feeds” thu thập các loại thức ăn dư thừa và sử dụng công nghệ tiên tiến và trí tuệ nhân tạo để sản xuất thức ăn chất lượng cao phù hợp cho các loại động vật, bao gồm gia cầm, lợn và nuôi trồng thủy sản. Thực phẩm tái chế thách thức sự sáng tạo của các chuyên gia trong ngành thực phẩm để mang đến những sản phẩm mới có giá trị trên thị trường và tạo ra cơ hội kinh doanh mới.
                    </p>

                    <div class="row g-4">
                        <div class="col-6">
                            <div class="rounded overflow-hidden">
                                <img src="{{asset('public/frontend/news/img/tin11.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="rounded overflow-hidden">
                                <img src="{{asset('public/frontend/news/img/tin12.png')}}" class="img-zoomin img-fluid rounded w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <p class="my-4">
                        Ông Richard Ouyang, Tổng Giám đốc của ANKO FOOD MACHINE CO., LTD., nhận thức về Chủ quyền Thực phẩm và tầm quan trọng của Công việc Quốc tế. Ông Ouyang tin rằng thiết bị máy móc thực phẩm có thể tái chế các mùi hương hoặc cây trồng dư thừa thành các sản phẩm thực phẩm có thể cung cấp thêm cho những người đang cần. Bằng cách trang bị các thiết bị lưu trữ và bảo quản lạnh phù hợp với điều kiện khí hậu địa phương, thời gian bảo quản thực phẩm có thể được kéo dài. Ngoài ra, ANKO còn có thể hỗ trợ xây dựng nhà máy chế biến thực phẩm và lập kế hoạch các dây chuyền sản xuất thực phẩm dựa trên yêu cầu sản xuất cụ thể. Ngoài việc đáp ứng nhu cầu thị trường nội địa, những sản phẩm này cũng có thể được xuất khẩu để tăng thu nhập hối đoái ngoại tệ và đóng góp vào nguồn cung ứng thực phẩm ổn định trong nước. Những nỗ lực này giúp giảm thiểu khủng hoảng đói nghèo trên toàn cầu và thúc đẩy việc tiếp cận thực phẩm an toàn và ngon miệng cho mọi người. Nếu bạn có ý tưởng hoặc đang suy nghĩ về kế hoạch liên quan đến sản xuất hoặc chế biến thực phẩm, xin vui lòng liên hệ với ANKO trực tiếp.
                    </p>
                    <!-- <p class="my-4">
                        Áo bomber phối cùng với hoodie là một sự kết hợp tuyệt vời. Tạo nên vẻ trẻ trung, năng động và thu hút, áo hoodie không chỉ giữ ấm mà còn làm bạn nổi bật trong mùa lạnh hay mùa mưa. Một sự lựa chọn đa dụng và thời thượng.
                    </p>
                    Áo thun, một item phổ biến, khi kết hợp với áo bomber tạo nên một phong cách đơn giản nhưng vô cùng thời thượng. Điều này là lựa chọn không thể bỏ lỡ cho những cô gái muốn tỏa sáng mà không cần quá phức tạp.
                    <p class="my-4"> -->

                    </p>
                    <div class="tab-class">
                        <div class="d-flex justify-content-between border-bottom mb-4">
                            <ul class="nav nav-pills d-inline-flex text-center">
                                <!-- <li class="nav-item mb-3">
                                    <h5 class="mt-2 me-3 mb-0">Tags:</h5>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 100px;">Sports</span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 100px;">Magazine</span>
                                    </a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 100px;">Politics</span>
                                    </a>
                                </li> -->
                            </ul>

                            <!-- <div class="d-flex align-items-center">
                                <h5 class="mb-0 me-3">Chia sẻ:</h5>
                                <i class="fab fa-facebook-f link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                            
                                <i class="btn fab fa-instagram link-hover btn btn-square rounded-circle border-primary text-dark me-2"></i>
                                <i class="btn fab fa-linkedin-in link-hover btn btn-square rounded-circle border-primary text-dark"></i>
                            </div> -->
                        </div>
                        <!-- <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show active">
                                <div class="row g-4 align-items-center">
                                    <div class="col-3">
                                        <img src="{{asset('public/frontend/news/img/footer-4.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h3>Amelia Alex</h3>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                            but also the leap into electronic.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show">
                                <div class="row g-4 align-items-center">
                                    <div class="col-3">
                                        <img src="{{asset('public/frontend/news/img/footer-5.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h3>Amelia Alex</h3>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                            but also the leap into electronic.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show">
                                <div class="row g-4 align-items-center">
                                    <div class="col-3">
                                        <img src="{{asset('public/frontend/news/img/footer-6.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                    </div>
                                    <div class="col-9">
                                        <h3>Amelia Alex</h3>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                            but also the leap into electronic.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="bg-light rounded my-4 p-4">
                        <h4 class="mb-4">Có thể bạn cũng thích</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center p-3 bg-white rounded">
                                    <img src="{{asset('public/frontend/news/img/tin3.jpg')}}" class="img-fluid rounded" alt="" style="width: 100px;">
                                    <div class="ms-3">
                                        <a style="color: #000;" href="{{URL::to('/detail-news3')}}" class="h5 mb-2">Startup biến thức ăn thừa của nhà hàng thành bữa ăn rẻ</a>
                                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 phút đọc</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center p-3 bg-white rounded">
                                    <img src="{{asset('public/frontend/news/img/tin2.jpg')}}" class="img-fluid rounded" alt="" style="width: 100px;">
                                    <div class="ms-3">
                                        <a style="color: #000;" href="{{URL::to('/detail-news2')}}" class="h5 mb-2">Hạn chế sản xuất dư thừa giúp cải tiến năng suất trong doanh nghiệp</a>
                                        <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 06 phút đọc</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded p-4">
                        <h4 class="mb-4">Bình luận</h4>
                        <!-- <div class="p-4 bg-white rounded mb-4">
                            <div class="row g-4">
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/news/img/footer-4.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex justify-content-between">
                                        <h5>James Boreego</h5>
                                        <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                    </div>
                                    <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-white rounded mb-0">
                            <div class="row g-4">
                                <div class="col-3">
                                    <img src="{{asset('public/frontend/news/img/footer-4.jpg')}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="d-flex justify-content-between">
                                        <h5>James Boreego</h5>
                                        <a href="#" class="link-hover text-body fs-6"><i class="fas fa-long-arrow-alt-right me-1"></i> Reply</a>
                                    </div>
                                    <small class="text-body d-block mb-3"><i class="fas fa-calendar-alt me-1"></i> Dec 9, 2024</small>
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                    </p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="bg-light rounded p-4 my-4">
                        <h4 class="mb-4">Để lại bình luận</h4>
                        <form action="#">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control py-3" placeholder="Tên đầy đủ">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control py-3" placeholder="Địa chỉ email">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="textarea" id="" cols="30" rows="7" placeholder="Viết bình luận của bạn tại đây"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="form-control btn  py-3" type="button">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="Từ khóa" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="btn  input-group-text p-3"><i class="fa fa-search text-white"></i></span>
                                </div>
                                <h4 class="mb-4">Danh mục bài viết</h4>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                            Trang phục truyền thống
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                            Bí quyết Phối màu
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                            Phụ kiện Thời trang
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                            Làm đẹp và Thời trang
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3">
                                            Phong cách cá nhân
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="link-hover btn btn-light w-100 rounded text-uppercase text-dark py-3 mb-4">
                                            Thời trang Mùa Xuân - 2024
                                        </a>
                                    </div>
                                </div>
                                
                                <h4 class="my-4">Stay Connected</h4>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <a href="#" class="w-100 rounded btn  d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">13,977 Fans</span>
                                        </a>
                                        <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-twitter btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">21,798 Follower</span>
                                        </a>
                                        <a href="#" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">7,999 Subscriber</span>
                                        </a>
                                        <a href="#" class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">19,764 Follower</span>
                                        </a>
                                        <a href="#" class="w-100 rounded btn btn-secondary d-flex align-items-center p-3 mb-2">
                                            <i class="bi-cloud btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">31,999 Subscriber</span>
                                        </a>
                                        <a href="#" class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-4">
                                            <i class="fab fa-dribbble btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">37,999 Subscriber</span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="my-4">Tin tức phổ biến</h4>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="row g-4 align-items-center features-item">
                                            <div class="col-4">
                                                <div class="rounded-circle position-relative">
                                                    <div class="overflow-hidden rounded-circle">
                                                        <img src="{{asset('public/frontend/news/img/avt1.png')}}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                    </div>
                                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="features-content d-flex flex-column">
                                                    <p class="text-uppercase mb-2">Thời trang</p>
                                                    <a href="#" class="h6">
                                                        10+ Cách phối đồ với áo len tay dài CỰC XINH mùa thu đông
                                                    </a>
                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Tháng 12, 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-4 align-items-center features-item">
                                            <div class="col-4">
                                                <div class="rounded-circle position-relative">
                                                    <div class="overflow-hidden rounded-circle">
                                                        <img src="{{asset('public/frontend/news/img/avt2.png')}}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                    </div>
                                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="features-content d-flex flex-column">
                                                    <p class="text-uppercase mb-2">Thời trang</p>
                                                    <a href="#" class="h6">
                                                        Áo polo có túi: Must-have-item của những anh chàng thanh lịch, bảnh bao
                                                    </a>
                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Tháng 12, 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-4 align-items-center features-item">
                                            <div class="col-4">
                                                <div class="rounded-circle position-relative">
                                                    <div class="overflow-hidden rounded-circle">
                                                        <img src="{{asset('public/frontend/news/img/avt3.png')}}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                    </div>
                                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="features-content d-flex flex-column">
                                                    <p class="text-uppercase mb-2">Trung niên</p>
                                                    <a href="#" class="h6">
                                                        Áo polo trung niên - Phong cách đơn giản, thanh lịch nhất xu hướng 2023
                                                    </a>
                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Tháng 12, 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-4 align-items-center features-item">
                                            <div class="col-4">
                                                <div class="rounded-circle position-relative">
                                                    <div class="overflow-hidden rounded-circle">
                                                        <img src="{{asset('public/frontend/news/img/avt4.png')}}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
                                                    </div>
                                                    <span class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 10%; right: -10px;">3</span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="features-content d-flex flex-column">
                                                    <p class="text-uppercase mb-2">Làm đẹp</p>
                                                    <a href="#" class="h6">
                                                        TOP 15+ kiểu tóc xoăn bé trai đáng yêu và siêu sành điệu
                                                    </a>
                                                    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> Tháng 12, 2023</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <a href="#" class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">Xem thêm</a>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="position-relative banner-2">
                                            <img src="{{asset('public/frontend/news/img/tin23.png')}}" class="img-fluid w-100 rounded" alt="">
                                            <div class="text-center banner-content-2">
                                                <h6 class="mb-2">Áo Khoác Gió Nam Thông Minh Trượt Nước</h6>
                                                
                                                <a href="#" class="btn  text-white px-4">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Product Start -->

<!-- Single Product End -->




<script src="{{asset('public/frontend/news/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('public/frontend/news/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('public/frontend/news/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('public/frontend/news/js/main.js')}}"></script>

@endsection