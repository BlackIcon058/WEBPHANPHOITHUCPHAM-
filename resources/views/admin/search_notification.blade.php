@extends('admin_layout')
@section('admin_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="tm-block-title d-inline-block">Liệt kê thông báo</h2>
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
                            <h2>Thông báo</h2>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{ URL::to('/tim-kiem-notification') }}" class="header_search" method="get">
                                {{csrf_field()}}
                                <!-- <div class="search-box"> -->
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo id, tiêu đề, nội dung ..." name="keywords_submit">
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
                                <th>#</th>
                                <th>Tiêu đề<i class="fa fa-sort"></i></th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($search_notification as $key => $noti)
                            <tr>
                                <td> {{ $noti-> id_thong_bao }}</td>
                                <td> {{ $noti-> tieu_de }}</td>
                                
                                <td> {{ $noti-> noi_dung}}</td>
                                <td>{{$noti-> ngay_dang}}</td>
                                <!-- hien thi -->
                        
                                <td>
                                    <?php
                                    if ($noti->trang_thai_thong_bao == 0) {
                                        echo '<a href="' . URL::to('/unactive-notification/' . $noti->id_thong_bao) . '"><span class="fa-solid fa-eye-slash"></span></a>';
                                    } else {
                                        echo '<a href="' . URL::to('/active-notification/' . $noti->id_thong_bao) . '"><span class="fa-solid fa-eye"></span></a>';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="{{URL::to('/edit-notification/'.$noti->id_thong_bao)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa thông báo này không?')" href="{{URL::to('/delete-notification/'.$noti->id_thong_bao)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
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
                        {{ $search_notification->appends(['keywords_submit' => $keywords])->links() }}
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
@endsection