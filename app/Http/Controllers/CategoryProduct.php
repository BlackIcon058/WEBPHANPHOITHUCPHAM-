<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CategoryProduct extends Controller
{
    //xác thực đăng nhập
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        // $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    
    // hiển thị giao diện thêm danh mục sản phẩm
    public function add_category_product(){
        $this->AuthLogin();
        return view('/admin.add_category_product');
    }

    // liệt kê danh mục sản phẩm
    public function all_category_product(){
        $this->AuthLogin();

        $all_category_product = DB::table('tbl_category_product')
        ->paginate(4);
        // ->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('/admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    // thêm danh mục sản phẩm
    public function save_category_product(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request-> category_product_name;
        $data['category_desc'] = $request-> category_product_desc;
        $data['category_status'] = $request-> category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product');
    }

    // tắt kích hoạt danh mục sản phẩm
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        Session::put('message', 'Kích hoạt thành công!');
        return Redirect::to('all-category-product'); 
    }

    // bật kích hoạt danh mục sản phẩm
    public function active_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'Không kích hoạt thành công!');
        return Redirect::to('all-category-product'); 
    }

    // giao diện chỉnh sửa danh mục sản phẩm
    public function edit_category_product($category_product_id){
        $this->AuthLogin();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    
    // cập nhật danh mục sản phẩm
    public function update_category_product(Request $request, $category_product_id){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật thành công!');
        return Redirect::to('all-category-product'); 
    }
    // xóa danh mục sản phẩm
    public function delete_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa thành công!');
        return Redirect::to('all-category-product'); 
    }
    // end function admin page

    // hiển thị sản phẩm theo danh mục sản phẩm bên trang bán hàng
    public function show_category_home(Request $request){

        $category_id = $request->category_id;
        $category_name = DB::table('tbl_category_product')->where('category_id', $category_id)->value('category_name');
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();

        $bai_dang = DB::table('bai_dang')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
            // ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
            ->where('tbl_product.category_id', '=', $category_id)
            ->where('tbl_category_product.category_status', '1')
            ->where('bai_dang.trang_thai', '=', 1)
            ->where('users.is_seller', '=', 1)
            ->whereRaw('NOW() < bai_dang.het_han')
            ->where('tbl_product.product_qty', '>', 0)
            ->orderBy('bai_dang.ngay_dang', 'desc')
            ->paginate(4);
            // ->get();

        $so_luong_bai_dang = $bai_dang->count();

        return view('pages.product_by_category', compact('category_id','category_name','bai_dang', 'cate_product', 'so_luong_bai_dang'));
    }

    // tìm kiếm danh mục sản phẩm bên quản trị 
    public function tim_kiem_category(Request $request)
    {

        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_category = DB::table('tbl_category_product')->where('category_name', 'like', '%' . $keywords . '%')
            ->paginate(4);    
            // ->get();
            // $admin_ids = $search_admin->pluck('admin_id');
            // $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(5);
            
            return view('admin.search_category_product')->with('search_category', $search_category)->with('keywords', $keywords);
                
        } else {
            return Redirect::to('all-category-product');
        }
    }



}
