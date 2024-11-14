<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Visibility;

class AdminCategoryController extends Controller
{
    
    public function index(){
        $ds = DB::table('tbl_loaimon')->get();
        $dsg = DB::table('tbl_mucgia')->get();
        return view("Admin.category", compact('ds', 'dsg'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $hang = DB::table('tbl_loaimon')->where('id_hangsp', '=', $id)->delete();
        $ds = DB::table('tbl_loaimon')->get();
        $dsg = DB::table('tbl_mucgia')->get();
        return view("Admin.category", compact('ds', 'dsg'));
    }
    
    public function create(){
        return redirect()->route('category.index');
    }
    public function postCreate(Request $request){
        $validated = $request->validate([
            'tenhangsp' => 'required|string|max:255',
        ], [
            'tenhangsp.required' => 'Vui lòng nhập tên danh mục!',
            'tenhangsp.string' => 'Tên danh mục phải là chuỗi ký tự!',
            'tenhangsp.max' => 'Tên danh mục không được vượt quá 255 ký tự!',
        ]);
        $ten = $request->tenhangsp;
        DB::table('tbl_loaimon')->insert([
            'tenhangsp' => $ten,
        ]);
        
        $ds = DB::table('tbl_loaimon')->get();
        $dsg = DB::table('tbl_mucgia')->get();
        return view("Admin.category", compact('ds', 'dsg'));
    }

    //thêm mới giá
    public function addprice(){
        return redirect()->route('category.index');
    }
    public function postprice(Request $request){
        $gia = $request->mucgia;
        DB::table('tbl_mucgia')->insert([
            'mucgia' => $gia,
        ]);
        return redirect()->route('category.index');
    }

    public function edit($id){
        $h = DB::table('tbl_loaimon')->where('id_hangsp', '=', $id)->first();
        return view('Admin.editcate', compact('h'));
    }
    public function postedit(Request $request){
        $id = $request->id;
        $h = DB::table('tbl_loaimon')->where('id_hangsp', '=', $id)
        ->update([
            'tenhangsp'=>$request->tenhangsp,
        ]);
        return redirect()->route('category.index');
    }

    //sửa giá
    public function editprice($id){
        $gia = DB::table('tbl_mucgia')->where('id_mucgia', '=', $id)->first();
        return view('Admin.editprice', compact('gia'));
    }
    public function posteditprice(Request $request){
        $id = $request->id;
        $gia = DB::table('tbl_mucgia')->where('id_mucgia', '=', $id)
        ->update([
            'mucgia'=>$request->mucgia
        ]);
        return redirect()->route('category.index');
    }
    
    public function deleteprice(Request $request){
        $id = $request->id;
        $hang = DB::table('tbl_mucgia')->where('id_mucgia', '=', $id)->delete();
        return redirect()->route('category.index');
    }
}
