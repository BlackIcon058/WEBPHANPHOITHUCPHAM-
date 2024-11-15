<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Order as ModelsOrder;
use App\Models\Product as ModelsProduct;
use App\Models\Rating;
use App\Models\RatingUser;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Auth;
use Session;


class CustomerController extends Controller
{

    // xác thực đăng nhập
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        // $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    // bật kích hoạt tài khoản người bán
    public function active_store($user_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        DB::table('users')->where('id', $user_id)->update(['is_locked' => 1]);
        Session::put('message', 'Tắt kích hoạt tài khoản thành công!');
        return Redirect::to('all-stores');
    }

    // tắt kích hoạt tài khoản người bán
    public function unactive_store($user_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        DB::table('users')->where('id', $user_id)->update(['is_locked' => 0]);
        Session::put('message', 'Kích hoạt tài khoản thành công!');
        return Redirect::to('all-stores');
    }

    // tắt kích hoạt tài khoản người mua
    public function active_user($user_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        DB::table('users')->where('id', $user_id)->update(['is_locked' => 1]);
        Session::put('message', 'Tắt kích hoạt tài khoản thành công!');
        return Redirect::to('all-customers');
    }

    // tắt kích hoạt tài khoản người mua
    public function unactive_user($user_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        DB::table('users')->where('id', $user_id)->update(['is_locked' => 0]);
        Session::put('message', 'Kích hoạt tài khoản thành công!');
        return Redirect::to('all-customers');
    }

    //cho phép tài khoản có quyền bán
    public function active_is_seller($user_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        DB::table('users')->where('id', $user_id)->update(['is_seller' => 1]);
        Session::put('message', 'Kích hoạt quyền bán cho tài khoản thành công!');
        return Redirect::to('all-stores');
    }




    // liệt kê người bán
    public function all_stores()
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $all_customer = DB::table('users')
            ->where('is_seller', 1)
            ->orderBy('id', 'asc')
            ->paginate(4);

        // ->get();

        return view('admin.all_stores')->with('all_customer', $all_customer);
    }

    // tìm kiếm người bán
    public function tim_kiem_stores(Request $request)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $keywords = $request->keywords_submit;
        if ($keywords) {

            $search_customer = DB::table('users')->where('name', 'like', '%' . $keywords . '%')
                ->orWhere('email', 'like', '%' . $keywords . '%')
                // ->orWhere('customerphone', 'like', '%' . $keywords . '%')
                ->get();

            $customer_ids = $search_customer->pluck('id');
            $customer = DB::table('users')
                ->whereIn('id', $customer_ids)
                ->where('is_seller', 1)
                ->paginate(3);

            return view('admin.search_stores')->with('search_customer', $search_customer)->with('keywords', $keywords)
                ->with(compact('customer'));
        } else {
            return Redirect::to('all-stores');
        }
    }


    //liệt kê người mua
    public function all_customers()
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $all_customer = DB::table('users')
            ->whereIn('is_seller', [0, 2])
            ->orderBy('id', 'asc')
            ->paginate(4);

        // ->get();
        return view('admin.all_customer')->with('all_customer', $all_customer);
    }


    // tìm kiếm người mua
    public function tim_kiem_customer(Request $request)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $keywords = $request->keywords_submit;
        if ($keywords) {

            $search_customer = DB::table('users')->where('name', 'like', '%' . $keywords . '%')
                ->orWhere('email', 'like', '%' . $keywords . '%')
                // ->orWhere('customerphone', 'like', '%' . $keywords . '%')
                ->get();

            $customer_ids = $search_customer->pluck('id');
            $customer = DB::table('users')
                ->whereIn('id', $customer_ids)
                ->whereIn('is_seller', [0, 2])
                ->paginate(4);

            return view('admin.search_customer')->with('search_customer', $search_customer)->with('keywords', $keywords)
                ->with(compact('customer'));
        } else {
            return Redirect::to('all-customers');
        }
    }

    // liệt ke đơn hàng, dành cho khách hàng 
    public function vieworder_customer($id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {

            $manage_order = DB::table('tbl_order')
                ->select('tbl_order.*', 'users.*', 'tbl_order.created_at') // Thêm 'tbl_order.created_at' vào danh sách các cột
                ->join('users', 'users.id', '=', 'tbl_order.customer_id')
                ->where('users.id', $id)
                ->orderby('tbl_order.created_at', 'desc')
                ->paginate(4);
            // ->get();   

            return view('pages.vieworder_customer')->with(compact('manage_order'));
        } else {
            return redirect('/');
        }
    }

    // xem chi tiết đơn hàng, dành cho khách hàng
    public function viewdetails_order_customer($order_id)
    {

        $id_nguoi_mua = DB::table('tbl_order')->where('tbl_order.order_id', $order_id)->value('customer_id');
        if (Auth::check() && (Auth::user()->id == $id_nguoi_mua)) {

            $manage_details_order = DB::table('tbl_order_details')
                ->select('tbl_order_details.*', 'tbl_product.*', 'users.*', 'tbl_order.*')
                ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_details.product_id')
                ->join('tbl_order', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
                ->join('users', 'users.id', '=', 'tbl_product.id_nguoi_ban')
                ->where('tbl_order_details.order_id', $order_id)
                ->get();

            $rating = Rating::where('order_id', $order_id)->value('rating');
            $review = Rating::where('order_id', $order_id)->value('review');


            return view('pages.viewdetails_order_customer')->with(compact('manage_details_order', 'rating', 'review'));
        } else {
            return redirect('/');
        }
    }


    //đánh giá người bán thông qua đơn hàng
    public function insert_rating(Request $request)
    {

        $data = $request->all();
        $rating = new Rating();
        $rating->customer_id = $data['customer_id'];
        $rating->order_id = $data['order_id'];
        $rating->rating = $data['index'];
        $rating->review = $data['review_text'];
        $rating->seller_id = $data['seller_id'];

        $rating->save();

        $averageRating = Rating::where('seller_id', $data['seller_id'])->avg('rating');
        $averageRating = round($averageRating);

        DB::table('users')
            ->where('id', $data['seller_id'])
            ->update(['rating' => $averageRating]);

        echo 'done';
    }


    //đánh giá người mua thông qua đơn hàng
    public function insert_rating_user(Request $request)
    {

        $data = $request->all();
        $rating = new RatingUser();

        $rating->user_id = $data['customer_id'];
        $rating->order_id = $data['order_id'];
        $rating->rating = $data['index'];
        $rating->review = $data['review_text'];
        $rating->seller_id = $data['seller_id'];

        $rating->save();

        $averageRating = RatingUser::where('user_id', $data['customer_id'])->avg('rating');
        $averageRating = round($averageRating);

        DB::table('users')
            ->where('id', $data['customer_id'])
            ->update(['rating' => $averageRating]);

        echo 'done';
    }



    // 

    // -----------------------------------------------------------------
    // chỉnh sửa thông tin cá nhân
    public function edit_profile($id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {
            $profile = DB::table('users')->where('id', $id)->get();
            return view('pages.edit_profile')->with('profile', $profile);
        } else {
            return redirect('/');
        }
    }

    //lưu cập nhật thông tin cá nhân
    public function update_profile(Request $request, $id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {
            // $profile = DB::table('users')->where('id', $id)->get();

            $data = array();
            $data['fullname'] = $request->input('fullname');
            $data['name'] = $request->input('username');
            $data['email'] = $request->input('email');
            $data['address'] = $request->input('address');
            $data['phone'] = $request->input('phone');
            $data['open_time_start'] = $request->input('open_time_start') ?? null;
            $data['open_time_end'] = $request->input('open_time_end') ?? null;
            $data['intro'] = $request->input('intro') ?? null;

            if (Auth::user()->is_seller == 0) {
                if (empty($data['fullname']) || empty($data['name']) || empty($data['email'])  || empty($data['address']) || empty($data['phone'])) {
                    Session::put('status', 'Vui lòng kiểm tra thông tin!');
                    return redirect('/edit-profile/' . $id);
                } else {
                    DB::table('users')->where('id', $id)->update($data);
                    Session::put('status', 'Cập nhật thông tin thành công!');
                    return redirect('/profile/' . $id);
                }
            } elseif (Auth::user()->is_seller == 1) {
                if (empty($data['fullname']) || empty($data['name']) || empty($data['email'])  || empty($data['address']) || $data['open_time_start'] == null || $data['open_time_end'] == null || $data['intro'] == null || empty($data['phone'])) {
                    Session::put('status', 'Vui lòng kiểm tra thông tin!');
                    return redirect('/edit-profile/' . $id);
                } else {
                    DB::table('users')->where('id', $id)->update($data);
                    Session::put('status', 'Cập nhật thông tin cửa hàng thành công!');
                    return redirect('/profile/' . $id);
                }
            }
        } else {
            return redirect('/');
        }
    }

    //gửi cấp quyền người bán
    public function update_role_seller(Request $request, $id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {
            $data = array();
            $data['fullname'] = $request->input('fullname');
            $data['avatar'] = $request->input('avatar');
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['address'] = $request->input('address');
            //2 trạng thái chờ xác nhận
            $data['is_seller'] = 2;

            // dd($data);

            if (empty($data['fullname']) || empty($data['name']) || empty($data['email'])  || empty($data['address']) || ($data['avatar'] == "avatar.png")) {
                if ($data['avatar'] == "avatar.png") {
                    Session::put('status', 'Vui lòng chọn ảnh đại diện là hình ảnh của cửa hàng!');
                } else {
                    Session::put('status', 'Kiểm tra đầy đủ thông tin!');
                }
                return redirect('/profile/' . $id);
            } else {
                DB::table('users')->where('id', $id)->update(['is_seller' => 2]);
                Session::put('status', 'Gửi cấp quyền thành công! Vui lòng đợi chờ hệ thống xét duyệt!');
                return redirect('/profile/' . $id);
            }
        } else {
            return redirect('/');
        }
    }


    // public function remove_role_seller(Request $request, $id)
    // {
    //     if (Auth::check() && (Auth::user()->id == $id)) {
    //         if(Auth::user()->is_seller == 1){
    //             $data = array();
    //             //0 trạng thái chờ xóa quyền
    //             $data['is_seller'] = 3;
    //             // dd($data);
    //             DB::table('users')->where('id', $id)->update(['is_seller' => 3]);
    //             Session::put('status', 'Gửi gỡ quyền thành công! Vui lòng đợi chờ hệ thống xét duyệt!');
    //             return redirect('/profile/' . $id);
    //         }else{
    //             Session::put('status', 'Xảy ra lỗi! Vui lòng thử lại');
    //             return redirect('/profile/' . $id);
    //         }
    //     } else {
    //         return redirect('/');
    //     }
    // }



    //cập nhật ảnh đại diện
    public function update_avatar(Request $request, $id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {
            $data = array();
            $get_image = $request->file('avatar');
            // dd($get_image);

            $image = '';

            if ($request->file('avatar') == null) {
                $image = DB::table('users')->where('id', $id)->value('avatar');
                // dd($image);
            }

            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $new_image = current(explode('.', $get_name_image));

                $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/avt', $new_image); // use public_path() instead of 'public/'

                $new_image_path = 'public/uploads/avt/' . $new_image; // đường dẫn mới của tệp tin

                // Copy tệp tin đến thư mục mới thứ hai
                $new_image_path_second = 'storage/app/public/users-avatar/' . $new_image; // đường dẫn mới của tệp tin trong thư mục thứ hai
                copy($new_image_path, $new_image_path_second);

                // $get_image->move('storage/app/public/users-avatar', $new_image); // use public_path() instead of 'public/'

                $data['avatar'] = $new_image;
                DB::table('users')->where('id', $id)->update(['avatar' => $data['avatar']]);
                Session::put('status', 'Cập nhật ảnh đại diện thành công!');
                return redirect('/profile/' . $id);
            }

            $data['avatar'] = $image;

            DB::table('users')->where('id', $id)->update(['avatar' => $data['avatar']]);
            Session::put('status', 'Cập nhật ảnh đại diện thành công!');
            return redirect('/profile/' . $id);

            // if (($data['avatar'] == "avatar.png")) {
            //     Session::put('status', 'Có lỗi xảy ra! Vui lòng thao tác lại!');
            //     return redirect('/profile/' . $id);
            // } else {
            //     DB::table('users')->where('id', $id)->update(['avatar' => $data['avatar']]);
            //     Session::put('status', 'Cập nhật ảnh đại diện thành công!');
            //     return redirect('/profile/' . $id);
            // }
        } else {
            return redirect('/');
        }
    }


    //kiểm tra có người bán đã cập nhật đầy đủ thông tin chưa
    public function check_full_info_seller($id)
    {
        // Lấy thông tin người dùng từ bảng users
        $user = Auth::user();

        // Kiểm tra các trường có giá trị hay không
        $fields = ['name', 'email', 'password', 'avatar', 'phone', 'address', 'fullname', 'open_time_start', 'open_time_end', 'intro'];
        foreach ($fields as $field) {
            if (empty($user->$field)) {
                return false;
            }
            // Kiểm tra nếu avatar là "avatar.png"
            if ($field == 'avatar' && $user->$field == "avatar.png") {
                return false;
            }
        }
        return true;
    }

    //tạo mới bài đăng
    public function add_post(Request $request, $id)
    {
        if (Auth::check() && (Auth::user()->id == $id) && $this->check_full_info_seller(Auth::user()->id)) {

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $get_image = $request->file('product_image');
            // dd($get_image);

            $data = array();
            $data['product_name'] = $request->input('product_name');
            $data['category_id'] = $request->input('category_id');
            $data['product_price'] = $request->input('product_price');
            $data['product_deadline'] = $request->input('product_deadline');
            $data['product_qty'] = $request->input('product_qty');
            $data['product_sold'] = 0;
            $data['product_content'] = null;
            $data['product_status'] = 1;
            $data['product_desc'] = $request->input('product_desc');
            $data['id_nguoi_ban'] = $id;
            $data['don_vi_sp'] = $request->input('weight_unit');
            $data['created_at'] = date('Y-m-d H:i:s');

            // dd($data);

            if ($request->file('product_image') == null) {
                Session::put('status', 'Vui lòng chọn hình ảnh!');
                return redirect('/post');
            } else {
                if (empty($data['product_name']) || empty($data['category_id']) || empty($data['product_price']) || empty($data['product_deadline']) || empty($data['product_qty']) || empty($data['product_desc'])) {
                    Session::put('status', 'Vui lòng nhập đầy đủ thông tin bài đăng!');
                    return redirect('/post');
                } else {
                    if ($get_image) {
                        $get_name_image = $get_image->getClientOriginalName();
                        $new_image = current(explode('.', $get_name_image));
                        $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                        $get_image->move('public/uploads/post/product', $new_image); // use public_path() instead of 'public/'
                        $data['product_image'] = $new_image;
                        // DB::table('users')->where('id', $id)->update(['avatar' => $data['product_image']]);
                        // DB::table('tbl_product')->insert($data);

                        $data_bai_dang = array();
                        $id_san_pham = DB::table('tbl_product')->insertGetId($data);
                        $data_bai_dang['id_san_pham'] = $id_san_pham;
                        $data_bai_dang['ngay_dang'] = date('Y-m-d H:i:s');
                        $data_bai_dang['het_han'] = $request->input('product_deadline');
                        $data_bai_dang['id_nguoi_ban'] = $id;
                        $data_bai_dang['trang_thai'] = 0;

                        DB::table('bai_dang')->insert($data_bai_dang);

                        Session::put('status', 'Tạo bài đăng thành công! Bài đăng đang chờ hệ thống xét duyệt!');
                        return redirect('/post');
                    }
                }
            }
        } else {
            Session::put('status', 'Chưa hoàn tất cập nhật thông tin cửa hàng!');
            return redirect('/profile/' . $id);
        }
    }


    //liệt kê danh sách khách hàng, chức năng của người bán
    public function list_customer($user_id)
    {

        if (Auth::check() && (Auth::user()->id == $user_id)) {
            $list_customer = DB::table('tbl_order')
                ->join('users', 'users.id', '=', 'tbl_order.customer_id')
                ->where('tbl_order.id_nguoi_ban', $user_id)
                ->select('users.*', 'tbl_order.*')
                ->distinct()
                ->get();

            // Xây dựng một danh sách các id duy nhất
            $unique_user_ids = [];
            $filtered_list_customer = [];

            foreach ($list_customer as $customer) {
                if (!in_array($customer->id, $unique_user_ids)) {
                    $unique_user_ids[] = $customer->id;
                    $filtered_list_customer[] = $customer;
                }
            }

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 4; // Set the number of items per page
            $currentPageItems = collect($filtered_list_customer)->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $paginatedFilteredCustomers = new LengthAwarePaginator(
                $currentPageItems,
                count($filtered_list_customer),
                $perPage,
                $currentPage,
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
            return view('pages.list_customer')->with('filtered_list_customer', $paginatedFilteredCustomers);
        } else {
            return redirect('/');
        }
    }

    //liệt kê ds đơn hàng, dành cho người bán
    public function list_order($user_id)
    {

        if (Auth::check() && (Auth::user()->id == $user_id)) {
            $order = DB::table('tbl_order')
                ->where('id_nguoi_ban', $user_id)
                ->orderBy('created_at', 'desc')
                ->paginate(4);
            // ->get();

            // ->with(compact('filtered_list_customer'))
            return view('pages.list_order')->with(compact('order'));
        } else {
            return redirect('/');
        }
    }


    //duyệt đơn hàng, phía người bán
    public function approve_orders($order_id)
    {


        $id_nguoi_ban = DB::table('tbl_order')
            ->where('order_id', $order_id)
            ->orderBy('created_at', 'desc')
            ->value('id_nguoi_ban');

        if (Auth::check() && (Auth::user()->id == $id_nguoi_ban)) {
            $manage_details_order = DB::table('tbl_order_details')
                ->select('tbl_order_details.*', 'tbl_product.*', 'users.*', 'tbl_order.*')
                ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_details.product_id')
                ->join('tbl_order', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
                ->join('users', 'users.id', '=', 'tbl_product.id_nguoi_ban')
                ->where('tbl_order_details.order_id', $order_id)
                ->get();

            $id_nguoi_mua = DB::table('tbl_order')
                ->where('order_id', $order_id)
                ->value('customer_id');

            $info_nguoi_mua = DB::table('users')
                ->where('users.id', $id_nguoi_mua)
                ->get();

            $rating = DB::table('tbl_rating_user')->where('order_id', $order_id)->value('rating');
            $review = DB::table('tbl_rating_user')->where('order_id', $order_id)->value('review');

            // ->with(compact('filtered_list_customer'))
            return view('pages.approve_order')->with(compact('rating', 'review', 'manage_details_order', 'info_nguoi_mua'));
        } else {
            return redirect('/');
        }
    }

    //cập nhật trạng thái đơn hàng, phía người bán
    public function update_order_status(Request $request)
    {

        $data = $request->all();

        // $id_nguoi_ban = DB::table('tbl_order')->where('tbl_order.order_id', $data['order_id'])->value('id_nguoi_ban');
        // if (Auth::check() && (Auth::user()->id == $id_nguoi_ban)) {

        $order1 = ModelsOrder::find($data['order_id']);
        $order_status1 = $order1->order_status;

        $order = ModelsOrder::find($data['order_id']);

        $order->order_status = $data['order_status'];
        $order->save();

        if ($order->order_status  ==  2) {          // order was treated
            $total_order      = 0;
            $quantity         = 0;
            $sales            = 0;
            $profit           = 0;
            //	    $now                =    Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity - $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        } elseif ($order->order_status  !=  2 && $order->order_status  !=  1 && ($order_status1 == 2)) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product            =    ModelsProduct::find($product_id);
                $product_quantity   =    $product->product_qty;
                $product_sold       =    $product->product_sold;
                $product_price      =    $product->product_price;
                foreach ($data['qty'] as $key2 => $qty) {
                    if ($key == $key2) {      // key & key2  sort by 1 ,2 ,3 ...
                        $pro_remain                   =    $product_quantity + $qty;
                        $product->product_qty         =    $pro_remain;
                        $product->product_sold        =    $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
        // } else {
        //     return redirect('/');
        // }
    }


    //danh sách bài viết, phía người bán
    public function list_post($user_id)
    {

        if (Auth::check() && (Auth::user()->id == $user_id)) {
            $all_post = DB::table('bai_dang')
                ->join('tbl_product', 'tbl_product.product_id', '=', 'bai_dang.id_san_pham')
                ->join('users', 'users.id', '=', 'bai_dang.id_nguoi_ban')
                ->where('bai_dang.id_nguoi_ban', $user_id)
                ->orderBy('bai_dang.ngay_dang', 'desc')
                ->paginate(4);

            // ->get();

            // return view('admin.all_post')->with('all_post', $all_post);

            return view('pages.list_post', compact('all_post'));
        } else {
            return redirect('/');
        }
    }

    //xóa bài viết, phía người bán
    public function delete_post_user($post_id)
    {
        $id_nguoi_ban = DB::table('bai_dang')
            ->where('id_nguoi_ban', Auth::user()->id)
            ->value('id_nguoi_ban');

        if (Auth::check() && (Auth::user()->id == $id_nguoi_ban)) {
            // DB::table('bai_dang')->where('id_bai_dang', $post_id)->delete();

            $post = DB::table('bai_dang')->where('id_bai_dang', $post_id)->first();
            if ($post) {
                $id_san_pham = $post->id_san_pham;
                DB::table('tbl_product')->where('product_id', $id_san_pham)->delete();
                DB::table('bai_dang')->where('id_bai_dang', $post_id)->delete();
            }


            Session::put('status', 'Xóa bài đăng thành công!');
            return redirect('/list-post/' . Auth::user()->id);
        } else {
            return redirect('/');
        }
    }

    //xem chi tiết bài đăng, phía người bán
    public function view_post_user($post_id)
    {
        $id_nguoi_ban = DB::table('bai_dang')
            ->where('id_nguoi_ban', Auth::user()->id)
            ->where('id_bai_dang', $post_id)
            ->value('id_nguoi_ban');

        if (Auth::check() && (Auth::user()->id == $id_nguoi_ban)) {

            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();

            $bai_dang = DB::table('bai_dang')
                ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                ->join('users', 'bai_dang.id_nguoi_ban', '=', 'users.id')
                ->select('bai_dang.*', 'users.*', 'tbl_product.*')
                ->where('bai_dang.id_bai_dang', $post_id)
                ->get(); // Sử dụng first() để lấy một bản ghi duy nhất

            return view('pages.edit_post')->with('bai_dang', $bai_dang)->with('category', $cate_product);
        } else {
            return redirect('/');
        }
    }


    // update_post_user
    //cập nhật bài đăng, phía người bán
    public function update_post_user(Request $request, $post_id)
    {

        $id_nguoi_ban = DB::table('bai_dang')
            ->where('bai_dang.id_nguoi_ban', Auth::user()->id)
            ->where('bai_dang.id_bai_dang', $post_id)
            ->value('bai_dang.id_nguoi_ban');

        if (Auth::check() && (Auth::user()->id == $id_nguoi_ban)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $get_image = $request->file('product_image');

            $data = array();
            $data['product_name'] = $request->input('product_name');
            $data['category_id'] = $request->input('category_id');
            $data['product_price'] = $request->input('product_price');
            $data['product_deadline'] = $request->input('product_deadline');
            $data['product_qty'] = $request->input('product_qty');
            $data['product_sold'] = 0;
            $data['product_content'] = null;
            $data['product_status'] = 1;
            $data['product_desc'] = $request->input('product_desc');
            // $data['id_nguoi_ban'] = $id_nguoi_ban;
            $data['don_vi_sp'] = $request->input('weight_unit');
            $data['created_at'] = date('Y-m-d H:i:s');

            $image = '';

            if ($request->file('product_image') == null) {
                $image = DB::table('tbl_product')
                    ->join('bai_dang', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                    ->where('bai_dang.id_bai_dang', $post_id)
                    ->value('product_image');
            }

            if (empty($data['product_name']) || empty($data['category_id']) || empty($data['product_price']) || empty($data['product_deadline']) || empty($data['product_qty']) || empty($data['product_desc'])) {
                Session::put('status', 'Vui lòng nhập đầy đủ thông tin bài đăng!');
                return redirect('/view-post-user/' . $post_id);
            } else {
                if ($get_image) {
                    $get_name_image = $get_image->getClientOriginalName();
                    $new_image = current(explode('.', $get_name_image));
                    $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move(public_path('uploads/post/product'), $new_image); // sử dụng public_path() thay vì 'public/'
                    $data['product_image'] = $new_image;

                    $id_san_pham = DB::table('tbl_product')
                        ->join('bai_dang', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                        ->where('bai_dang.id_bai_dang', $post_id)
                        ->update($data);

                    $data_bai_dang = array();
                    // $data_bai_dang['id_san_pham'] = $id_san_pham;
                    $data_bai_dang['ngay_dang'] = date('Y-m-d H:i:s');
                    $data_bai_dang['het_han'] = $request->input('product_deadline');
                    // $data_bai_dang['id_nguoi_ban'] = $id_nguoi_ban;
                    $data_bai_dang['trang_thai'] = 0;

                    DB::table('bai_dang')
                        ->where('bai_dang.id_bai_dang', $post_id)
                        ->update($data_bai_dang);

                    Session::put('status', 'Cập nhật thành công! Bài đăng đang chờ hệ thống xét duyệt!');
                    return redirect('/list-post/' . Auth::user()->id);
                } else {
                    $data['product_image'] = $image;

                    $id_san_pham = DB::table('tbl_product')
                        ->join('bai_dang', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                        ->where('bai_dang.id_bai_dang', $post_id)
                        ->update($data);

                    $data_bai_dang = array();
                    // $data_bai_dang['id_san_pham'] = $id_san_pham;
                    $data_bai_dang['ngay_dang'] = date('Y-m-d H:i:s');
                    $data_bai_dang['het_han'] = $request->input('product_deadline');
                    // $data_bai_dang['id_nguoi_ban'] = $id_nguoi_ban;
                    $data_bai_dang['trang_thai'] = 0;

                    DB::table('bai_dang')
                        ->where('bai_dang.id_bai_dang', $post_id)
                        ->update($data_bai_dang);

                    Session::put('status', 'Cập nhật bài đăng thành công! Bài đăng đang chờ hệ thống xét duyệt!');
                    return redirect('/list-post/' . Auth::user()->id);
                }
            }
        } else {
            return redirect('/list-post/' . Auth::user()->id);
        }
    }
}
