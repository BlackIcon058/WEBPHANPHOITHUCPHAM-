@extends('welcome')
@section('content')


@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif


@if($giohang->count() != 0)


<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <div>
                <h3><b>Giỏ hàng</b></h3>
            </div>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Đơn vị</th>

                        <th>Tổng tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                    $totalOrder = 0;

                    $num = 1;
                    @endphp

                    @foreach ($giohang as $i)
                    @php
                    $totalProduct = $i->soluong * $i->gia;
                    $totalOrder += $totalProduct;
                    @endphp

                    <tr style="height: 50px;">
                        <td class="align-middle" style="">
                            <img src="{{ asset('public/uploads/post/product/' . $i->prod->product_image) }}" alt="" style="width: 50px;">
                            <span>{{$i->prod->product_name}}</span>
                            <span></span>
                        </td>
                        <td class="align-middle">{{ number_format($i->prod->product_price, 0, ',', '.') }} VNĐ</td>


                        <td class="align-middle">
                            <form id="update-form-{{$i->id_sanpham}}" action="{{ route('giohang.update', $i->id_sanpham) }}" method="get">
                                <div class="input-group quantity mx-auto" style="width: 150px;">
                                    <input data-product-qty="{{$i->prod->product_qty}}" min="1" type="number" value="{{$i->soluong}}" name="soluong" class="form-control form-control-sm bg-secondary text-center" style=" background-color: #fff;width: 50px;">
                                    <input data-product-sold="{{$i->prod->product_sold}}" type="hidden" value="{{$i->prod->product_sold}}" name="soluong_daban" class="form-control form-control-sm bg-secondary text-center" style="background-color: #fff;width: 50px;">

                                    <input type="submit" class="btn btn-sm  btn-plus" value="update" name="update_qty" class="" style="width: 150px;padding: 15px;">
                                </div>
                            </form>
                        </td>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var forms = document.querySelectorAll('form[id^="update-form-"]');

                                forms.forEach(function(form) {
                                    form.addEventListener('submit', function(event) {
                                        event.preventDefault(); // Ngăn chặn việc submit form ngay lập tức

                                        var inputQty = form.querySelector('input[name="soluong"]');
                                        var inputSold = form.querySelector('input[name="soluong_daban"]');

                                        var userQty = parseInt(inputQty.value);
                                        var productQty = parseInt(inputQty.getAttribute('data-product-qty'));
                                        var productSold = parseInt(inputSold.value);
                                        var availableQty = productQty - productSold;

                                        if (userQty > availableQty) {
                                            if (confirm('Số lượng bạn yêu cầu vượt quá số lượng trong kho. Số lượng trong kho là ' + availableQty + '. Bạn có muốn cập nhật bằng số lượng trong kho không?')) {
                                                inputQty.value = availableQty;
                                                form.submit(); // Submit lại form sau khi cập nhật giá trị
                                            } else {
                                                return; // Không gửi form nếu người dùng không đồng ý
                                            }
                                        } else {
                                            form.submit(); // Gửi form nếu số lượng hợp lệ
                                        }
                                    });
                                });
                            });
                        </script>
                        <td class="align-middle">{{ $i->prod->don_vi_sp }}</td>

                        <td class="align-middle">{{ number_format($totalProduct, 0, ',', '.') }} VNĐ</td>
                        <td class="align-middle">
                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{$i->prod->product_name}} này không?')" href="{{ route('giohang.delete', $i->id_sanpham) }}" title="Delete" data-toggle="tooltip" class="btn btn-sm " style="width: 50px;padding: 15px;"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
            <br>
            <div class="cart-btn-right">
                <a href="{{ route('giohang.clear') }}" onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm không?');" class="btn">Xóa giỏ hàng</a>
                <!--<button type="submit" name="updatecart" class="btn">Cập nhật giỏ hàng</button> -->
            </div>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                    <div class="input-group-append">
                        <button class="btn ">Nhập mã giảm giá</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Giỏ hàng</h4>
                </div>
                <div class="card-body">
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


        </div>
        <div class="col-lg-4" style="padding: 50px 0px;">
            <div class="cart-btn">

                <div class="cart-total-btn">
                    <a href="{{URL::to('/')}}" class="btn  btn-block">Tiếp tục mua sắm</a>
                </div>
                <br>
                <div class="cart-total-btn">
                    <a href="{{URL::to('/checkout')}}" class="btn  btn-block">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>



@else

@if(Auth::check())

<div class="cart-page section-padding-5">
    <div class="container" style="text-align: center; padding-top: 100px;">
        <h4>Giỏ hàng trống!</h4>
    </div>

</div>
<br>

<div class="cart-btn">
    <div class="cart-btn-left" style="text-align: center; padding-bottom: 200px; ">
        <a href="{{URL::to('/')}}" class="btn ">Tiếp tục mua sắm</a>
    </div>
    <br>

</div>
@else
<br>
<div class="cart-btn">
    <div class="cart-btn-left" style="text-align: center; padding-bottom: 200px; padding-top: 100px;">
        <a href="{{URL::to('/login')}}" class="btn ">Vui lòng đăng nhập!</a>
    </div>
    <br>

</div>
@endif




@endif
<style>
    .bg-secondary {
        background-color: #fff !important;
    }
</style>

@endsection