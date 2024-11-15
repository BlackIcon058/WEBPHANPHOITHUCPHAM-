<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;

class PostController extends Controller
{

    //xác thực đăng nhập, admin
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

    //gửi bình luận
    public function submit_comment(Request $request)
    {
        if ($request->has(['comment', 'user_id', 'post_id'])) {
            $data = [
                'comment' => $request->input('comment'),
                'user_id' => $request->input('user_id'),
                'comment_date' => $request->date('Y-m-d H:i:s'),
                'post_id' => $request->input('post_id')
            ];
            $data['comment_status'] = 1;
            // Lưu trữ dữ liệu bình luận vào cơ sở dữ liệu
            DB::table('tbl_comments')->insert($data);
            $post_id = $request->input('post_id');
            return Redirect::to("detail/$post_id");
        } else {
            return Redirect::to("detail/{$request->input('post_id')}")->with('status', 'Lỗi bình luận!');
        }
    }

    //chỉnh sửa bình luận
    public function edit_comment(Request $request)
    {
        $comment_id = $request->input('comment_id');
        $post_id = $request->input('post_id');

        $buttonName = $request->input('button_name');
        $comment = $request->input('comment');
        if ($buttonName == 'btn_edit') {
            DB::table('tbl_comments')->where('comment_id', $comment_id)->update(['comment' => $comment]);
            return Redirect::to("detail/{$request->input('post_id')}")->with('status', 'Cập nhật bình luận thành công!');
        } elseif ($buttonName == 'btn_delete') {
            DB::table('tbl_comments')->where('comment_id', $comment_id)->delete();
            return Redirect::to("detail/{$request->input('post_id')}")->with('status', 'Xóa bình luận thành công!');
        }
    }

    //liệt kê bình luận, admin
    public function all_comment()
    {

        $this->AuthLogin();

        $all_comment = DB::table('tbl_comments')
            ->join('users', 'users.id', '=', 'tbl_comments.user_id')
            ->join('bai_dang', 'bai_dang.id_bai_dang', '=', 'tbl_comments.post_id')
            ->orderby('tbl_comments.comment_date', 'desc')
            ->paginate(4);
        return view('admin.all_comment')->with('all_comment', $all_comment);
    }


    // tắt kích hoạt binh luan, admin
    public function unactive_comment($comment_id)
    {
        $this->AuthLogin();

        DB::table('tbl_comments')->where('comment_id', $comment_id)->update(['comment_status' => 1]);
        Session::put('message', 'Cho phép hiển thị bình luận!');
        return Redirect::to('all-comment');
    }


    // bật kích hoạt binh luan, admin
    public function active_comment($comment_id)
    {
        $this->AuthLogin();

        DB::table('tbl_comments')->where('comment_id', $comment_id)->update(['comment_status' => 0]);
        Session::put('message', 'Đã ẩn bình luận này!');
        return Redirect::to('all-comment');
    }

    //tìm kiếm bình luận, admin
    public function tim_kiem_binh_luan(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_comment = DB::table('tbl_comments')
                // ->select('tbl_comments.*', 'tbl_category_product.category_name')
                ->join('users', 'users.id', '=', 'tbl_comments.user_id')
                ->join('bai_dang', 'bai_dang.id_bai_dang', '=', 'tbl_comments.post_id')
                // ->where('tbl_comments.comment', 'like', '%' . $keywords . '%')
                ->where(function ($query) use ($keywords) {
                    $query->where('tbl_comments.comment', 'like', '%' . $keywords . '%')
                        ->orWhere('users.name', 'like', '%' . $keywords . '%');
                })

                ->distinct()
                ->paginate(4);

            // ->get();
            return view('admin.search_comment')->with('search_comment', $search_comment)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-comment');
        }
    }

    //liệt kê bài đăng, admin
    public function all_post()
    {
        $this->AuthLogin();
        $all_post = DB::table('bai_dang')
            ->join('tbl_product', 'tbl_product.product_id', '=', 'bai_dang.id_san_pham')
            ->join('users', 'users.id', '=', 'bai_dang.id_nguoi_ban')
            ->orderby('bai_dang.ngay_dang', 'desc')
            ->paginate(4);
        // ->get();
        return view('admin.all_post')->with('all_post', $all_post);
    }

    //tìm kiếm bài đăng, admin
    public function tim_kiem_post(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_post = DB::table('bai_dang')
                ->join('tbl_product', 'tbl_product.product_id', '=', 'bai_dang.id_san_pham')
                ->join('users', 'users.id', '=', 'bai_dang.id_nguoi_ban')
                ->where(function ($query) use ($keywords) {
                    $query->where('bai_dang.id_bai_dang', 'like', '%' . $keywords . '%')
                        ->orWhere('users.fullname', 'like', '%' . $keywords . '%')
                        ->orWhere('tbl_product.product_name', 'like', '%' . $keywords . '%');
                })
                ->paginate(4);

            // ->get();

            return view('admin.search_post')->with('search_post', $search_post)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-post');
        }
    }


    // tắt kích hoạt bài đăng
    public function unactive_post($post_id)
    {
        $this->AuthLogin();

        DB::table('bai_dang')->where('id_bai_dang', $post_id)->update(['trang_thai' => 1]);
        Session::put('message', 'Cho phép hiển thị bài đăng!');
        return Redirect::to('all-post');
    }


    // bật kích hoạt bài đăng
    public function active_post($post_id)
    {
        $this->AuthLogin();
        DB::table('bai_dang')->where('id_bai_dang', $post_id)->update(['trang_thai' => 0]);
        Session::put('message', 'Đã ẩn bài đăng này!');
        return Redirect::to('all-post');
    }

    //xóa bài đăng, admin
    public function delete_post($post_id)
    {
        $this->AuthLogin();
        // DB::table('bai_dang')->where('id_bai_dang', $post_id)->delete();
        $post = DB::table('bai_dang')->where('id_bai_dang', $post_id)->first();
        if ($post) {
            $id_san_pham = $post->id_san_pham;
            DB::table('tbl_product')->where('product_id', $id_san_pham)->delete();
            DB::table('bai_dang')->where('id_bai_dang', $post_id)->delete();
        }

        Session::put('message', 'Xóa bài đăng thành công!');
        return Redirect::to('all-post');
    }

    // xem chi tiết bài đăng, admin
    public function view_post($post_id)
    {
        $this->AuthLogin();

        // $info_nguoi_ban = DB::table('users')
        //     ->join('tbl_order', 'users.id', '=', 'tbl_order.id_nguoi_ban')
        //     ->where('tbl_order.order_id', '=', $order_id)
        //     ->get();

        // ->with(compact('order_details', 'order_details', 'info_nguoi_ban', 'info_nguoi_mua'))->with('order_status', $order_status)
        $bai_dang = DB::table('bai_dang')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->join('users', 'bai_dang.id_nguoi_ban', '=', 'users.id')
            ->select('bai_dang.*', 'users.*', 'tbl_product.*')
            ->where('bai_dang.id_bai_dang', $post_id)
            ->get(); // Sử dụng first() để lấy một bản ghi duy nhất

        $info_nguoi_ban = DB::table('bai_dang')
            ->join('users', 'users.id', '=', 'bai_dang.id_nguoi_ban')
            ->where('bai_dang.id_bai_dang', '=', $post_id)
            ->get();

        return view('admin.view_post', compact('bai_dang', 'info_nguoi_ban'));
    }

    //cập nhật trạng thái bài đăng, admin
    public function update_post_status(Request $request)
    {
        $data = $request->all();
        DB::table('bai_dang')
            ->where('id_bai_dang', $data['post_id'])
            ->update(['trang_thai' => $data['post_status']]);
    }
}
