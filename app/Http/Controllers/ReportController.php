<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
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

}
