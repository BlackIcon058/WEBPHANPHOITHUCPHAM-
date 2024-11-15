@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="tm-block-title d-inline-block">Thông tin bài đăng</h2>
        </div>
    </div>
</div>

<head>
    <style>
        body {
            color: #566787;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>



    <main>
        @foreach($bai_dang as $key => $bai)

        <div class="job-post-company pt-20 pb-20">
            <div class="container">
                <div class="row justify-content-between">

                    <!-- Right Content -->
                    <div class="col-xl-5 col-lg-5" style="margin: 0 auto;">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle" style="text-align: center;">
                                <h2><b>{{$bai-> product_name}}</b></h2>
                            </div>
                            <br>
                            <div>
                                <img src="{{ asset('public/uploads/post/product/' . $bai->product_image) }}" width="400px" alt="">
                            </div>
                            <br>
                            <ul>
                                <li>Ngày hết hạn bán : <span> {{$bai->het_han}}</span></li>
                                <li>Địa chỉ : <span>{{$bai->address}}</span></li>
                                <li>Cửa hàng: <span>{{$bai->fullname}}</span></li>
                                <li>Số lượng còn lại : <span>{{$bai->product_qty - $bai->product_sold}} {{$bai->don_vi_sp}}</span></li>
                                <li>Giá tiền : <span>{{$bai->product_price}} VNĐ</span></li>
                                
                            </ul>
                            <div style="text-align: center;">
                                <h5>Mô tả sản phẩm</h5>
                                <p>{{$bai->product_desc}}</p>
                            </div>

                            <br>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

        <hr>
        @endforeach
    </main>


    <div style="margin-bottom: 50px"></div>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Thông tin cửa hàng bán</h2>
                        </div>

                    </div>


                    <br>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 80px">Cửa hàng</th>
                                <th>Tên cửa hàng</th>
                                <th style="width: 160px">Email</th>
                                <th style="width: 160px">Địa chỉ</th>
                                <th>Số điện thoại</th>

                                <!-- <th style="width: 160px">Giá</th>
                                <th style="width: 170px">Tổng tiền</th> -->


                            </tr>
                        </thead>
                        @foreach($info_nguoi_ban as $key => $details)
                        <tbody>

                            <tr class="color_qty_{{$details->id_bai_dang}}">
                                <td>
                                    <img src="{{ asset('public/uploads/avt/' . $details->avatar) }}" width="300px" alt="" style="">
                                </td>
                                <td><a style="color: red" target="_blank" href="{{URL::to('/shop-details/' . $details->id)}}">{{$details->fullname}}</a></td>

                                <td>{{$details->email}}</td>
                                <td>
                                <a style="color: #FF0000;" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($details->address) }}" target="_blank">{{$details->address}}</a>

                                    <input type="hidden" min="1" {{$details->trang_thai == 2 ? 'disabled' : ''}} value="" name="product_sales_quantity" class="input_qty order_qty_{{$details->id}}">
                                    <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->id}}" value="">
                                    <input type="hidden" name="order_code" class="order_code_input" value="{{$details->id_bai_dang}}">
                                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->id}}">
                                </td>
                                <td>{{$details->phone}}</td>

                            </tr>


                        <tfoot>
                            <tr>
                                <td colspan="4"><strong>Tổng đơn hàng:</strong></td>
                                <td><strong></strong></td>
                            </tr>
                        </tfoot>
                        <tr>
                            <td colspan="9">
                                @if($details->trang_thai == 0)
                                <form action="">
                                    {{csrf_field()}}
                                    <select name="" class="post_details">
                                        <option value="">----Chọn hình thức đơn hàng----</option>
                                        <option id="{{$details->id_bai_dang}}" value="0" selected>Đang chờ duyệt</option>
                                        <option id="{{$details->id_bai_dang}}" value="1">Cho phép hiển thị</option>
                                    </select>
                                </form>
                                @elseif($details->trang_thai == 1)
                                <form action="">
                                    {{csrf_field()}}
                                    <select name="" class="post_details">
                                        <option value="">----Chọn hình thức đơn hàng----</option>
                                        <option id="{{$details->id_bai_dang}}" value="0">Đang chờ duyệt</option>
                                        <option id="{{$details->id_bai_dang}}" value="1" selected>Cho phép hiển thị</option>
                                        
                                    </select>
                                </form>
                                
                                
                                @endif
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@endsection