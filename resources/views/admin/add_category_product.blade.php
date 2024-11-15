@extends('admin_layout')
@section('admin_content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Thêm danh mục sản phẩm</h2>
          </div>
        </div>
        
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{URL::to('/save-category-product')}}" class="tm-edit-product-form" method="post">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tên danh mục</label>
                <input id="name" name="category_product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả danh mục</label>
                <textarea name="category_product_desc" class="form-control validate" rows="5" required="" style="width: 100%"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Hiển thị</label>
                <select name="category_product_status" class="custom-select tm-select-accounts" id="category" fdprocessedid="ycdho9" style="width: 100%">
                  <option value="0">Ẩn</option>
                  <option value="1">Hiển thị</option>
                </select>
              </div>
              <div class="col-12">
                <button name="add_category_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Thêm danh mục</button>
              </div>
            </form>
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