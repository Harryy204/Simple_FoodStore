<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
// use Session;
class AdminHomeController extends Controller
{
    function index()
    {
        $slsp = DB::table('tbl_monan')->count();
        
        $slsptong = DB::table('tbl_monan')
            ->where('trangthai', 1)
            ->sum('soluong');
        $slhsp = DB::table('tbl_loaimon')->count();
        
        //sản phẩm đã bán
        $spdb = DB::table('tbl_monan')->sum('daban');

        //đơn hàng xử lý
        $sl_dh_xl = DB::table('tbl_cart')->where('trangthai', 1)->count();

        //dang giao
        $sl_dh_dg = DB::table('tbl_cart')->where('trangthai', 2)->count();

        //thành công
        $sl_dh_tc = DB::table('tbl_cart')->where('trangthai', 3)->count();

        //đơn hàng hôm nay
        $dh_hn = DB::table('tbl_cart')->whereDate('ngaydat', '=', date('Y-m-d'))->count();

        $tk = DB::table('users')->count();

        return view("admin.index", compact('slsp', 'slhsp', 'slsptong', 'spdb', 'sl_dh_xl', 'sl_dh_dg', 'dh_hn', 'sl_dh_tc', 'tk'));
    }
    public function login(){
        return view("Admin.Login");
    }
    public function postlogin(Request $request){
        $admin= DB::table('tbl_admin')
        ->where("ten","=",$request->ten)
        ->where("matkhau","=",$request->password)
        ->first();
        if(!empty($admin)){
            Session::put('admin', $admin->ten);
            // dd(Session::get('user'));
            return redirect()->intended('admin/home');
        }
        return view("Admin.Login")->with(['error'=> 'Tên tài khoản hoặc mật khẩu sai']);  
    }
    public function logout(){
        Session::pull('admin');
        return redirect()->intended('admin/login');
    }

}
