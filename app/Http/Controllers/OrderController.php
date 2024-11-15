<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

use App\Models\Order as ModelsOrder;
use App\Models\OrderDetails as ModelsOrderDetails;
use App\Models\Customer as ModelsCustomer;
use App\Models\Product as ModelsProduct;


use Barryvdh\DomPDF\Facade\Pdf;
use Auth;

class OrderController extends Controller
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
    

    // hiển thị danh sách đơn hàng, admin
    public function manage_order()
    {
        $this->AuthLogin();

        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }

        
        $order = ModelsOrder::orderby('created_at', 'desc')->paginate(5);
        // ->get();
        
        return view('admin.manage_order')->with(compact('order'));
    }

    // xem chi tiết đơn hàng, admin
    public function view_order($order_id)
    {
        $this->AuthLogin();

        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }

        $order_details = ModelsOrderDetails::where('order_id', $order_id)->get();
        $order = ModelsOrder::where('order_id', $order_id)->get();

        $order1 = ModelsOrder::where('order_id', $order_id)->first();
        $order_status = $order1->order_status;

        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
        }

        $info_nguoi_ban = DB::table('users')
            ->join('tbl_order', 'users.id', '=', 'tbl_order.id_nguoi_ban')
            ->where('tbl_order.order_id', '=', $order_id)
            ->get();

        $info_nguoi_mua = DB::table('users')
            ->join('tbl_order', 'users.id', '=', 'tbl_order.customer_id')
            ->where('tbl_order.order_id', '=', $order_id)
            ->get();


        $order_details = ModelsOrderDetails::with('product')->where('order_id', $order_id)->get();

        return view('admin.view_order')->with(compact('order_details', 'order_details', 'info_nguoi_ban', 'info_nguoi_mua'))->with('order_status', $order_status);
    }


    // hiển thị giao diện in đơn hàng
    // public function print_order($checkout_code)
    // {
    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML($this->print_order_convert($checkout_code));
    //     return $pdf->stream();
    // }

    // cập nhật số lượng sản phẩm trong kho khi thay đổi trạng thái đơn hàng từ chưa xử lí thành đã xử lí - đã giao
    public function update_order_qty(Request $request)
    {

        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $data = $request->all();
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
    }


    // cập nhật số lượng sản phẩm trong chi tiết đơn hàng, admin
    public function update_qty(Request $request)
    {
        $data = $request->all();
        $order_details = ModelsOrderDetails::where('product_id', $data['order_product_id'])
            ->where('order_code', $data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }

    // tìm kiếm đơn hàng, admin
    public function tim_kiem_manageorder(Request $request)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }

        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_order = DB::table('tbl_order')->where('order_id', 'like', '%' . $keywords . '%')
            ->paginate(4);

            // ->get();
            // $customer = Customer::whereIn('customer_id', $customer_ids)->paginate(5);

            return view('admin.search_order')->with('search_order', $search_order)->with('keywords', $keywords);
        } else {
            return Redirect::to('manage-order');
        }
    }
}
