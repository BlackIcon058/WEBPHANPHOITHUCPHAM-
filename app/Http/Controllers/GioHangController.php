<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Product;
use App\Models\GioHang;

use Illuminate\Support\Facades\Auth;
use Session;

class GioHangController extends Controller
{
    //hiển thị trang giỏ hàng
    public function index()
    {
        if (Auth::check()) {
            return view('pages.cart');
        } else {
            return redirect('/login');
        }
    }

    //thêm sản phẩm vào giỏ hàng
    public function add(Product $product, Request $req)
    {
        if (Auth::check()) {

            $soluong = $req->soluong ? floor($req->soluong) : 1;
            $id_nguoidung = Auth::user()->id;

            $isSellerProduct = DB::table('tbl_product')
                ->where('id_nguoi_ban', $id_nguoidung)
                ->where('product_id', $product->product_id)
                ->first();


            if ($isSellerProduct) {
                Session::put('status', 'Không thể thao tác với sản phẩm của cửa hàng!');
                return redirect('/');
            } else {
                $cartExist = GioHang::where([
                    'id_nguoidung' => $id_nguoidung,
                    'id_sanpham' => $product->product_id
                ])->first();

                if ($cartExist) {
                    GioHang::where([
                        'id_nguoidung' => $id_nguoidung,
                        'id_sanpham' => $product->product_id
                    ])->increment('soluong', $soluong);

                    // $cartExist->update([
                    //     'soluong' => $cartExist->soluong + $soluong
                    // ]);

                    Session::put('status', 'Cập nhật số lượng sản phẩm vào giỏ hàng thành công!');
                    return redirect()->route('giohang.index');
                } else {
                    $data = [
                        'id_nguoidung' => Auth::user()->id,
                        'id_sanpham' => $product->product_id,
                        'gia' => $product->product_price,
                        'soluong' => $soluong
                    ];
                    if (GioHang::create($data)) {
                        Session::put('status', 'Thêm sản phẩm vào giỏ hàng thành công!');
                        return redirect()->route('giohang.index');
                    }
                }
                Session::put('status', 'Đã xảy ra lỗi, vui lòng thử lại!');
                return redirect()->back();
                dd($data);
            }
        } else {
            return redirect('/');
        }
    }

    //cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Product $product, Request $req)
    {
        $soluong = $req->soluong ? floor($req->soluong) : 1; // Lấy số lượng từ form
        // $soluong = $req->input('quantity-' . $product->product_id) ? floor($req->input('quantity-' . $product->product_id)) : 1;

        // dd($product->product_id);
        // dd($soluong);

        $id_nguoidung = Auth::user()->id;

        $cartExist = GioHang::where([
            'id_nguoidung' => $id_nguoidung,
            'id_sanpham' => $product->product_id
        ])->first();

        if ($cartExist) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            GioHang::where([
                'id_nguoidung' => $id_nguoidung,
                'id_sanpham' => $product->product_id
            ])->update([
                'soluong' => $soluong
            ]);
            Session::put('status', 'Cập nhật số lượng sản phẩm vào giỏ hàng thành công!');
            return redirect()->route('giohang.index');
        }

        // Nếu sản phẩm không tồn tại trong giỏ hàng, trả về lỗi
        Session::put('status', 'Đã xảy ra lỗi, vui lòng thử lại!');
        return redirect()->back();
    }

    //xóa 1 sản phẩm trong giỏ hàng
    public function delete($id_sanpham)
    {
        $id_nguoidung = Auth::user()->id;
        // $product->delete();

        GioHang::where('id_sanpham', $id_sanpham)
            ->where('id_nguoidung', $id_nguoidung)
            ->delete();

        Session::put('status', 'Đã xóa sản phẩm trong giỏ hàng!');
        return redirect()->back();
    }

    //xóa toàn bộ giỏ hàng
    public function clear()
    {
        $id_nguoidung = Auth::user()->id;
        GioHang::where([
            'id_nguoidung' => $id_nguoidung
        ])->delete();
        Session::put('status', 'Đã xóa tất cả sản phẩm trong giỏ hàng!');
        return redirect()->back();
    }
}
