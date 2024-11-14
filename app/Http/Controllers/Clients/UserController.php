<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    
    public function cart_quantity(){
        return DB::table('tbl_cart')
            ->where('id_khachhang','=',Session::get('user'))
            ->count();
    }

    public function login(){
        return view("Clients.Login");
    }
    // một số trang giao diện người dùng
    public function about()
    {
        $cart_quantity = $this->cart_quantity();
        return view('Clients.gioithieu', ['cart_quantity' => $cart_quantity, 'user' => Session::get('user')]);
    }
    public function contact(){
        $cart_quantity = $this->cart_quantity();
        return view("Clients.lienhe", ['cart_quantity' => $cart_quantity, 'user' => Session::get('user')]);
    }
    public function blog(){
        $cart_quantity = $this->cart_quantity();
        return view("Clients.tintuc", ['cart_quantity' => $cart_quantity, 'user' => Session::get('user')]);
    }
    public function postlogin(LoginRequest $request){
        
        $user = DB::table('users')
            ->where("email", "=", $request->email)
            ->first();

        if ($user && Hash::check($request->password, $user->matkhau)) {
            Session::put('user', $user->id_khachhang);
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['error' => 'Email hoặc mật khẩu sai.']);
    }

    public function register(){
        return view("Clients.Register");
    }

    public function postregister(RegisterRequest $request){
        $request->validated();

        $hashedPassword = Hash::make($request->password);

        DB::table('users')
            ->insert([
                'hoten' => $request->fullname,
                'sodienthoai' => $request->phone,
                'email' => $request->email,
                'matkhau' => $hashedPassword,
                'diachi' => $request->address
            ]);

        return redirect('/register')->with('success', 'Đăng ký tài khoản thành công');
    }

    public function logout(){
        Session::pull('user');
        return redirect()->intended('/');
    }

    public function information(){
        $cart_quantity = $this->cart_quantity();  
        $user  = DB::table('users')
            ->where("id_khachhang", "=", Session::get('user'))
            ->first();
        return view("Clients.User", compact('user', 'cart_quantity'));
    }

    public function update(){
        $cart_quantity = $this->cart_quantity();  
        $user  = DB::table('users')
            ->where("id_khachhang", "=", Session::get('user'))
            ->first();
        return view("Clients.suaThongTin", compact('user', 'cart_quantity'));
    }

    public function postUpdate(Request $request){
        $id = Session::get('user');
        $ten = $request->hoten;
        $email = $request->email;
        $sdt = $request->sdt;
        $diachi = $request->diachi;

        DB::table('users')
            ->where('id_khachhang', '=', $id)
            ->update([
                'hoten' => $ten,
                'email' => $email,
                'sodienthoai' => $sdt,
                'diachi' => $diachi
            ]);

        $user  = DB::table('users')
            ->where("id_khachhang", "=", Session::get('user'))
            ->first();

        $cart_quantity = $this->cart_quantity();  

        return redirect()->route("thongTinUser")->with('success', 'Cập nhật thông tin thành công!');
    }

    public function postChangePassword(Request $request){
        $id = Session::get('user');

        $user = DB::table('users')->where('id_khachhang', '=', $id)->first();

        if (Hash::check($request->old_password, $user->matkhau)) {
            $newPassword = Hash::make($request->new_password);

            DB::table('users')
                ->where('id_khachhang', '=', $id)
                ->update(['matkhau' => $newPassword]);

            return redirect()->route('thongTinUser')->with('success', 'Mật khẩu đã được cập nhật');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng!');
        }
    }
}