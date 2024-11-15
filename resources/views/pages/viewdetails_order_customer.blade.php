@extends('welcome')
@section('content')

<!-- <style>
    #header-carousel {
        display: none;
    }
</style>

<div class="container-xl vieworder_customer">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="margin-top:25px ; margin-bottom: 20px">Chi tiết đơn hàng</h2>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <h4 style="margin-top:25px ; margin-bottom: 20px">Thông tin nhận hàng - Mã đơn hàng: {{$manage_details_order[0]->order_id}} - Trạng thái đơn hàng:
                            <?php if ($manage_details_order[0]->order_status == 1) echo "Đã xác nhận";
                            else if ($manage_details_order[0]->order_status == 2) echo 'Giao hàng thành công';
                            else echo 'Đơn hàng bị hủy'; ?>

                        </h4>
                        <p><b>Cửa hàng: </b> {{$manage_details_order[0]->fullname}}</p>
                        <p><b>Địa chỉ lấy hàng:</b> {{$manage_details_order[0]->address}}</p>
                        <p><b>Số điện thoại:</b> {{$manage_details_order[0]->phone}}</p>
                        <p><b>Hình thức thanh toán:</b> {{$manage_details_order[0]->payment_method}}</p>


                    </div>

                </div>

                <div class="row">
                <div class="col-sm-8">
                        <h4 style="margin-top:25px ; margin-bottom: 20px">Sản phẩm</h4>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_price = 0;
                            $i = 0;
                            @endphp
                            @foreach($manage_details_order as $key => $details)
                            <tr>
                                <td>
                                    @php
                                    $i++;
                                    @endphp
                                    {{$i}}
                                </td>
                                <td>{{$details->product_name}}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/post/product/' . $details->product_image) }}" height="100" width="100" alt="">
                                </td>

                                <td>
                                    <input type="" disabled value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
                                </td>
                                <td>{{number_format($details->product_price).' '.'VNĐ'}}</td>
                                <td>{{number_format($details->product_sales_quantity * $details->product_price).' '.'VNĐ'}}</td>
                            </tr>
                            @php
                            $total_price += $details->product_sales_quantity * $details->product_price;
                            @endphp
                            @endforeach

                        <tfoot>
                            <tr>
                                <td colspan="5"><strong>Tổng đơn hàng:</strong></td>
                                <td><strong>{{number_format($total_price).' '.'VNĐ'}}</strong></td>
                            </tr>
                        </tfoot>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div> -->

<div class="container-xl vieworder_customer">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 class="my-3">Chi tiết đơn hàng - <a target="_blank" style="text-decoration: none; color: blue;" href="{{URL::to('/chatify/' . $manage_details_order[0]->id_nguoi_ban)}}"><i class="fa-regular fa-comment"></i><small> Chat với cửa hàng</small></a> </h2>
                        </h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="my-3">
                            Thông tin nhận hàng - Mã đơn hàng: {{$manage_details_order[0]->order_id}} - Trạng thái đơn hàng:
                            <?php
                            if ($manage_details_order[0]->order_status == 1) echo "Đã xác nhận";
                            else if ($manage_details_order[0]->order_status == 2) echo 'Giao hàng thành công';
                            else echo 'Đơn hàng bị hủy'; ?>
                        </h4>
                        <p><b>Cửa hàng: </b><a style="color: #FF0000;" target="_blank" href="{{URL::to('/shop-details/' . $manage_details_order[0]->id_nguoi_ban)}}">{{$manage_details_order[0]->fullname}}</a></p>
                        <p><b>Địa chỉ lấy hàng:</b> <a style="color: #FF0000;" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($manage_details_order[0]->address) }}" target="_blank">{{$manage_details_order[0]->address}}</a></p>
                        <p><b>Số điện thoại:</b> {{$manage_details_order[0]->phone}}</p>
                        <p><b>Hình thức thanh toán:</b> {{$manage_details_order[0]->payment_method}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="my-3">Sản phẩm</h4>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_price = 0;
                                $i = 0;
                                @endphp
                                @foreach($manage_details_order as $key => $details)
                                <tr>
                                    <td>
                                        @php
                                        $i++;
                                        @endphp
                                        {{$i}}
                                    </td>
                                    <td>{{$details->product_name}}</td>
                                    <td>
                                        <img src="{{ asset('public/uploads/post/product/' . $details->product_image) }}" height="100" width="100" alt="">
                                    </td>
                                    <td>
                                        <input type="text" disabled value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
                                    </td>
                                    <td>{{number_format($details->product_price).' '.'VNĐ'}}</td>
                                    <td>{{number_format($details->product_sales_quantity * $details->product_price).' '.'VNĐ'}}</td>
                                </tr>
                                @php
                                $total_price += $details->product_sales_quantity * $details->product_price;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"><strong>Tổng đơn hàng:</strong></td>
                                    <td><strong>{{number_format($total_price).' '.'VNĐ'}}</strong></td>
                                </tr>
                            </tfoot>



                        </table>
                        <div>
                            <!-- check neu la nguoi ban, va phai la nguoi ban san pham cua don hang do -->
                            @if(Auth::check() && Auth::user()->is_seller == 1 && (Auth::user()->id == $manage_details_order[0]->id_nguoi_ban))

                            @else


                            @php
                            if($manage_details_order[0]->order_status == 2 || $manage_details_order[0]->order_status == 3){
                            @endphp


                            <!-- neu khong, co quyen danh gia san pham -->
                            <div class="col-sm-12" style="margin-top: 100px;">
                                <form class="review-form">
                                    <h4 class="my-3">Đánh giá đơn hàng</h4>

                                    @php
                                    if(isset($rating) && $rating != 0) {
                                    @endphp
                                    <ul class="rating-container">
                                        @for($count = 1; $count <= 5; $count++) @php $color=(isset($rating) && $rating>= $count) ? 'color:#ffcc00' : 'color:#ccc';
                                            @endphp
                                            <li title="Đánh giá sao" id="" data-index="" data-order_id="" data-customer_id="" data-rating="" class="" style="cursor: pointer; font-size: 30px; {{ $color }}">
                                                &#9733;
                                            </li>
                                            @endfor
                                    </ul>

                                    <textarea readonly id="review-text" name="" rows="5" cols="30">{{$review}}</textarea>
                                    <!-- <button id="submit-review" type="submit">Gửi đánh giá</button> -->
                                    @php
                                    } else {
                                    @endphp

                                    <ul class="rating-container">
                                        @for($count = 1; $count <= 5; $count++) @php $color=(isset($rating) && $rating>= $count) ? 'color:#ffcc00' : 'color:#ccc';
                                            @endphp
                                            <li title="Đánh giá sao" id="{{ $manage_details_order[0]->order_id }}-{{ $count }}" data-index="{{ $count }}" data-order_id="{{ $manage_details_order[0]->order_id }}" data-customer_id="{{ Auth::user()->id }}" data-seller_id="{{ $manage_details_order[0]->id_nguoi_ban }}" data-rating="{{ $rating }}" class="rating" style="cursor: pointer; font-size: 30px; {{ $color }}">
                                                &#9733;
                                            </li>
                                            @endfor
                                    </ul>





                                    <textarea id="review-text" rows="5" cols="30"></textarea>
                                    <button id="submit-review" type="button">Gửi đánh giá</button>

                                    @php
                                    }
                                    @endphp



                                    <!-- <div class="d-flex justify-content-between align-items-center review-summary">
                                        <div class="ratings">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5 class="review-count">12 Đánh giá</h5>
                                    </div> -->

                                </form>
                            </div>


                            @php
                            }else

                            @endphp

                            @php

                            @endphp



                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rating-container {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .rating-container li {
        display: inline-block;
    }

    .vieworder_customer {
        max-width: 1200px;
        /* Giới hạn chiều rộng tối đa */
        margin: auto;
        /* Canh giữa */
    }

    .table-wrapper {
        padding: 20px;
        /* Thêm khoảng cách để bảng không dính sát */
    }

    .ratings {
        margin-right: 10px;
    }

    .ratings i {
        color: #cecece;
        font-size: 25px;
    }

    .rating-color {
        color: #fbc634 !important;
    }

    .review-count {
        font-weight: 400;
        margin-bottom: 2px;
        font-size: 24px !important;
    }

    .review-form {
        max-width: 100%;
        /* Đặt chiều rộng tối đa để form không quá rộng */
        margin: auto;
        /* Canh giữa form */
    }

    .review-form textarea {
        width: 100%;
        /* Đặt chiều rộng 100% để textarea chiếm toàn bộ chiều rộng form */
        margin-bottom: 10px;
        /* Thêm khoảng cách phía dưới */
        padding: 10px;
        /* Thêm khoảng cách bên trong */
        border-radius: 5px;
        /* Bo tròn các góc */
        border: 1px solid #ccc;
        /* Đặt viền cho textarea */
    }

    .review-form button {
        display: block;
        /* Đặt nút gửi đánh giá thành khối để canh giữa */
        width: 100%;
        /* Đặt chiều rộng 100% để nút chiếm toàn bộ chiều rộng form */
        padding: 10px;
        /* Thêm khoảng cách bên trong */
        background-color: #f8f9fa;
        /* Màu nền cho nút */
        border: 1px solid #ccc;
        /* Viền cho nút */
        border-radius: 5px;
        /* Bo tròn các góc */
        color: #000;
        /* Màu chữ */
        text-align: center;
        /* Canh giữa chữ */
        text-decoration: none;
        /* Bỏ gạch chân */
        margin-bottom: 20px;
        /* Thêm khoảng cách phía dưới */
    }

    .review-summary {
        margin-top: 10px;
        /* Thêm khoảng cách phía trên */
    }
</style>

<script>
    //hover chuot danh gia sao

    // $(document).on('mouseenter','.rating', function(){
    //     var index = $(this).data("index");
    //     var product_id = $(this).data('product_id');

    //     alert(index);
    //     alert(product_id);
    //     remove_background($product_id);

    //     for(var count = 1; count <= index; count++){
    //         $('#'+product_id+'-'+count).css('color', '#ffcc00');
    //     }
    // })

    // // nha chuot khong danh gia
    // $(document).on('mouseleave', '.rating', function(){
    //     var index = $(this).data("index");
    //     var product_id = $(this).data('product_id');
    //     var rating = $(this).data("rating");

    //     remove_background(product_id);
    //     // alert rating
    //     for(var count = 1; count <= rating; count++){
    //         $('#'+product_id+'-'+count).css('color', '#ffcc00');
    //     }
    // })
</script>


@endsection