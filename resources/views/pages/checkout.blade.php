@extends('welcome')
@section('content')

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 justify-content-center">
        <form class="needs-validation was-validated" action="{{URL::to('/save-checkout-customer')}}" method="post">
            {{csrf_field()}}
            <div class="col-lg-12" style="width: 970px;">
                <!-- <div class="mb-12">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin thanh toán</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <h5>Thông tin nhận hàng</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên cửa hàng</label>
                            <input class="form-control" type="text" placeholder="" name="shipping_name">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail Cửa hàng</label>
                            <input class="form-control" type="text" placeholder="" name="shipping_email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="shipping_phone">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="shipping_address">
                        </div>

                    </div>

                </div> -->
            </div>


            <div class="col-lg-12">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng hóa đơn</h4>
                    </div>
                    <?php

                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
                    ?>

                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>

                        @php
                        $totalOrder = 0;

                        $num = 0;
                        @endphp

                        @foreach ($giohang as $i)
                        @php

                        $totalProduct = $i->soluong * $i->gia;
                        $totalOrder += $totalProduct;
                        @endphp
                        <div class="d-flex justify-content-between">
                            <img src="{{ asset('public/uploads/post/product/' . $i->prod->product_image) }}" alt="" style="width: 50px;">
                            <p>{{$i->prod->product_name}}</p>
                            <p>{{ number_format($i->prod->product_price, 0, ',', '.') }} VNĐ</p>
                            <p>{{$i->soluong}} {{$i->prod->don_vi_sp}}</p>
                            

                            <p>{{ number_format($totalProduct, 0, ',', '.') }} VNĐ</p>
                        </div>


                        <div>
                            <p>Thông tin nhận hàng: <a style="color: #FF0000;" target="_blank" href="{{URL::to('/shop-details/' . $shop_detail[$num]->id)}}">Xem ảnh cửa hàng:</a>  | Tên cửa hàng: {{$shop_detail[$num]->fullname}} | Địa chỉ: <a style="color: #FF0000;" href="https://www.google.com/maps/search/?api=1&query={{ urlencode($shop_detail[$num]->address) }}" target="_blank">{{$shop_detail[$num]->address}}</a> | (Hoạt động: {{ \Carbon\Carbon::parse($shop_detail[$num]->open_time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($shop_detail[$num]->open_time_end)->format('H:i') }})</p>
                            @php
                            $num++;
                            @endphp
                        </div>
                        <br>

                        @endforeach

                        <input type="hidden" name="order_total" value="{{ number_format($totalOrder, 0, ',', '.') }}">

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền</h6>
                            <h6 class="font-weight-medium">{{ number_format($totalOrder, 0, ',', '.') }} VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">Miễn phí</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng hóa đơn</h5>
                            <h5 class="font-weight-bold">{{ number_format($totalOrder, 0, ',', '.') }} VNĐ</h5>
                        </div>
                    </div>
                </div>
            
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_option" value="Thanh toán khi nhận hàng" required id="COD">
                                <label class="custom-control-label" for="COD">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="send_order" class="btn btn-lg btn-block font-weight-bold my-3 py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>
<!-- Checkout End -->

@endsection