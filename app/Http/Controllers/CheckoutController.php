<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Redirect;
// use Cart;
use App\Models\GioHang;

session_start();

use PDF;
// use Auth;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    // xác thực đăng nhập
    // public function AuthLogin()
    // {
    //     $admin_id = Auth::id();
    //     if ($admin_id) {
    //         return Redirect::to('dashboard');
    //     } else {
    //         return Redirect::to('admin')->send();
    //     }
    // }

    // hiển thị trang thanh toán
    public function checkout()
    {
        // $content = Cart::content();

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $cartIsEmpty = !GioHang::where('id_nguoidung', $userId)->exists();
            if ($cartIsEmpty) {
                return Redirect('/');
            }

            $shop_detail = DB::table('gio_hang')
                ->join('tbl_product', 'gio_hang.id_sanpham', '=', 'tbl_product.product_id')
                ->join('users', 'users.id', '=', 'tbl_product.id_nguoi_ban')
                ->where('users.is_seller', '1')
                ->where('gio_hang.id_nguoidung', $userId)
                ->distinct('tbl_product.id_nguoi_ban')
                ->get();

            return view('pages.checkout', compact('shop_detail'));
        } else {
            return redirect('/');
        }
    }

    // lưu thông tin ở trang nhập thông tin thanh toán
    public function save_checkout_customer(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $cart = DB::table('gio_hang')
            ->join('tbl_product', 'gio_hang.id_sanpham', '=', 'tbl_product.product_id')
            ->join('users', 'users.id', '=', 'tbl_product.id_nguoi_ban')
            ->where('users.is_seller', '1')
            ->where('gio_hang.id_nguoidung', Auth::user()->id)
            ->get();

        $order_totals = []; // Mảng để lưu trữ order_total cho mỗi người bán
        $order_id = null; // Khởi tạo order_id
        $prev_seller_id = null; // Khởi tạo biến để lưu trữ id_nguoi_ban của mục trước đó

        foreach ($cart as $item) {
            // Kiểm tra xem id_nguoi_ban có khớp với mục trước đó không
            if ($item->id_nguoi_ban != $prev_seller_id) {
                // Nếu không khớp, reset order_total
                $order_total = 0;
            }

            // Tính toán order_total cho người bán hiện tại
            $order_total += $item->product_price * $item->soluong;

            // Lưu lại order_total cho người bán hiện tại
            $order_totals[$item->id_nguoi_ban] = $order_total;

            // Kiểm tra xem id_nguoi_ban có khớp với mục trước đó không
            if ($item->id_nguoi_ban != $prev_seller_id) {
                // Nếu không khớp, tạo mới order_id
                $order_data = [
                    'customer_id' => Auth::user()->id,
                    'id_nguoi_ban' => $item->id_nguoi_ban,
                    'address' => $item->address,
                    'payment_method' => $request->payment_option,
                    'order_total' => floatval(str_replace(',', '', $order_totals[$item->id_nguoi_ban])), // Sử dụng order_total của người bán hiện tại
                    'order_status' => 1,
                    'created_at' => now()
                ];

                $order_id = DB::table('tbl_order')->insertGetId($order_data);
                $prev_seller_id = $item->id_nguoi_ban; // Cập nhật id_nguoi_ban của mục trước đó
            }

            // Thêm chi tiết đơn hàng
            $order_d_data = [
                'order_id' => $order_id,
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'don_vi_sp' => $item->don_vi_sp,
                'product_price' => $item->product_price,
                'product_sales_quantity' => $item->soluong,
            ];

            DB::table('tbl_order_details')->insert($order_d_data);

            // Cập nhật lại order_total
            $order_details_total = DB::table('tbl_order_details')
                ->where('order_id', $order_id)
                ->sum(DB::raw('product_price * product_sales_quantity'));

            DB::table('tbl_order')
                ->where('order_id', $order_id)
                ->update(['order_total' => floatval(str_replace(',', '', $order_details_total))]);
        }



        // nếu các đơn hàng đã được tạo thành công!
        if ($order_id) {
            $id_nguoidung = Auth::user()->id;
            GioHang::where([
                'id_nguoidung' => $id_nguoidung
            ])->delete();

            return Redirect('profile/' . Auth::user()->id)->with('status', 'Đặt hàng thành công!');

            // return view('pages.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        }

        return Redirect('/checkout');
    }

    // đăng xuất khách hàng
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/');
    }

    // đăng nhập khách hàng
    // public function login_customer_login(Request $request)
    // {
    //     $email = $request->email_account;

    //     $password = md5($request->password_account);

    //     if ($email == null) {
    //         return redirect('/login-customer')
    //             ->with('status', 'Vui lòng nhập email để đăng nhập!');
    //     }

    //     if ($password == null) {
    //         return redirect('/login-customer')
    //             ->with('status', 'Vui lòng nhập mật khẩu để đăng nhập!');
    //     }

    //     $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();
    //     if ($result) {
    //         Session::put('customer_id', $result->customer_id);
    //         Session::put('customer_name', $result->customer_name);
    //         Session::put('customer_role_sell', $result->nguoi_ban);

    //         return Redirect::to('/')
    //             ->with('status', 'Đăng nhập thành công!');
    //     } else {

    //         return Redirect::to('/login-customer')
    //             ->with('status', 'Tài khoản hoặc mật khẩu không đúng!');;
    //     }
    // }
}
