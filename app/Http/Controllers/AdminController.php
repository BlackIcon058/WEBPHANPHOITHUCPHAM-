<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

use App\Http\Requests;
use App\Models\Order;
use Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
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

    // hiển thị giao diện trang login quản trị
    public function index()
    {
        $admin_id = Session::get('admin_id');
        // $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return view('admin.custom_auth.login_auth');
        }
    }

    // hiển thị các thông tin trong trang tổng quan quản trị
    //lấy tổng số bài viết, khách hàng, .. 
    public function show_dashboard()
    {
        $this->AuthLogin();
        // Lấy ngày đầu và cuối của tháng hiện tại
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $totalCommission = DB::table('tbl_order')
            ->where('order_status', 2)
            ->sum(DB::raw('order_total * 0.1'));

        $totalPosts = DB::table('bai_dang')
            ->count();

        $totalUnapprovedArticles = DB::table('bai_dang')
            ->where('trang_thai', 0)
            ->count();

        $totalUsers = DB::table('users')
            ->count();

        $totalOrder = DB::table('tbl_order')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count('order_id');

        $totalOrderSucess = DB::table('tbl_order')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->where('order_status', 2)
            ->count('order_id');

        $totalNoProcess = DB::table('tbl_order')
            ->where('order_status', 1)
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count('order_id');

        return view(
            'admin.dashboard',
            compact('totalOrderSucess', 'totalUsers', 'totalOrder', 'totalNoProcess', 'totalCommission', 'totalPosts', 'totalUnapprovedArticles')
        );
    }

    // hiển thị trang tổng quan quản trị
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_amin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($result) {
            $role = DB::table('tbl_amin')->where('admin_email', $admin_email)->first();

            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);

            $adminId = Session::get('admin_id');

            // Truy vấn bảng admin_roles để lấy ra roles_id_roles
            $adminRole = DB::table('admin_roles')
                ->where('admin_admin_id', $adminId)
                ->value('roles_id_roles');
            Session::put('admin_role', $adminRole);

            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Email hoac mat khau sai! Vui long nhap lai!');
            return Redirect::to('/admin');
        }
    }

    // đăng xuất quản trị
    public function logout()
    {
        $this->AuthLogin();
        Session::forget('admin_name');
        Session::forget('admin_id');
        Session::forget('admin_roles');

        // return Redirect::to('/admin');

        return redirect('/login-auth')->with('message', 'Đăng xuất thành công!');
    }

    // lọc biểu đồ theo ngày
    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = DB::table('tbl_order')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_order.created_at as order_date', 'tbl_order_details.*')
            ->whereBetween('tbl_order.created_at', [$from_date, $to_date])
            ->distinct('tbl_order.order_id')
            ->orderBy('tbl_order.created_at', 'ASC')
            ->get();

        $chart_data = array();

        // Mảng kết hợp để lưu trữ tổng 'sales', 'profit', và 'quantity' cho mỗi 'order_id'
        $orderTotals = [];

        foreach ($get as $key => $val) {
            // Nếu 'order_id' chưa tồn tại trong mảng, tạo một mục mới và khởi tạo giá trị ban đầu
            if (!isset($orderTotals[$val->order_id])) {
                $orderTotals[$val->order_id] = [
                    'created_at' => $val->order_date,
                    'status' => $val->order_status,
                    'sales' => 0,
                    'profit' => 0,
                    'quantity' => 0,
                ];
            }

            // Cộng dồn 'sales', 'profit', và 'quantity' cho mỗi 'order_id'
            $orderTotals[$val->order_id]['sales'] += $val->product_sales_quantity * $val->product_price;
            $orderTotals[$val->order_id]['profit'] += ($val->product_price * $val->product_sales_quantity) * 0.05;
            $orderTotals[$val->order_id]['quantity'] += $val->product_sales_quantity;
        }

        // Duyệt qua mảng kết hợp và thêm vào $chart_data
        foreach ($orderTotals as $orderId => $totals) {
            $period = \Carbon\Carbon::parse($totals['created_at'])->toDateString(); // Chuyển đổi sang định dạng ngày tháng (Y-m-d)

            $status = -5;
            if ($totals['status'] == 1) {
                $status = -1;
            } elseif ($totals['status'] == 2) {
                $status = -2;
            } else {
                $status = -3;
            }

            $chart_data[] = [
                'period' => $period,
                'order' => $orderId,
                'order_id' => $orderId,
                'status' => $status,
                'sales' => $totals['sales'],
                'profit' => $totals['profit'],
                'quantity' => $totals['quantity']
            ];
        }

        echo $data = json_encode($chart_data);
        // dd($request->all());
    }


    // lấy dữ liệu hiển thị biểu đồ trong 30 ngày
    public function get30days()
    {
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $cuoithangnay = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();

        $get = DB::table('tbl_order')
            ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
            ->select('tbl_order.*', 'tbl_order.created_at as order_date', 'tbl_order_details.*')
            ->whereBetween('tbl_order.created_at', [$dauthangnay, $cuoithangnay])
            ->distinct('tbl_order.order_id')
            ->orderBy('tbl_order.created_at', 'ASC')
            ->get();

        $chart_data = array();

        // Mảng kết hợp để lưu trữ tổng 'sales', 'profit', và 'quantity' cho mỗi 'order_id'
        $orderTotals = [];

        foreach ($get as $key => $val) {
            // Nếu 'order_id' chưa tồn tại trong mảng, tạo một mục mới và khởi tạo giá trị ban đầu
            if (!isset($orderTotals[$val->order_id])) {
                $orderTotals[$val->order_id] = [
                    'created_at' => $val->order_date,
                    'status' => $val->order_status,
                    'sales' => 0,
                    'profit' => 0,
                    'quantity' => 0,
                ];
            }

            // Cộng dồn 'sales', 'profit', và 'quantity' cho mỗi 'order_id'
            $orderTotals[$val->order_id]['sales'] += $val->product_sales_quantity * $val->product_price;
            $orderTotals[$val->order_id]['profit'] += ($val->product_price * $val->product_sales_quantity) * 0.05;
            $orderTotals[$val->order_id]['quantity'] += $val->product_sales_quantity;
        }

        // Duyệt qua mảng kết hợp và thêm vào $chart_data
        foreach ($orderTotals as $orderId => $totals) {
            $period = \Carbon\Carbon::parse($totals['created_at'])->toDateString(); // Chuyển đổi sang định dạng ngày tháng (Y-m-d)

            $status = -5;
            if ($totals['status'] == 1) {
                $status = -1;
            } elseif ($totals['status'] == 2) {
                $status = -2;
            } else {
                $status = -3;
            }

            $chart_data[] = [
                'period' => $period,
                'order' => $orderId,
                'order_id' => $orderId,
                'status' => $status,
                'sales' => $totals['sales'],
                'profit' => $totals['profit'],
                'quantity' => $totals['quantity']
            ];
        }
        
        echo $data = json_encode($chart_data);
    }


}
