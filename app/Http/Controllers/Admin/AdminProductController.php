<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index()
    {
        $ds = DB::table('tbl_monan')->orderBy('id_sp', 'desc')->paginate(8);
        $hang = DB::table('tbl_loaimon')->get();
        return view('Admin.product', compact('ds', 'hang'));
    }

    public function create()
    {
        return redirect()->route('product.index');
    }

    public function postcreate(Request $request)
    {
        $validated = $request->validate([
            'tensp' => 'required|string|max:255',
            'idhangsp' => 'required|exists:tbl_loaimon,id_hangsp', 
            'giasp' => 'required|numeric|min:0', 
            'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'soluongsp' => 'required|numeric|min:0', 
        ], [
            'tensp.required' => 'Tên món ăn không được để trống!',
            'giasp.required' => 'Giá món ăn không được để trống!',
            'hinhanh.required' => 'Vui lòng chọn hình ảnh cho món ăn!',
            'soluongsp.required' => 'Số lượng món ăn không được để trống!',
        ]);

        $ma = $request->masp ?? 'SP' . str_pad(DB::table('tbl_monan')->max('id_sp') + 1, 5, '0', STR_PAD_LEFT);
        $ten = $request->tensp;
        $idhangsp = $request->idhangsp;
        $gia = $request->giasp;
        $mota = $request->motasp;
        $sl = $request->soluongsp;
        $slban = $request->dabansp;
        $trangthai = $request->trangthaisp;

        $imagePath = '';
        if ($request->hasFile('hinhanh')) {
            $image = $request->file('hinhanh');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('assets/uploads'), $imageName);
            $imagePath = $imageName;
        }
        $timeRammat = now();

        DB::table("tbl_monan")->insert([
            'ma_sp' => $ma,
            'ten_sp' => $ten,
            'id_hangsp' => $idhangsp,
            'gia' => $gia,
            'hinhanh' => $imagePath,
            'mota' => $mota,
            'soluong' => $sl,
            'daban' => $slban,
            'trangthai' => $trangthai,
            'time_rammat' => $timeRammat,
    ]);

    return redirect()->route('product.index');
}



    public function delete(Request $request)
    {
        $id = $request->id;
        DB::table('tbl_monan')->where('id_sp', '=', $id)->delete();
        return redirect()->route('product.index')->with('success', 'món ăn đã được xóa thành công.');;
    }

    public function edit($id)
    {
        $sp = DB::table('tbl_monan')->where("id_sp", "=", $id)->first();
        return view('Admin.editproduct', compact('sp'));
    }

    public function postedit(Request $request)
    {
        $validated = $request->validate([
            'masp' => 'required|string|max:255',  
            'tensp' => 'required|string|max:255', 
            'idhangsp' => 'required|exists:tbl_loaimon,id_hangsp', 
            'giasp' => 'required|numeric|min:0', 
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'soluongsp' => 'required|numeric|min:0', 
        ], [
            'tensp.required' => 'Tên món ăn không được để trống!',
            'giasp.required' => 'Giá món ăn không được để trống!',
            'hinhanh.image' => 'Vui lòng chọn một hình ảnh hợp lệ!',
            'soluongsp.required' => 'Số lượng món ăn không được để trống!',
        ]);

        $id = $request->id;

        $ma = $request->masp;
        $ten = $request->tensp;
        $idhangsp = $request->idhangsp;
        $gia = $request->giasp;
        $mota = $request->motasp;
        $sl = $request->soluongsp;
        $slban = $request->dabansp;
        $trangthai = $request->trangthaisp;

        $imagePath = '';
        if ($request->hasFile('hinhanh')) {
            $image = $request->file('hinhanh');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('assets/uploads'), $imageName);
            $imagePath = $imageName;
        }

        $updateData = [
            'ma_sp' => $ma,
            'ten_sp' => $ten,
            'id_hangsp' => $idhangsp,
            'gia' => $gia,
            'mota' => $mota,
            'soluong' => $sl,
            'daban' => $slban,
            'trangthai' => $trangthai,
        ];

        if ($imagePath) {
            $updateData['hinhanh'] = $imagePath;
        }

        DB::table('tbl_monan')->where('id_sp', '=', $id)->update($updateData);

        return redirect()->route('product.index');
    }
}
