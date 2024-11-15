@extends('admin_layout')
@section('admin_content')

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Cập nhật thông báo</h2>
          </div>
        </div>
        @foreach($edit_notification as $key => $edit_value)
        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{URL::to('/update-notification/'.$edit_value->id_thong_bao )}}" class="tm-edit-product-form" method="get">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tiêu đề</label>
                <input value="{{ $edit_value->tieu_de }}" id="name" name="notification_title" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="description">Nội dung</label>
                <textarea name="notification_desc" class="form-control validate" rows="5" required="" style="width: 100%">{{$edit_value->noi_dung }}</textarea>
              </div>
              <div class="col-12">
                <button name="update_notification" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Cập nhật thông báo</button>
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