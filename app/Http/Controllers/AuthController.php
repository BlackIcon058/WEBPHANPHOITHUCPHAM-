<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Admin as ModelsAdmin;
use App\Models\Roles as ModelsRoles;

use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class AuthController extends Controller
{
    //xác thực đăng nhập
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

    // hiển thị trang đăng ký quản trị
    public function register_auth()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return view('admin.custom_auth.register');
        }
    }

    // đăng nhập quản trị
    // public function login(Request $request)
    // {

    //     if (empty($request->admin_email) || empty($request->admin_password)) {
    //         return redirect()->back()->with('message', 'Vui lòng nhập cả email và mật khẩu');
    //     }

    //     // Kiểm tra xem email có đúng định dạng không
    //     if (!filter_var($request->admin_email, FILTER_VALIDATE_EMAIL)) {
    //         return redirect()->back()->with('message', 'Email không hợp lệ');
    //     }

    //     $email = $request->input('admin_email');
    //     $password = md5($request->input('admin_password'));

    //     // dd($email);

    //     $result = DB::table('tbl_amin')
    //         ->where('admin_email', $email)
    //         ->where('admin_password', $password)
    //         ->first();

    //     // Kiểm tra kết quả của truy vấn
    //     if (!$result) {
    //         // Nếu không tìm thấy email trong cơ sở dữ liệu
    //         return redirect()->back()->with('message', 'Email hoặc mật khẩu không đúng!');
    //     } else {
    //         // Nếu thông tin đăng nhập hợp lệ, chuyển hướng người dùng đến trang dashboard
    //         return redirect('/dashboard');
    //     }
    // }

    // đăng ký quản trị
    // public function register(Request $request)
    // {
    //     $this->validation($request);
    //     $data = $request->all();
    //     $admin = new ModelsAdmin();
    //     $admin->admin_name = $data['admin_name'];
    //     $admin->admin_phone = $data['admin_phone'];
    //     $admin->admin_email = $data['admin_email'];
    //     $admin->admin_password = md5($data['admin_password']);

    //     $existingUser = DB::table('tbl_amin')
    //         ->where('admin_email', $data['admin_email'])
    //         ->first();

    //     if ($existingUser) {
    //         return redirect('/register-auth')
    //             ->with('message', 'Tài khoản đã đăng ký. Vui lòng kiểm tra lại!');
    //     } else {
    //         $admin->save();
    //         $admin->roles()->attach(ModelsRoles::where('name', 'user')->first());
    //         return redirect('/register-auth')->with('message', 'Đăng ký thành công!');
    //     }
    // }

    //đăng ký thêm thành viên quản trị mới
    public function store_users_in_register_page(Request $request)
    {
        $this->AuthLogin();
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
            return redirect('/dashboard')
                ->with('message', 'Tài khoản hoặc số điện thoại đã được sử dụng. Vui lòng kiểm tra lại!');
        } else {
            $admin->save();
            $admin->roles()->attach(ModelsRoles::where('name', 'user')->first());
            return redirect('/dashboard')->with('message', 'Đăng ký thành công!');
        }

        return redirect('/dashboard');
    }

    // phương thức xác thực khi tạo tài khoản, được tạo tự động trong laravel
    public function validation($request)
    {
        return $this->validate($request, [
            'admin_name' => 'required|max:255',
            'admin_phone' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
    }

    // đăng xuất quản trị
    // public function logout_auth()
    // {
    //     Auth::logout();
    //     return redirect('/login-auth')->with('message', 'Đăng xuất anthentication thành công!');
    // }

    // hiển thị giao diện đăng nhập quản trị
    public function login_auth()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return view('admin.custom_auth.login_auth');
        }
    }
}
