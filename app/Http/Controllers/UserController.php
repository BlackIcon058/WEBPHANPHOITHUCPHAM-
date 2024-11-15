<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Roles;
use App\Models\Roles as ModelsRoles;
use App\Admin;
use App\Models\Admin as ModelsAdmin;
use Session;
use Auth;
use DB;

class UserController extends Controller
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
    
    // liệt kê thanh viên quản trị hệ thống
    public function index()
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $admin = ModelsAdmin::with('roles')->orderBy('admin_id', 'DESC')->paginate(5);
        // ->get();
        return view('admin.users.all_users')->with(compact('admin'));
    }

    // phân quyền quản trị
    public function assign_roles(Request $request)
    {
        // $data = $request->all();
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $admin_id = Session::get('admin_id');

        if ($admin_id == $request->admin_id) {
            return redirect()->back()->with('message', 'Không thể gán quyền cho user đang hoạt động hiện tại!');
        }
        $user = ModelsAdmin::where('admin_email', $request->admin_email)->first();
        $user->roles()->detach();
        if ($request->author_role) {
            $user->roles()->attach(ModelsRoles::where('name', 'author')->first());
        }
        if ($request->user_role) {
            $user->roles()->attach(ModelsRoles::where('name', 'user')->first());
        }
        if ($request->admin_role) {
            $user->roles()->attach(ModelsRoles::where('name', 'admin')->first());
        }
        // return redirect()->back()->with('message', 'Cấp quyền thành công!'); 
        return Redirect::to('users')->with('message', 'Cấp quyền thành công!');
    }

    // hiển thị trang thêm thành viên hệ thống
    public function add_users()
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        return view('admin.users.add_users');
    }

    // thêm thành viên hệ thống
    public function store_users(Request $request)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $data = $request->all();
        $admin = new ModelsAdmin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);

        $existingUser = DB::table('tbl_amin')
            ->where('admin_email', $data['admin_email'])
            ->orWhere('admin_phone', $data['admin_phone'])
            ->first();

        if ($existingUser) {
            return redirect('/add-users')
                ->with('message', 'Tài khoản hoặc số điện thoại đã được sử dụng. Vui lòng kiểm tra lại!');
        } else {
            $admin->save();
            $admin->roles()->attach(ModelsRoles::where('name', 'user')->first());
            return redirect('/users')->with('message', 'Thêm users thành công!');
        }

        return Redirect::to('users');
    }

    // Xóa thành viên hệ thống
    public function delete_user_roles($admin_id)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $admin = Session::get('admin_id');

        if ($admin == $admin_id) {
            // if (Auth::id() == $admin_id) {
            return redirect()->back()->with('message', 'Không thể xóa user đang hoạt động hiện tại!');
        }
        $admin = ModelsAdmin::find($admin_id);
        if ($admin) {
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Xóa user thành công!');
    }

    // tìm kiếm thành viên
    public function search(Request $request)
    {
        $this->AuthLogin();
        $admin_role = Session::get('admin_role');
        if ($admin_role != 1) {
            return redirect('dashboard');
        }
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_admin = DB::table('tbl_amin')->where('admin_name', 'like', '%' . $keywords . '%')
                ->orWhere('admin_email', 'like', '%' . $keywords . '%')
                ->orWhere('admin_phone', 'like', '%' . $keywords . '%')
                ->get();

            $admin_ids = $search_admin->pluck('admin_id');
            $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(4);
            // ->get();

            return view('admin.users.search_user')->with('search_admin', $search_admin)->with('keywords', $keywords)
                ->with(compact('admin'));
        } else {
            return Redirect::to('users');
        }
    }


}
