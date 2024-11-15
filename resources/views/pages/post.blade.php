@extends('welcome')
@section('content')

@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif

@if(Auth::check() && Auth::user()->is_seller == 1)

<div class="page-wrapper p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <form class="form" action="{{ URL::to('/add-post/'.Auth::user()->id) }}" novalidate method="post" enctype="multipart/form-data">
                <div class="card-heading">
                    <h2 class="title" style="color: #000; text-align: center;">Bài đăng</h2>
                </div>
                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="name">Tải hình ảnh sản phẩm</div>
                        <div class="value">
                            <img id="previewImage"  src="" alt="Image" width="100px" height="100px">

                            <!-- <div class="input-group js-input-file" style="margin-top: 30px;">
                                <input class="input-file" type="file" name="file_cv" id="file">
                                <label class="label--file" for="file">Chọn ảnh</label>
                                <span class="input-file__info">Không có hình ảnh được chọn!</span>
                            </div> -->

                            <div class="input-group js-input-file" style="margin-top: 30px;">
                                <input type="file" name="product_image" class="input-file" id="file" accept="image/*">
                                <label class="label--file" for="file">Chọn ảnh</label>
                                <span class="input-file__info">Không có hình ảnh được chọn!</span>
                            </div>
                            <!-- <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size
                                50 MB</div> -->
                            <div class="label--desc">Tải hình ảnh của sản phẩm</div>
                        </div>
                    </div>

                    <script>
                        document.getElementById('file').addEventListener('change', function(event) {
                            var file = event.target.files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var previewImage = document.getElementById('previewImage');
                                    previewImage.src = e.target.result;
                                    // Cập nhật nội dung thông báo
                                    document.querySelector('.input-file__info').innerText = file.name;

                                    // alert(previewImage.src);
                                }
                                reader.readAsDataURL(file);
                            } else {
                                // Nếu không có tệp nào được chọn, hiển thị lại thông báo mặc định
                                document.querySelector('.input-file__info').innerText = 'Không có hình ảnh được chọn!';
                            }
                        });
                    </script>

                    <div class="form-row">
                        <div class="name">Tên sản phẩm</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="product_name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Danh mục</div>
                        <div class="value">
                            <select class="input--style-6" name="category_id">
                                <option value="" disabled selected>Chọn danh mục</option>
                                @foreach($category as $key => $cate)

                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                <!-- Thêm các tùy chọn khác tùy theo yêu cầu -->
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Giá tiền</div>
                        <div class="value">
                            <input class="input--style-6" type="number" name="product_price">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Hạn bán trước</div>
                        <div class="value">
                            <input class="input--style-6" type="datetime-local" name="product_deadline">
                        </div>
                    </div>

                    <!-- <div class="form-row">
                        <div class="name">Email address</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
                            </div>
                        </div>
                    </div> -->

                    <div class="form-row">
                        <div class="name">Số lượng</div>
                        <!-- <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="weight" placeholder="Message sent to the employer"></textarea>
                            </div>
                        </div> -->
                        <div class="value">
                            <div class="input-group">
                                <input type="number" class="input--style-6" name="product_qty" placeholder="Nhập số lượng" min="0" step="0.01" style="margin-right: 10px;">
                                <select name="weight_unit" class="select--style-6">
                                    <option value="Kg">Kg</option>
                                    <option value="Hộp">Hộp</option>
                                    <option value="Phần">Phần</option>
                                    <option value="Lít">Lít</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Mô tả</div>
                        <div class="value">
                            <!-- <input class="input--style-6" type="text" name="full_name"> -->
                            <textarea class="textarea--style-6" name="product_desc" placeholder="Mô tả về sản phẩm" rows="5" id=""></textarea>
                        </div>
                    </div>

                    <!-- <div class="form-row">
                        <div class="name">Upload Image</div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <input class="input-file" type="file" name="file_cv" id="file">
                                <label class="label--file" for="file">Choose file</label>
                                <span class="input-file__info">No file chosen</span>
                            </div>
                            <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size
                                50 MB</div>
                        </div>
                    </div> -->

                </div>
                <div class="card-footer" style="color: #000; text-align: center;">
                    <button class="btn btn--radius-2" type="submit">Đăng bài</button>
                </div>
            </form>
        </div>
    </div>
</div>

@else
<!-- <div class="page-wrapper p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div class="card-heading">
                <h2 class="title" style="color: #000; text-align: center;">Tạo thông tin cửa hàng</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="name">Upload Image</div>
                        <div class="value">
                            <img src="" alt="" width="100px" height="100px">

                            <div class="input-group js-input-file" style="margin-top: 30px;">
                                <input class="input-file" type="file" name="file_cv" id="file">
                                <label class="label--file" for="file">Choose file</label>
                                <span class="input-file__info">No file chosen</span>
                            </div>
                            
                            <div class="label--desc">Tải hình ảnh của cửa hàng</div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Tên cửa hàng</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="full_name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Địa chỉ</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="full_name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Thời gian hoạt động</div>
                        <div class="value">
                            <input class="input--style-6" type="text" name="full_name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Email</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" type="email" name="email" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Giới thiệu</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" name="message" placeholder="Message sent to the employer"></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer" style="text-align: center;">
                <h6 class="card-title font-weight-bold">Hỗ trợ</h6>
                <p class="card-text">Bạn cần được cấp quyền đăng sản phẩm trước khi tạo bài đăng!</p>
                <button class="btn btn--radius-2 btn--blue-2" type="submit">Gửi yêu cầu</button>
            </div>
        </div>
    </div>
</div> -->
<div class="page-wrapper p-t-100 p-b-50">
    <h3 style="text-align: center;">
        <a class="no-hover" style="text-decoration: none; " href="{{ URL::to('/profile/' . Auth::user()->id) }}">Vui lòng gửi cấp quyền cửa hàng để đăng bài!</a>
    </h3>
</div>
@endif

@endsection
<style>
    .no-hover {
        text-decoration: none;
    }

    .no-hover:hover {
        text-decoration: none;
        cursor: pointer;
        color: #000;
        /* Để con trỏ không thay đổi khi hover */
    }

    .input--style-6 {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
    }

    .form-row {
        margin-bottom: 15px;
    }

    .name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .value {
        width: 100%;
    }

    .textarea--style-6 {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        /* Đặt viền cho textarea */
        border-radius: 4px;
        /* Bo tròn các góc của viền */
        box-sizing: border-box;
        /* Đảm bảo padding và border không làm thay đổi kích thước tổng */
        font-family: Arial, sans-serif;
        /* Chọn font cho văn bản bên trong textarea */
        font-size: 14px;
        /* Kích thước chữ */
        resize: vertical;
        /* Chỉ cho phép thay đổi chiều cao */
    }
</style>

<link href="{{asset('public/frontend/assets/post/css/main.css')}}" rel="stylesheet" media="all">
<!-- Jquery JS-->
<script src="{{asset('public/frontend/assets/post/vendor/jquery/jquery.min.js')}}"></script>
<!-- Main JS-->
<script src="{{asset('public/frontend/assets/post/js/global.js')}}"></script>