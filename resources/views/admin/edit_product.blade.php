@extends('admin_layout')
@section('admin_content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật sản phẩm</h2>
          </div>
        </div>

        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            @foreach($edit_product as $key => $pro)
            <form action="{{URL::to('/update-product/'.$pro->product_id)}}" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tên sản phẩm</label>
                <input value="{{$pro->product_name}}" id="name" name="product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Giá sản phẩm</label>
                <input value="{{$pro->product_price}}" id="name" name="product_price" type="number" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Hình ảnh sản phẩm</label>
                <input id="name" name="product_image" type="file" class="form-control form-control-lg validate">
                <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" height="100" width="100">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả sản phẩm</label>
                <textarea name="product_desc" class="form-control validate" rows="3" required="" style="width: 100%">
                {{$pro->product_desc}}
                </textarea>
              </div>
              <div class="form-group mb-3">
                <label for="description">Nội dung sản phẩm</label>
                <textarea name="product_content" class="form-control validate" rows="4" required="" style="width: 100%">
                {{$pro->product_content}}

                </textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Hiển thị</label>
                <select name="product_status" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  <?php
                  $product_status = $pro->product_status;
                  ?>

                  @if($product_status == 0)
                  <option value="0" selected>Ẩn</option>
                  <option value="1">Hiển thị</option>
                  @else
                  <option value="0">Ẩn</option>
                  <option value="1" selected>Hiển thị</option>
                  @endif

                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Danh mục sản phẩm</label>
                <select name="product_cate" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  @foreach($cate_product as $key => $cate)
                  @if($cate->category_id == $pro->category_id)
                  <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                  @else
                  <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <!-- <div class="form-group mb-3">
                <label for="category">Thương hiệu</label>
                <select name="product_brand" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                @foreach($brand_product as $key => $brand)
                    @if($cate->category_id == $pro->category_id)
                   <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                   @else
                   <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                   @endif

                @endforeach
                
                </select>
              </div> -->

              <div class="form-group mb-3">
                <label for="name">Số lượng sản phẩm</label>
                <input value="{{$pro->product_qty}}" id="name" name="product_qty" type="number" class="form-control form-control-lg validate" required="">
              </div>


              <div class="col-12">
                <button name="update_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật sản phẩm</button>
              </div>
            </form>

            @endforeach
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <h5 class="tm-block-title d-inline-block" style="color: red;">
            <?php
            $message = Session::get('message');
            if ($message) {
              echo $message;
              Session::put('message', null);
            }
            ?>
          </h5>
        </div>
      </div>

    </div>




  </div>
</div>

@endsection