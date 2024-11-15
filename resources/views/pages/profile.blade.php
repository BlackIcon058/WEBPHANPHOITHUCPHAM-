@extends('welcome')
@section('content')


@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif

@foreach($profile as $key => $value)

<div class="container">
    <div class="row flex-lg-nowrap">
        <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
            <!-- <div class="card p-3">
                <div class="e-navlist e-navlist--active-bg">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link px-2 active" href="#"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                        <li class="nav-item"><a class="nav-link px-2" href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i class="fa fa-fw fa-cog mr-1"></i><span>Cài đặt</span></a></li>
                    </ul>
                </div>
            </div> -->
        </div>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">

                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <!-- <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span> -->
                                                @if(Auth::check() && Auth::user()->avatar != "avatar.png")
                                                <img id="previewImage" src="{{ asset('public/uploads/avt/' . $value->avatar) }}" width="140px" height="140px" alt="">
                                                @else
                                                <img id="previewImage" src="{{ asset('public/uploads/avt/avt.png') }}" width="140px" height="140px" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <form class="form" action="{{ URL::to('/update-avatar/'.Auth::user()->id) }}" novalidate method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$value->name}} </h4>
                                                <p class="mb-0"><?php echo '@' ?>{{$value->name}} </p>

                                                <p class="mb-0">Đánh giá: <span>{{$rating}}<i class="fa-solid fa-star" style="color: #FFD43B;"></i></span> - {{$ratingCount}} lượt đánh giá</p>
                                                <div class="text-muted"><small>Hoạt động 2 giờ trước</small></div>

                                                <div class="mt-2">
                                                    <button class="btn" type="button" id="changeImageBtn">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Thay hình ảnh</span>
                                                    </button>

                                                    <button class="btn btn-success" type="submit" id="saveImageBtn" style="display: none; width: 120px">
                                                        <i class="fa fa-fw fa-save"></i>
                                                        <span>Lưu</span>
                                                    </button>

                                                    <input type="file" name="avatar" id="imageInput" style="display: none; width: 200px;" accept="image/*">
                                                </div>
                                        </form>

                                        <script>
                                            document.getElementById('changeImageBtn').addEventListener('click', function() {
                                                document.getElementById('imageInput').click();
                                            });

                                            document.getElementById('imageInput').addEventListener('change', function(event) {
                                                var file = event.target.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var previewImage = document.getElementById('previewImage');

                                                        if (previewImage) {
                                                            previewImage.src = e.target.result;

                                                            // Hiển thị nút "Lưu hình ảnh"
                                                            document.getElementById('saveImageBtn').style.display = 'inline-block';
                                                            // document.getElementById('avatarInput').value = file.name;

                                                        } else {
                                                            console.error('Element with id "previewImage"');
                                                        }
                                                    }
                                                    reader.readAsDataURL(file);
                                                }
                                            });

                                            document.getElementById('saveImageBtn').addEventListener('click', function() {

                                                var avatarValue = document.getElementById('avatarInput').value;
                                                alert('Giá trị của input hidden avatar: ' + avatarValue);
                                            });
                                        </script>
                                    </div>
                                    <div class="text-center text-sm-right">
                                        @if(Auth::check() && Auth::user()->is_seller != 1)
                                        <span class="badge badge-secondary">Người mua</span>
                                        @else
                                        <span class="badge badge-secondary">Người bán</span>
                                        @endif
                                        <?php
                                        $date = new DateTime($value->created_at);
                                        $formattedDate = $date->format('Y-m-d');
                                        ?>
                                        <div class="text-muted"><small>Ngày tham gia: {{$formattedDate}}</small></div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href class="active nav-link">Cài đặt</a></li>
                            </ul>

                            <div class="tab-content pt-3">
                                <div class="tab-pane active">
                                    <form class="form" novalidate>
                                        <div class="row">

                                            @if(Auth::check() && Auth::user()->is_seller != 1)
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Tên</label>
                                                            <input readonly class="form-control" type="text" name="fullname" placeholder="John Smith" value="{{$value->fullname}}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input readonly class="form-control" type="text" name="username" placeholder="johnny.s" value="{{$value->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input readonly class="form-control" type="text" name="email" placeholder="user@example.com" value="{{$value->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Địa chỉ</label>
                                                            <input readonly class="form-control" type="text" name="address" placeholder="user@example.com" value="{{$value->address}}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        @else

                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tên cửa hàng</label>
                                                        <input readonly class="form-control" type="text" name="fullname" placeholder="" value="{{$value->fullname}}">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input readonly class="form-control" type="text" name="username" placeholder="" value="{{$value->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input readonly class="form-control" type="text" name="email" value="{{$value->email}}" placeholder="user@example.com">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <input readonly class="form-control" type="text" name="address" value="{{$value->address}}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input readonly class="form-control" type="text" name="phone" value="{{$value->phone}}" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="openTimeStart">Thời gian bắt đầu:</label>
                                                        <input readonly type="time" class="form-control" id="openTimeStart" value="{{$value->open_time_start}}" name="open_time_start">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="openTimeEnd">Thời gian kết thúc:</label>
                                                        <input readonly type="time" class="form-control" id="openTimeEnd" value="{{$value->open_time_start}}" name="open_time_start">
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label>Giới thiệu</label>
                                                        <textarea readonly class="form-control" rows="5" name="intro" placeholder="Cửa hàng chuyên cung cấp ... ">{{$value->intro}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                @endif
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-3">
                                        <div class="mb-2"><b>Đổi mật khẩu</b></div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Mật khẩu hiện tại</label>
                                                    <input class="form-control" type="password" placeholder="••••••">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Đặt mật khẩu mới</label>
                                                    <input class="form-control" type="password" placeholder="••••••">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Xác nhận <span class="d-none d-xl-inline">Mật khẩu</span></label>
                                                    <input class="form-control" type="password" placeholder="••••••">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                        <div class="mb-2"><b>Kết nối</b></div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Nhận thông báo qua Email</label>
                                                <div class="custom-controls-stacked px-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="notifications-blog" checked>
                                                        <label class="custom-control-label" for="notifications-blog">Tin tức</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="notifications-news" checked>
                                                        <label class="custom-control-label" for="notifications-news">Bản cập nhật mới</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="notifications-offers" checked>
                                                        <label class="custom-control-label" for="notifications-offers">Ưu đãi</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <!-- <button class="btn " type="button">
                                                </button> -->
                                        <a style="margin: 0 auto;" class="btn" href="{{ URL::to('/edit-profile/' . Auth::user()->id) }}">Sửa thông tin</a>
                                    </div>
                                </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mb-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="px-xl-3">
                        <button class="btn btn-block btn-secondary">
                            <a style="text-decoration: none; margin-left: -20px;" href="{{URL::to('/logout-checkout')}}">
                                <i class="fa fa-sign-out"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </button>
                    </div>


                </div>
            </div>
            <div class="card mb-3">
                <a style="color: #000; text-align: center; padding: 10px;" href="{{ URL::to('/vieworder-customer/' . Auth::user()->id) }}">Lịch sử đơn hàng</a>
            </div>

            @if(Auth::check() && Auth::user()->is_seller != 1)

            <form class="form" action="{{ URL::to('/update-role-seller/'.Auth::user()->id) }}" novalidate method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="avatar" value="{{$value->avatar}}">
                <input type="hidden" name="fullname" value="{{$value->fullname}}">
                <input type="hidden" name="name" value="{{$value->name}}">
                <input type="hidden" name="email" value="{{$value->email}}">
                <input type="hidden" name="address" value="{{$value->address}}">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title font-weight-bold">Hỗ trợ</h6>
                        <p class="card-text">Gửi yêu cầu cấp quyền đăng bán các sản phẩm.</p>
                        <button type="submit" class="btn">Gửi yêu cầu</button>
                    </div>
                </div>
            </form>

            @else

            <div class="card mb-3">
                <a href="{{URL::to('/list-order/'.Auth::user()->id)}}" style="color: #000; text-align: center; padding: 10px;">Quản lý đơn hàng</a>
            </div>

            <div class="card mb-3">
                <a href="{{URL::to('/list-customer/'.Auth::user()->id)}}" style="color: #000; text-align: center; padding: 10px;">Quản lý khách hàng</a>
            </div>

            <div class="card mb-3">
                <a href="{{URL::to('/list-post/'.Auth::user()->id)}}" style="color: #000; text-align: center; padding: 10px;">Quản lý bài đăng</a>
            </div>

            <!-- <div class="card mb-3">
                <a style="color: #000; text-align: center; padding: 10px;">Quản lý sản phẩm</a>
            </div> -->

            <!-- <div class="card">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold">Hỗ trợ</h6>
                    <p class="card-text">Gửi yêu cầu gỡ quyền đăng bán các sản phẩm.</p>
                    <button type="button" class="btn ">Gửi yêu cầu</button>
                </div>
            </div> -->

            @endif
        </div>
    </div>
</div>
</div>
</div>

@endforeach

@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body {
        margin-top: 20px;
        background: #f8f8f8
    }

    #openTimeSelect option {
        width: 100%;
        /* box-sizing: border-box; */
    }

    .nice-select.form-control {
        width: 100%;

    }
</style>