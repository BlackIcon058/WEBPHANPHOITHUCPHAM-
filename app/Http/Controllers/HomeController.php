<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;


class HomeController extends Controller
{
    // public function checkUserType()
    // {
    //     if (!Auth::user()) {
    //         return redirect()->back();
    //     }

    //     if (Auth::user()->userType === 'ADM') {
    //         return Redirect::to('dashboard-admin');
    //     }

    //     if (Auth::user()->userType === 'USR') {
    //         return redirect('/');
    //     }
    // }

    // hiển thị trang chủ bán hàng
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();

        $bai_dang = DB::table('bai_dang')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
            ->where('bai_dang.trang_thai', '=', 1)
            ->where('users.is_seller', '=', 1)
            ->where('tbl_category_product.category_status', '1')
            ->whereRaw('NOW() < bai_dang.het_han')
            ->orderBy('bai_dang.ngay_dang', 'desc')
            ->paginate(4);

        // ->get();
        // $bai_dang = DB::table('bai_dang')->where('trang_thai', '1')->orderBy('ngay_dang', 'desc')->get();
        $so_luong_bai_dang = $bai_dang->count();

        return view('pages.home', compact('cate_product', 'bai_dang', 'so_luong_bai_dang'));
    }


    // tìm kiếm theo từ khóa
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();

        $search_product = DB::table('bai_dang')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
            ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
            ->where('bai_dang.trang_thai', '=', 1)
            ->where('users.is_seller', '=', 1)
            ->where('tbl_category_product.category_status', '1')
            ->where('tbl_product.product_qty', '>', 0)
            ->whereRaw('NOW() < bai_dang.het_han')
            ->orderBy('bai_dang.ngay_dang', 'desc')
            ->paginate(4);
        // ->get();

        $so_luong_bai_dang = $search_product->count();

        return view('pages.shop', compact('search_product', 'cate_product', 'so_luong_bai_dang', 'keywords'));
    }

    // sắp xếp theo giá tiền từ cao xuống thấp, và ngược lại
    public function avanced_search(Request $request)
    {

        // $keywords = $request->keywords;
        $keywords = $request->has('keywords') ? $request->keywords : '';
        $price_words = $request->price_submit;


        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();


        if ($price_words == 1) {
            $search_product = DB::table('bai_dang')
                ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
                ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->where('bai_dang.trang_thai', '=', 1)
                ->where('users.is_seller', '=', 1)
                ->where('tbl_category_product.category_status', '1')
                ->whereRaw('NOW() < bai_dang.het_han')
                // ->orderBy('bai_dang.ngay_dang', 'desc')
                ->where('tbl_product.product_qty', '>', 0)
                ->orderBy('tbl_product.product_price', 'asc')
                ->paginate(4);

            // ->get();

            $so_luong_bai_dang = $search_product->count();
        } else {
            $search_product = DB::table('bai_dang')
                ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
                ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->where('bai_dang.trang_thai', '=', 1)
                ->where('users.is_seller', '=', 1)
                ->where('tbl_category_product.category_status', '1')
                ->whereRaw('NOW() < bai_dang.het_han')
                // ->orderBy('bai_dang.ngay_dang', 'desc')
                ->where('tbl_product.product_qty', '>', 0)
                ->orderBy('tbl_product.product_price', 'desc')
                ->paginate(4);

            // ->get();

            $so_luong_bai_dang = $search_product->count();
        }

        return view('pages.shop', compact('keywords', 'search_product', 'so_luong_bai_dang', 'cate_product', 'price_words'));
    }

    // sắp xếp giá tiền khi tìm kiếm theo danh mục
    public function avanced_search_category(Request $request)
    {
        $category_name = $request->category_name;
        $price_words = $request->price_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $category_id = DB::table('tbl_category_product')->where('category_name', $category_name)->value('category_id');

        if ($price_words == 1) {
            $bai_dang = DB::table('bai_dang')
                ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
                ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                // ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->where('tbl_product.category_id', '=', $category_id)
                ->where('bai_dang.trang_thai', '=', 1)
                ->where('users.is_seller', '=', 1)
                ->where('tbl_category_product.category_status', '1')
                ->whereRaw('NOW() < bai_dang.het_han')
                // ->orderBy('bai_dang.ngay_dang', 'desc')
                ->where('tbl_product.product_qty', '>', 0)
                ->orderBy('tbl_product.product_price', 'asc')
                ->paginate(4);

            // ->get();

            $so_luong_bai_dang = $bai_dang->count();
        } else {
            $bai_dang = DB::table('bai_dang')
                ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
                ->join('users', 'tbl_product.id_nguoi_ban', '=', 'users.id')
                ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
                // ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->where('tbl_product.category_id', '=', $category_id)
                ->where('bai_dang.trang_thai', '=', 1)
                ->where('users.is_seller', '=', 1)
                ->where('tbl_category_product.category_status', '1')
                ->whereRaw('NOW() < bai_dang.het_han')
                // ->orderBy('bai_dang.ngay_dang', 'desc')
                ->where('tbl_product.product_qty', '>', 0)
                ->orderBy('tbl_product.product_price', 'desc')
                ->paginate(4);

            // ->get();

            $so_luong_bai_dang = $bai_dang->count();
        }

        return view('pages.product_by_category', compact('category_id', 'category_name', 'bai_dang', 'so_luong_bai_dang', 'cate_product', 'price_words'));
    }

    // hiển thị trang khi gõ vào tìm kiếm theo từ khóa
    public function shop()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_category_product.category_status', '1')
            ->where('product_status', '1')
            ->where('tbl_product.product_qty', '>', 0)
            ->orderby('product_id', 'asc')
            ->paginate(4);

        // ->get();
        return view('pages.shop')->with('category', $cate_product)->with('all_product', $all_product);
    }

    // hiển thị trang thanh toán
    public function checkout_customer()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.home')->with('category', $cate_product)->with('all_product', $all_product);
        return view('pages.checkout');
    }

    // hiển thị trang liên hệ
    public function contact()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.contact')->with('category', $cate_product)->with('all_product', $all_product);
    }

    //hiển thị trang giới thiệu
    public function about()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.about')->with('category', $cate_product)->with('all_product', $all_product);
    }

    //hiển thị trang thông tin cá nhân
    public function profile($id)
    {
        if (Auth::check() && (Auth::user()->id == $id)) {
            $profile = DB::table('users')->where('id', $id)->get();

            $rating = DB::table('users')
                ->where('users.id', $id)
                ->value('rating');

            $ratingCount = DB::table('tbl_rating_user')
                ->where('user_id', $id)
                ->count();

            // return view('pages.profile')->with('profile', $profile);
            return view('pages.profile', compact('ratingCount', 'profile', 'rating'));
        } else {
            return redirect('/');
        }
    }



    //xem thông tin tổng quan cá nhân của một người bất kì
    public function user_profile($id)
    {
        if (Auth::check()) {
            $profile = DB::table('users')->where('id', $id)->get();

            $rating = DB::table('users')
                ->where('users.id', $id)
                ->value('rating');

            $ratingCount = DB::table('tbl_rating_user')
                ->where('user_id', $id)
                ->count();

            // return view('pages.profile')->with('profile', $profile);
            return view('pages.user_profile', compact('ratingCount', 'profile', 'rating'));
        } else {
            return redirect('/');
        }
    }

    //hiển thị giao diện tổng quan trang tin tức
    public function latest_news()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.latest_news')->with('category', $cate_product)->with('all_product', $all_product);
    }

    //trang tạo bài đăng
    public function post()
    {
        if (Auth::check()) {
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
            return view('pages.post')->with('category', $cate_product);
        } else {
            return redirect('/');
        }
    }

    //trang cửa hàng 
    public function shop_details($id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        //$all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();

        $averageRating = Rating::where('seller_id', $id)->avg('rating');
        $averageRating = round($averageRating);

        $numRating = Rating::where('seller_id', $id)->count();


        $numOrderSuccess = DB::table('tbl_order')
            ->join('users', 'users.id', '=', 'tbl_order.id_nguoi_ban')
            ->where('tbl_order.order_status', 2)
            ->where('users.id', $id)
            ->count();

        $shop_detail = DB::table('users')
            ->where('users.id', $id)
            ->get();

        $bai_dang = DB::table('users')
            ->join('bai_dang', 'users.id', '=', 'bai_dang.id_nguoi_ban')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->select('users.*', 'bai_dang.*', 'tbl_product.*')
            ->where('users.id', $id)
            ->where('bai_dang.trang_thai', 1)
            ->orderBy('bai_dang.ngay_dang', 'desc') // Sắp xếp theo ngày đăng gần nhất
            ->paginate(4);

        // ->get();

        $soluongbaidang = $bai_dang->count();

        return view('pages.shop_details', compact('numOrderSuccess', 'numRating', 'averageRating', 'shop_detail', 'bai_dang', 'soluongbaidang', 'cate_product'));
    }

    // hiển thị chi tiết bài đăng
    public function detail($id)
    {

        $bai_dang = DB::table('bai_dang')
            ->join('tbl_product', 'bai_dang.id_san_pham', '=', 'tbl_product.product_id')
            ->join('users', 'bai_dang.id_nguoi_ban', '=', 'users.id')
            ->select('bai_dang.*', 'users.*', 'tbl_product.*')
            ->where('bai_dang.id_bai_dang', $id)
            ->get();

        $comment = DB::table('tbl_comments')
            ->join('bai_dang', 'bai_dang.id_bai_dang', '=', 'tbl_comments.post_id')
            ->join('users', 'users.id', '=', 'tbl_comments.user_id')
            ->where('tbl_comments.post_id', $id)
            ->where('comment_status', 1)
            ->get();

        return view('pages.detail', compact('bai_dang', 'comment'));
    }

    // hiển thị giao diện đăng nhập khách hàng
    public function login_customer()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.login')->with('category', $cate_product)->with('all_product', $all_product);
    }

    // hiển thị giao diện đăng ký khách hàng
    public function signup_customer()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.signup')->with('category', $cate_product)->with('all_product', $all_product);
    }

    // hiển thị trang bài viết
    public function news()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.news')->with('category', $cate_product)->with('all_product', $all_product);
    }


    // xem chi tiết của tin 1
    public function detail_news1()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.detail_news1')->with('category', $cate_product)->with('all_product', $all_product);
    }

    // xem chi tiết của tin 2
    public function detail_news2()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.detail_news2')->with('category', $cate_product)->with('all_product', $all_product);
    }

    // xem chi tiết của tin 3
    public function detail_news3()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'asc')->get();
        return view('pages.detail_news3')->with('category', $cate_product)->with('all_product', $all_product);
    }
}
