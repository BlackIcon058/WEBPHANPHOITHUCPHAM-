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



@if(session('status'))
<script>
    alert("{{ session('status') }}");
</script>
{{ session()->forget('status') }}
@endif


<body>

    @if(empty($all_post))

    <div class="container order" style="text-align: center; padding: 200px;">
        <h4>Chưa có bài đăng!</h4>
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
                                <h2>Bài đăng</h2>
                            </div>

                            <!-- <div class="col-sm-4">
                            <form action="{{ URL::to('/tim-kiem-manageorder') }}" class="header_search" method="post">
                                {{csrf_field()}}
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo mã hóa đơn" name="keywords_submit">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn "><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div> -->

                        </div>


                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Cửa hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng - Ngày hết hạn</th>

                                    <!-- <th>Hiển thị</th> -->
                                    <th>Thao tác</th>

                                    <!-- <th>Hoàn thành</th>
                                <th>Đã hủy</th> -->
                                    <!-- <th>Tình trạng đơn hàng</th> -->
                                    <!-- <th>Ngày đặt hàng</th> -->

                                </tr>
                            </thead>
                            <tbody>


                                @foreach($all_post as $key => $post)
                                <tr>

                                    <td> {{ $post-> id_bai_dang }}</td>
                                    <!-- <td> </td> -->
                                    <td><img src="{{ asset('public/uploads/avt/' . $post->avatar) }}" width="30px" alt="" style=""> {{ $post-> fullname }}</td>
                                    <td><img src="{{ asset('public/uploads/post/product/' . $post->product_image) }}" width="30px" alt="" style=""> {{ $post-> product_name}}</td>
                                    <td> {{ $post-> product_qty}} {{ $post-> don_vi_sp}}</td>
                                    <td>
                                        @if($post->trang_thai == 1)
                                        Đang hiển thị
                                        @else
                                        <span style="color: red;">Đang chờ duyệt</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($post->ngay_dang)->format('H:i Y:m:d') }} - {{ \Carbon\Carbon::parse($post->het_han)->format('H:i Y:m:d') }}</td>

                                    <td>
                                        <a  style="color: #000;" href="{{URL::to('/view-post-user/'.$post->id_bai_dang)}}" class="edit" title="Edit" data-toggle="tooltip">Chi tiết</a>
                                        <a style="color: #000;" onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')" href="{{URL::to('/delete-post-user/'.$post->id_bai_dang)}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
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
                        {{ $all_post->links() }}
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

</body>

</html>

@endsection