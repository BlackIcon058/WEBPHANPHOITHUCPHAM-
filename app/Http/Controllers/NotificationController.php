<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Carbon\Carbon;


class NotificationController extends Controller
{
    //xác thực đăng nhập
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

    // hiển thị giao diện thêm thông báo
    public function add_notification()
    {
        $this->AuthLogin();
        return view('/admin.add_notification');
    }

    // liệt kê thông báo
    public function all_notification()
    {
        $this->AuthLogin();
        $all_notification = DB::table('thong_bao')->paginate(4);

        // ->get();
        $manager_notification = view('admin.all_notification')->with('all_notification', $all_notification);
        return view('/admin_layout')->with('admin.all_notification', $manager_notification);
    }

    // thêm thông báo
    public function save_notification(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['tieu_de'] = $request->notification_title;
        $data['noi_dung'] = $request->notification_desc;
        $data['ngay_dang'] = Carbon::now('Asia/Ho_Chi_Minh');

        $data['trang_thai_thong_bao'] = $request->notification_status;
        DB::table('thong_bao')->insert($data);
        Session::put('message', 'Thêm thông báo thành công!');
        return Redirect::to('add-notification');
    }

    // tắt kích hoạt thông báo
    public function unactive_notification($notification_id)
    {
        $this->AuthLogin();
        DB::table('thong_bao')->where('id_thong_bao', $notification_id)->update(['trang_thai_thong_bao' => 1]);
        Session::put('message', 'Cho phép hiển thị thông báo!');
        return Redirect::to('all-notification');
    }

    // bật kích hoạt thông báo
    public function active_notification($notification_id)
    {
        $this->AuthLogin();

        DB::table('thong_bao')->where('id_thong_bao', $notification_id)->update(['trang_thai_thong_bao' => 0]);
        Session::put('message', 'Đã ẩn hiển thị thông báo!');
        return Redirect::to('all-notification');
    }

    // giao diện chỉnh sửa thông báo
    public function edit_notification($notification_id)
    {
        $this->AuthLogin();
        $edit_notification = DB::table('thong_bao')->where('id_thong_bao', $notification_id)->get();
        $manager_notification = view('admin.edit_notification')->with('edit_notification', $edit_notification);
        return view('admin_layout')->with('admin.edit_notification', $manager_notification);
    }
 
    // cập nhật thông báo
    public function update_notification(Request $request, $notification_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['tieu_de'] = $request->notification_title;
        $data['noi_dung'] = $request->notification_desc;
        DB::table('thong_bao')->where('id_thong_bao', $notification_id)->update($data);
        Session::put('message', 'Cập nhật thông báo thành công!');
        return Redirect::to('all-notification');
    }
    // xóa thông báo
    public function delete_notification($notification_id)
    {
        $this->AuthLogin();

        DB::table('thong_bao')->where('id_thong_bao', $notification_id)->delete();
        Session::put('message', 'Xóa thông báo thành công!');
        return Redirect::to('all-notification');
    }
    // end function admin page

    // hiển thị thông báo bên trang bán hàng
    public function show_notification($category_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();

        $category_by_id = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_product.category_id', $category_id)->where('tbl_product.product_status', '1')->get();

        $category_name = DB::table('tbl_category_product')->where('category_id', $category_id)->value('category_name');

        return view('pages.product_by_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)
            ->with('category_name', $category_name);
    }

    // tìm kiếm thông báo bên quản trị 
    public function tim_kiem_notification(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_notification = DB::table('thong_bao')
                ->where('tieu_de', 'like', '%' . $keywords . '%')
                ->orWhere('id_thong_bao', 'like', '%' . $keywords . '%')
                ->paginate(4);

                // ->get();

            // $admin_ids = $search_admin->pluck('admin_id');
            // $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(5);

            return view('admin.search_notification')->with('search_notification', $search_notification)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-notification');
        }
    }
}
