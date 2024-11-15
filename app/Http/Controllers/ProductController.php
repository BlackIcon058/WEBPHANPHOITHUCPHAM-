<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ProductController extends Controller
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

    // hiển thị giao diện thêm sản phẩm, admin
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product);
    }

    // liệt kê tất cả sản phẩm, admin
    public function all_product()
    {
        $this->AuthLogin();

        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('/admin_layout')->with('admin.all_product', $manager_product);
    }

    // thêm sản phẩm, admin
    public function save_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        // $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');
        $data['product_sold'] = 0;

        $get_image = $request->file('product_image'); // use $request->file() instead of file()

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return Redirect::to('add-product');
            
        }
        $data['product_image'] = '';        
        DB::table('tbl_product')->insert($data);
        Session::flash('message', 'Thêm sản phẩm thành công!'); // use flash() instead of put()
        return redirect()->to('add-product');
    }


    // tắt kích hoạt sản phẩm
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product');
    }


    // bật kích hoạt sản phẩm
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Không kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product');
    }

    // hiển thị giao diện sửa sản phẩm
    public function edit_product($product_id)
    {
        $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();


        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
 
    // cập nhật sản phẩm
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        // $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');

        $get_image = $request->file('product_image');

        $image = '';

        if($request->file('product_image') == null){
            $image = DB::table('tbl_product')->where('product_id', $product_id)->value('product_image');
            // dd($image);
        }

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return Redirect::to('all-product');
        }

        $data['product_image'] = $image;

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product');
    }

    // xóa sản phẩm
    public function delete_product($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('all-product');
    }


    // xem chi tiết sản phẩm
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)->get();

        return view('pages.detail')->with('category', $cate_product)->with('product_details', $details_product);
    }

    // tìm kiếm sản phẩm
    public function tim_kiem_product(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_category_product.category_name')
                ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
            return view('admin.search_product')->with('search_product', $search_product)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-product');
        }
    }
}
