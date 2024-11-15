<?php

namespace App\Providers;

use App\Models\GioHang;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use DB;
use Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$giohang = GioHang::where('id_nguoidung', Auth::user()->id)->get();
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            // $giohang = GioHang::where('id_nguoidung', Auth::id())->get();
            $thongBao = DB::table('thong_bao')->where('trang_thai_thong_bao', '1')->get();

            //----------Gio hang
            $currentDate = Carbon::now();

            // Lấy tất cả các sản phẩm trong giỏ hàng của người dùng, cùng với thông tin hết hạn của sản phẩm
            $dsgiohang = GioHang::where('id_nguoidung', Auth::id())
                ->join('bai_dang', 'gio_hang.id_sanpham', '=', 'bai_dang.id_san_pham')
                ->where('gio_hang.id_nguoidung', Auth::id())
                // ->select('gio_hang.id', 'gio_hang.id_sanpham', 'bai_dang.het_han')
                ->get();

            // Lặp qua các sản phẩm trong giỏ hàng
            foreach ($dsgiohang as $item) {
                if ($item->het_han < $currentDate || $item->trang_thai == 0) {

                    $tenSanPham = $item->prod->product_name;
                    
                    // Xóa sản phẩm khỏi giỏ hàng nếu hết hạn
                    // DB::table('gio_hang')->where('id', $item->id)->delete();
                    DB::table('gio_hang')
                        ->where('id_nguoidung', Auth::id())
                        ->where('id_sanpham', $item->id_sanpham)
                        ->delete();

                    Session::put('status', 'Sản phẩm '.$tenSanPham.' đã bị xóa, do bài đăng đã hết hạn hoặc bài đăng đã bị ẩn!');
                }
            }

            // Lấy lại các sản phẩm hợp lệ trong giỏ hàng
            $giohang = GioHang::where('id_nguoidung', Auth::id())
                ->join('bai_dang', 'gio_hang.id_sanpham', '=', 'bai_dang.id_san_pham')
                ->where('gio_hang.id_nguoidung', Auth::id())
                ->where('bai_dang.het_han', '>', $currentDate)
                ->select('gio_hang.*')
                ->get();

            $status = Session::get('status');

            $view->with(compact('giohang', 'thongBao', 'status'));
        });
    }
}