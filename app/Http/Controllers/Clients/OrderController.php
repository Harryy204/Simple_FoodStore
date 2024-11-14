<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function cart_quantity(){
        return DB::table('tbl_cart')
            ->where('id_khachhang','=',Session::get('user'))
            ->count();
    }
    public function index(){
        $cart_quantity = $this->cart_quantity();
        if (!Session::has('user')) {
            return redirect()->route('client.login');
        }
        else{
            $donhang = DB::table('tbl_cart')
            ->join('users','users.id_khachhang','=','tbl_cart.id_khachhang')
            ->where('tbl_cart.id_khachhang','=',Session::get('user'))
            ->orderBy('tbl_cart.ngaydat')
            ->get();
            return view("Clients.xemdonhang",compact('donhang','cart_quantity'));
        }
    }
    public function dathang(){
        $cart_quantity = $this->cart_quantity();
        $id_user = Session::get('user');
        $cart = Session::get('cart',[]);
        $tong =0;
        foreach ($cart as $key => $item) {
            $tong += $item['soluong']*$item['gia'];
        }
        $user = DB::table('users')
        ->where("id_khachhang","=",$id_user)
        ->first();
        return view("Clients.dathang",compact('user','cart','tong','cart_quantity'));
    }
    public function postdathang(Request $request){
        $id_kh = Session::get('user');
        $kh = DB::table('users')->where('id_khachhang','=',$id_kh)->first();
        $tenn = $request->hoten;
        $sdt = $request->sdt;
        $dc = $request->diachi;
        $trangthai = 1;
        $thanhtoan = $request->httt;
        $currentDay = date('Y-m-d');
        $fullDate = date('Y-m-d H-m-i');
        $code_cart = rand(0,9999);
        DB::table('tbl_cart')->insert([
            'id_khachhang'=>$id_kh,
            'code_cart'=>$code_cart,
            'tennguoinhan'=>$tenn,
            'sdt'=>$sdt,
            'dc'=>$dc,
            'ngaydat'=>$currentDay,
            'thanhtoan'=>$thanhtoan,
            'trangthai'=>$trangthai
        ]);
        $cart = Session::get('cart',[]);
        foreach ($cart as $key => $item) {
            DB::table('tbl_cart_info')->insert([
                'code_cart'=>$code_cart,
                'id_sp'=>$key,
                'sl'=>$item['soluong']
            ]);
        };
        Mail::send('Mails.mail', compact('tenn','sdt','dc','fullDate','cart'), function ($message) use  ($kh) {
            $message->subject('Thông báo đặt hàng');
            $message->to($kh->email,'GoodFood');
        });
        Session::forget('cart');
        return redirect()->route('chitietdh',['id'=>$code_cart])->with('thongbao','Đã đặt hàng');
    }
    public function chitiet(Request $request){
        $cart_quantity = $this->cart_quantity();
        $code_cart = $request->id;
        $dataCart = DB::table('tbl_cart')
        ->join('users','tbl_cart.id_khachhang','=','users.id_khachhang')
        ->where('tbl_cart.code_cart','=',$code_cart)
        ->first();
        // dd($dataCart);
        $dataSP = DB::table('tbl_cart_info')
        ->join('tbl_monan','tbl_cart_info.id_sp','=','tbl_monan.id_sp')
        ->where('tbl_cart_info.code_cart','=',$code_cart)
        ->get();
        $tong = 0;
        foreach ($dataSP as $key => $item) {
            $tong +=$item->gia* $item->sl;
        }
        return view('Clients.chitietdh',compact('dataCart','dataSP','code_cart','tong','cart_quantity'));
    }
    public function huy(Request $request){
        $code_cart = $request->id;
        DB::table('tbl_cart_info')
        ->where('code_cart','=',$code_cart)
        ->delete();
        DB::table('tbl_cart')
        ->where('code_cart','=',$code_cart)
        ->delete();
        return redirect()->route('xemdonhang')->with('thongbao','Đã xóa đơn hàng');
    }
    public function sua(Request $request){
        $cart_quantity = $this->cart_quantity();
        $code_cart = $request->id;
        $id_kh = Session::get('user');
        $donhang = DB::table('tbl_cart')
        ->join('users','tbl_cart.id_khachhang','=','users.id_khachhang')
        ->where('tbl_cart.id_khachhang','=',$id_kh)
        ->where('tbl_cart.code_cart','=',$code_cart)
        ->first();
        return view('Clients.suadonhang',compact('donhang','code_cart','cart_quantity'));
    }
    public function postsua(Request $request){
        $code_cart = $request->id;
        $tenn = $request->hoten;
        $sdt = $request->sdt;
        $diachi = $request->diachi;
        $tt = $request->httt;
        DB::table('tbl_cart')
        ->where('code_cart','=',$code_cart)
        ->update([
            'tennguoinhan'=>$tenn,
            'sdt'=>$sdt,
            'dc'=>$diachi,
            'thanhtoan'=>$tt
        ]);
        return redirect()->route('chitietdh',['id'=>$code_cart])->with('thongbao','Đã sửa đơn hàng');
    }
    public function danhan(Request $request){
        $code_cart = $request->id;
        // cap nhật trạng thái đơn hàng,cập nhật ngày nhận hàng
        $currentDay = date('Y-m-d');
        DB::table('tbl_cart')
        ->where('code_cart','=',$code_cart)
        ->update([
            'trangthai'=>3,
            'ngaynhan'=>$currentDay
        ]);
       
        // // lay thong tin ở cart-infor để cập nhật lại số lượng ở bảng sản phẩm
        $cart_infor = DB::table('tbl_cart_info')
        ->join('tbl_monan','tbl_monan.id_sp','=','tbl_cart_info.id_sp')
        ->where('code_cart','=',$code_cart)
        ->get();
        // câp nhật số lượng
        foreach ($cart_infor as $key => $item) {
            // lấy số lượng, đã bán của 1 sản phẩm
            $sp =  DB::table('tbl_monan')
            ->select([
                'soluong','daban'
            ])
            ->where('id_sp','=',$cart_infor[0]->id_sp)
            ->first();
            //số lượng còn của sản phẩm
            $sl=$sp->soluong;
            // đã bán
            $daban = $sp->daban;
            DB::table('tbl_monan')
            ->where('id_sp','=',$item->id_sp)
            ->update([
                'soluong'=>(int)$sl -(int)$item->sl,
                'daban'=>(int)$daban + (int)$item->daban
            ]);
        }

        return redirect()->route('chitietdh',['id'=>$code_cart])->with('thongbao','Đã nhận đơn hàng');
    }
}