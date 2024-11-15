@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="tm-block-title d-inline-block">Báo cáo kho</h2>
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
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 style="color: red;">Báo cáo sản phẩm sắp hết hàng</h2>
                        </div>

                        <div class="col-sm-4">
                            <form action="{{ URL::to('/tim-kiem-report') }}" class="header_search" method="post">
                                {{csrf_field()}}
                                <!-- <div class="search-box"> -->
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tên..." name="keywords_submit">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-left">
                            <h7 class="tm-block-title d-inline-block" style="color: red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </h7>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <!-- Cột 1 -->
                            <form style="" action="{{URL::to('/tim-kiem-nang-cao-report')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <select data-filter="make" class="filter-make filter form-control" name="category_submit">
                                        <option value="">Chọn danh mục: </option>
                                        <option value="12">Điện thoại</option>
                                        <option value="13">Âm thanh</option>
                                        <option value="14">Phụ kiện</option>
                                        <option value="15">Khuyến mãi</option>
                                    </select>
                                </div>

                        </div>
                        <div class="col-sm-4">
                            <!-- Cột 2 -->
                            {{csrf_field()}}
                            <div class="form-group">
                                <select data-filter="model" class="filter-model filter form-control" name="brand_submit">
                                    <option value="">Chọn thương hiệu: </option>
                                    <option value="3">iPhone</option>
                                    <option value="1">SAMSUNG</option>
                                    <option value="4">OPPO</option>
                                    <option value="5">VIVO</option>
                                    <option value="6">realme</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <!-- Cột 3 -->
                            {{csrf_field()}}
                            <div class="form-group">
                                <select data-filter="price" class="filter-price filter form-control" name="price_submit">
                                    <option value="">Sắp xếp theo giá:</option>
                                    <option value="1">Từ thấp đến cao</option>
                                    <option value="2">Từ cao đến thấp</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group col-sm-1">
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </div>

                        </form>
                    </div>


                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Hình sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Số lượng</th>

                                <th>Thêm sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($search_all_report as $key => $pro)
                            <tr>
                                <td> {{ $pro-> product_id}}</td>
                                <td> {{$pro-> product_name}}</td>
                                <td> {{ $pro-> product_price}}</td>
                                <td> <img src="public/uploads/product/{{ $pro-> product_image}}" height="100" width="100" alt=""> </td>
                                <td> {{$pro-> category_name}}</td>
                                <td> {{ $pro-> brand_name}}</td>
                                <td style="color: red;">{{ $pro-> product_qty}}</td>
                                <td>
                                    <!-- <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                                    
                                    <input type="number" id="product-qty" style="width: 60px;">
                                    <button style="width: 40px; height: 33px" class="edit_qty_in_report btn btn-primary" title="Add" data-toggle="tooltip" data-product-id="{{$pro->product_id}}" data-product-qty="{{$pro->product_qty}}">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <!-- <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a> -->
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>



@endsection