<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{  
    public function index(){
        $ds = DB::table('tbl_cart')->join('users', 'tbl_cart.id_khachhang','=', 'users.id_khachhang')->get();
        
        return view('Admin.order', compact('ds'));
    }

    public function edit($code){
        $dh = DB::table('tbl_cart')->join('users', 'tbl_cart.id_khachhang','=', 'users.id_khachhang')
        ->where('code_cart', '=', $code)->first();
        return view('Admin.editorder', compact('dh'));
    }
    public function postedit(Request $request){
        $validated = $request->validate([
            'hoten' => 'required|string|max:255',      
            'sdt' => 'required|string|max:11|min:10',         
            'diachi' => 'required|string|max:255',   
        ],[
            'hoten.required' => 'Vui lòng nhập họ tên!',
            'sdt.required' => 'Vui lòng nhập số điện thoại!',
            'sdt.max' => 'Vui lòng không nhập quá 11 số!',
            'sdt.min' => 'Vui lổi nhập 10 số!',
            'diachi.required' => 'Vui lòng nhập địa chỉ!',
        ]);
        $code = $request->code;
        $dh = DB::table('tbl_cart')->join('users', 'tbl_cart.id_khachhang','=', 'users.id_khachhang')
        ->where('code_cart', '=', $code)
        ->update([
            'tennguoinhan'=>$request->hoten,
            'sdt'=>$request->sdt,
            'dc'=>$request->diachi,
        ]);
        
        return redirect()->route('order.index');
    }

    public function delete(Request $request){
        $code = $request->code;
        $hang = DB::table('tbl_cart_info')
        ->where('code_cart', '=', $code)->delete();
        $dh = DB::table('tbl_cart')
        // ->join('users', 'tbl_cart.id_khachhang','=', 'users.id_khachhang')
        ->where('code_cart', '=', $code)->delete();
        return redirect()->route('order.index');
    }

    public function detail($code){
        $dh = DB::table('tbl_cart')->join('users', 'tbl_cart.id_khachhang','=', 'users.id_khachhang')
        ->where('code_cart', '=', $code)->first();
        $ds = DB::table('tbl_cart_info')->join('tbl_monan', 'tbl_cart_info.id_sp', '=', 'tbl_monan.id_sp')
        ->where('code_cart', '=', $code)->get();
        $tong = 0;
        return view('Admin.detailorder', compact('dh','ds', 'tong'));
    }
    public function xacnhandon($code){
        $dh = DB::table('tbl_cart')
        ->where('code_cart', '=', $code)
        ->update([
            'trangthai'=>2
        ]);
        return redirect()->route('order.index');

    }
}