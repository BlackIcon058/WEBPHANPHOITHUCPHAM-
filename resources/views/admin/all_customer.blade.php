@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="tm-block-title d-inline-block">Khách hàng</h2>
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
                            <h2>Danh sách khách hàng</h2>
                        </div>

                        <div class="col-sm-4">
                            <form action="{{ URL::to('/tim-kiem-customer') }}" class="header_search" method="get">
                                {{csrf_field()}}
                                <!-- <div class="search-box"> -->
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tên, email ..." name="keywords_submit">
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




                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vị trí</th>
                                <th>Khách hàng</th>
                                <th>Thông tin liên hệ</th>


                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_customer as $key => $cus)
                            <tr>
                                <td> {{ $cus-> id}}</td>
                                <td>
                                    @if($cus->is_seller == 1)
                                    <span style="color: red;">Người bán</span>
                                    @else
                                    Người mua
                                    @endif
                                </td>
                                <td><img src="{{ asset('public/uploads/avt/' . $cus->avatar) }}" width="30px" alt="" style=""> <br> {{$cus-> name}}</td>
                                <td>{{ $cus-> email}}
                                    <br>
                                    Địa chỉ: {{ $cus-> address}}
                                    <br>
                                    Số điện thoại: {{ $cus-> phone}}
                                    <br>
                                    Ngày tham gia: {{ \Carbon\Carbon::parse($cus->created_at)->format('Y:m:d') }}
                                </td>

                                <td>
                                    @if($cus->is_locked == 1)
                                    <button style="background-color: green;">
                                        <a style="text-decoration: none; color: #fff;" href="{{ URL::to('/unactive-user/' . $cus->id) }}">Mở khóa</a>
                                    </button>
                                    @else
                                    <button style="background-color: red;">
                                        <a style="text-decoration: none; color: #fff;" href="{{ URL::to('/active-user/' . $cus->id) }}">Khóa</a>
                                    </button>
                                    @endif

                                    @if($cus->is_seller == 2)
                                    <button style="background-color: blue; margin-top: 10px;">
                                        <a style="text-decoration: none; color: #fff; font-size: 15px;" href="{{ URL::to('/active-is-seller/' . $cus->id) }}">Cấp quyền bán</a>
                                    </button>
                                    @endif


                                </td>
                               

                            </tr>
                            @endforeach

                        </tbody>
                    </table>


                    <!-- Pagination Start -->
                    <div class="pagination-area pb-115 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-wrap d-flex justify-content-center">
                                        {{ $all_customer->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
</body>

</html>

<style>
    .table button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .table button:hover {
        background-color: #c82333;
    }
</style>
@endsection