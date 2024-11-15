@extends('welcome')
@section('content')

<div class="container-xl vieworder_customer" style="margin-bottom: 100px; padding-bottom: 100px;">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 class="my-3">Chi tiết đơn hàng - <a target="_blank" style="text-decoration: none; color: blue;" href="{{URL::to('/chatify/' . $manage_details_order[0]->customer_id)}}"><i class="fa-regular fa-comment"></i><small> Chat với khách hàng</small></a> </h2>
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



                    @foreach($info_nguoi_mua as $key => $nguoi_mua)
                    <div class="col-sm-12">
                        <h4 class="my-3">
                            Thông tin người mua
                        </h4>
                        <p><b>Tài khoản: </b><a target="_blank" style="color: red;" href="{{ URL::to('/user-profile/' . $nguoi_mua->id) }}">{{$nguoi_mua->name}}</a></p>
                        <p><b>Tên: </b>{{$nguoi_mua->fullname}}</a></p>
                        <p><b>Email: </b>{{$nguoi_mua->email}}</a></p>

                        <p><b>Địa chỉ: </b> <a style="color: #FF0000;" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($nguoi_mua->address) }}" target="_blank">{{$nguoi_mua->address}}</a></p>
                        <p><b>Số điện thoại:</b> {{$nguoi_mua->phone}}</p>
                    </div>
                    @endforeach


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
                                        <input readonly type="number" value="{{$details->product_sales_quantity}}" name="product_sales_quantity" class="input_qty order_qty_{{$details->product_id}}">

                                        <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product_qty}}">

                                        <input type="hidden" name="order_code" class="order_code_input" value="{{$details->order_id}}">

                                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

                                        <!-- <input type="text" disabled value="{{$details->product_sales_quantity}}" name="product_sales_quantity"> -->
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
                            <tr>
                                <td colspan="9">
                                    @if($manage_details_order[0]->order_status == 1)
                                    <form action="">
                                        {{csrf_field()}}
                                        <select name="" class="approve_order">
                                            <option value="">----Chọn hình thức đơn hàng----</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="1" selected>Đã xác nhận</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="2">Đã giao thành công</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="3">Hủy đơn hàng</option>
                                        </select>
                                    </form>
                                    @elseif($manage_details_order[0]->order_status == 2)
                                    <form action="">
                                        {{csrf_field()}}
                                        <select name="" class="approve_order">
                                            <option value="">----Chọn hình thức đơn hàng----</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="1">Đã xác nhận</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="2" selected>Đã giao thành công</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="3">Hủy đơn hàng</option>
                                        </select>
                                    </form>
                                    @elseif($manage_details_order[0]->order_status == 3)
                                    <form action="">
                                        {{csrf_field()}}
                                        <select name="" class="approve_order">
                                            <option value="">----Chọn hình thức đơn hàng----</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="1">Đã xác nhận</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="2">Đã giao thành công</option>
                                            <option id="{{$manage_details_order[0]->order_id}}" value="3" selected>Hủy đơn hàng</option>
                                        </select>
                                    </form>

                                    @endif
                                </td>
                            </tr>
                            @else






                            @endif






                        </div>

                        <div>
                            <!-- check neu la nguoi ban, va phai la nguoi ban san pham cua don hang do -->
                            @if(Auth::check() && Auth::user()->is_seller == 1 && (Auth::user()->id == $manage_details_order[0]->id_nguoi_ban) && ($manage_details_order[0]->order_status == 2 || $manage_details_order[0]->order_status == 3))

                            <!-- Đánh giá của người mua -->
                            <div class="col-sm-12" style="margin-top: 100px;">
                                <form class="review-form">
                                    <h4 class="my-3">Đánh giá người mua</h4>

                                    @php
                                    if(isset($rating) && $rating != 0) {
                                    @endphp
                                    <ul class="rating-container">
                                        @for($count = 1; $count <= 5; $count++) @php $color=(isset($rating) && $rating>= $count) ? 'color:#ffcc00' : 'color:#ccc';
                                            @endphp
                                            <li title="Đánh giá sao" id="" data-user-index="" data-user-order_id="" data-user-customer_id="" data-user-rating="" class="" style="cursor: pointer; font-size: 30px; {{ $color }}">
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
                                            <li title="Đánh giá sao" 
                                            id="{{ $manage_details_order[0]->order_id }}-{{ $count }}" 
                                            data-user-index="{{ $count }}" 
                                            data-user-order_id="{{ $manage_details_order[0]->order_id }}" 
                                            data-user-customer_id="{{ $manage_details_order[0]->customer_id }}" 
                                            data-user-seller_id="{{ $manage_details_order[0]->id_nguoi_ban }}" 
                                            data-user-rating="{{ $rating }}" 
                                            class="user_rating" style="cursor: pointer; font-size: 30px; {{ $color }}">
                                                &#9733;
                                            </li>
                                            @endfor
                                    </ul>





                                    <textarea id="review-text" rows="5" cols="30"></textarea>
                                    <button id="submit-seller-review" type="button">Gửi đánh giá</button>

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



                            @else

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <style>
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
</style> -->
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




@endsection