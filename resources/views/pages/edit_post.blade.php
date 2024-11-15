@extends('welcome')
@section('content')

<style>
    #header-carousel {
        display: none;
    }
</style>


<head>

    <!-- <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script> -->
</head>


@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif

<body>

    @if(empty($bai_dang))

    <div class="container order" style="text-align: center; padding: 200px;">
        <h4>Chưa có bài đăng!</h4>
    </div>
    @else

    @foreach($bai_dang as $key => $bai)

    <div class="page-wrapper p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <form class="form" action="{{ URL::to('/update-post-user/'.$bai->id_bai_dang) }}" novalidate method="post" enctype="multipart/form-data">
                    <div class="card-heading">
                        <h2 class="title" style="color: #000; text-align: center;">Chỉnh sửa bài đăng</h2>
                    </div>
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="name">Tải hình ảnh sản phẩm</div>
                            <div class="value">
                                <img id="previewImage" src="{{URL::to('public/uploads/post/product/'.$bai->product_image)}}" alt="Image" width="100px" height="100px">

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
                                <input class="input--style-6" type="text" value="{{$bai-> product_name}}" name="product_name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Danh mục</div>
                            <div class="value">
                                <select class="input--style-6" name="category_id">
                                    <option value="" disabled selected>Chọn danh mục</option>
                                    @foreach($category as $key => $cate)

                                    @if($cate->category_id == $bai->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif

                                    <!-- Thêm các tùy chọn khác tùy theo yêu cầu -->
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Giá tiền</div>
                            <div class="value">
                                <input class="input--style-6" type="number" value="{{$bai-> product_price}}" name="product_price">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Hạn bán trước</div>
                            <div class="value">
                                <input class="input--style-6" type="datetime-local" value="{{$bai-> het_han}}" name="product_deadline">
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
                                    <input type="number" class="input--style-6" name="product_qty" value="{{$bai-> product_qty}}" placeholder="Nhập số lượng" min="0" step="0.01" style="margin-right: 10px;">
                                    <!-- <select name="weight_unit" class="select--style-6">
                                        <option value="Kg">Kg</option>
                                        <option value="Hộp">Hộp</option>
                                        <option value="Phần">Phần</option>
                                        <option value="Lít">Lít</option>
                                    </select> -->

                                    <select name="weight_unit" class="select--style-6">
                                        <option value="Kg" @if($bai->don_vi_sp == 'Kg') selected @endif>Kg</option>
                                        <option value="Hộp" @if($bai->don_vi_sp == 'Hộp') selected @endif>Hộp</option>
                                        <option value="Phần" @if($bai->don_vi_sp == 'Phần') selected @endif>Phần</option>
                                        <option value="Lít" @if($bai->don_vi_sp == 'Lít') selected @endif>Lít</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Mô tả</div>
                            <div class="value">
                                <!-- <input class="input--style-6" type="text" name="full_name"> -->
                                <textarea class="textarea--style-6" name="product_desc" placeholder="Mô tả về sản phẩm" rows="5" id="">{{$bai-> product_desc}}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer" style="color: #000; text-align: center;">
                        <button class="btn btn--radius-2" type="submit">Cập nhật bài đăng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endforeach



    @endif
    <!-- order mobile -->


    <!--  -->
</body>

</html>

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

@endsection