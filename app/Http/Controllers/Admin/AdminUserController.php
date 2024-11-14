<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{  
    public function index(){
        $ds = DB::table('users')->get();
        return view('Admin.user', compact('ds'));
    }

    public function create(){
        return redirect()->route('user.index');
    }
    public function postcreate(Request $request){
        DB::table('users')
        ->insert([
            'hoten'=>$request->tentk,
            'sodienthoai'=>$request->sdt,
            'matkhau'=>$request->mk,
            'diachi'=>$request->dc,
            'email'=>$request->email
        ]);
        return redirect()->route('user.index');
    }

    public function edit($id){
        $u = DB::table('users')->where('id_khachhang', '=', $id)->first();
        return view("Admin.edituser", compact('u'));
    }
    public function postedit(Request $request){
        $id = $request->id;
        $u = DB::table('users')->where('id_khachhang', '=', $id)
        ->update([
            'hoten'=>$request->tentk,
            'sodienthoai'=>$request->sdt,
            // 'matkhau'=>$request->matkhau,
            'diachi'=>$request->diachi,
            'email'=>$request->email
        ]);
        return redirect()->route('user.index');
    }

    public function delete(Request $request){
        $id = $request->id;
        $u = DB::table('users')->where('id_khachhang', '=', $id)->delete();
        return redirect()->route('user.index');
    }
}