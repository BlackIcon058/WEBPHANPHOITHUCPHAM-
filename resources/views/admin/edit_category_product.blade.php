@extends('admin_layout')
@section('admin_content')

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật danh mục sản phẩm</h2>
          </div>
        </div>
        @foreach($edit_category_product as $key => $edit_value)
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" class="tm-edit-product-form" method="get">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tên danh mục</label>
                <input value="{{ $edit_value->category_name }}" id="name" name="category_product_name" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả danh mục</label>
                <textarea name="category_product_desc" class="form-control validate" rows="5" required="" style="width: 100%">
{{$edit_value->category_desc }}
                </textarea>
              </div>
              <div class="col-12">
                <button name="update_category_product" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật danh mục</button>
              </div>
            </form>
          </div>
        </div>

        @endforeach
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