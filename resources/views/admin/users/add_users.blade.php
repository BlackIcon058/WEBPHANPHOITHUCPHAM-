@extends('admin_layout')
@section('admin_content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="tm-block-title d-inline-block">Thêm users</h2>
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

        <div class="row tm-edit-product-row justify-content-center">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{URL::to('/store-users')}}" class="tm-edit-product-form" method="post">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label for="name">Tên user</label>
                <input id="name" name="admin_name" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="form-group mb-3">
                <label for="name">Email</label>
                <input id="name" name="admin_email" type="text" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Password</label>
                <input id="name" name="admin_password" type="password" class="form-control form-control-lg validate" required="">
              </div>
              <div class="form-group mb-3">
                <label for="name">Phone</label>
                <input id="name" name="admin_phone" type="text" class="form-control form-control-lg validate" required="">
              </div>

              <div class="col-12">
                <button name="add_users" type="submit" class="btn btn-primary btn-block text-uppercase" fdprocessedid="yeyseq">Thêm user</button>
              </div>
            </form>
          </div>
        </div>
      </div>



    </div>




  </div>
</div>

@endsection