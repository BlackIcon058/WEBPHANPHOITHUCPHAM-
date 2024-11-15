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

<body>


    @if(empty($filtered_list_customer))

    <div class="container order" style="text-align: center; padding: 200px;">
        <h4>Chưa có khách hàng!</h4>
    </div>
    @else
    <div class="container order">
        <div class="row">
        </div>

        <div class="container-xl order_customer">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Khách hàng</h2>
                            </div>

                            <!-- <div class="col-sm-4">
                            <form action="{{ URL::to('/tim-kiem-manageorder') }}" class="header_search" method="post">
                                {{csrf_field()}}
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo mã hóa đơn" name="keywords_submit">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn "><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div> -->
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
                                    <th>STT</th>
                                    <!-- <th>Tổng giá tiền</th> -->
                                    <th>Khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>

                                    <!-- <th>Hoàn thành</th>
                                <th>Đã hủy</th> -->
                                    <!-- <th>Tình trạng đơn hàng</th> -->
                                    <!-- <th>Ngày đặt hàng</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=0

                                @endphp

                                @foreach($filtered_list_customer as $key => $cus)
                                <tr>

                                    <td>
                                        @php
                                        $i++;
                                        echo $i;
                                        @endphp
                                    </td>

                                    <td>{{ $cus-> name}}</td>
                                    <td>{{ $cus-> email}}</td>
                                    <td>{{ $cus-> phone}}</td>
                                    <td>{{ $cus-> address}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <!-- <div class="clearfix" style="padding: 50px;">
                            <div class="hint-text"><b>1</b> trên tổng <b>1</b> trang</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="page-item active"><a href="#" class="page-link" style="z-index: 3;">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div> -->

                        <!-- Pagination Start -->
                        <div class="pagination-area pb-115 text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-wrap d-flex justify-content-center">
                                            {{ $filtered_list_customer->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- order mobile -->


    <!--  -->
</body>

</html>

@endsection