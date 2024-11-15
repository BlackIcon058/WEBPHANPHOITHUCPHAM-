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

    @if(empty($order))

    <div class="container order" style="text-align: center; padding: 200px;">
        <h4>Chưa có đơn hàng!</h4>
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
                                <h2>Đơn hàng</h2>
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
                                    <th>Mã đơn hàng</th>
                                    <!-- <th>Tổng giá tiền</th> -->
                                    <!-- <th>Khách hàng</th> -->
                                    <th>Hình thức thanh toán</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>

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

                                @foreach($order as $key => $or)
                                <tr>


                                    <td>{{ $or-> order_id}}</td>
                                    <!-- <td>{{ $or-> customer_id}}</td> -->
                                    <!-- <td>{{ $or-> id_nguoi_ban}}</td> -->

                                    <td>{{ $or-> payment_method}}</td>
                                    <td>{{ $or-> address}}</td>
                                    <td>{{number_format($or-> order_total).' '.'VNĐ'}}</td>
                                    <td>
                                        @if($or->order_status == 1)
                                        Đã xác nhận
                                        @elseif($or->order_status == 2)
                                        Đã hoàn thành
                                        @else
                                        Đã hủy
                                        @endif
                                    </td>
                                    <td>{{ $or-> created_at}}</td>

                                    <td>
                                        <a style="color: #000;" href="{{URL::to('/approve-orders/'.$or->order_id)}}" class="edit" title="View" data-toggle="tooltip">Chi tiết</a>
                                    </td>


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
                                            {{ $order->links() }}
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