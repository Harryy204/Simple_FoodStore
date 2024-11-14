<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
// use Session;

class CartController extends Controller
{
    //
    

    public function cart_quantity(){
        return DB::table('tbl_cart')
            ->where('id_khachhang','=',Session::get('user'))
            ->count();
    }
    public function index(){
        $cart_quantity = $this->cart_quantity();
        return view("Clients.cart",compact('cart_quantity'));
    }
    public function themgiohang($id,$sl=1){
        // dd($sl);
        $product =DB::table('tbl_monan')
        ->where("id_sp","=",$id)
        ->first();
        $cart = Session::get('cart', []);

        if (!array_key_exists($id, $cart)) {
            $cart[$id]= [
                'ten'=>$product->ten_sp,
                'gia'=>$product->gia,
                'hinhanh'=>$product->hinhanh,
                'soluong'=>$sl,
                
            ];
        } else {
            $cart[$id]['soluong'] +=$sl;

        }
        
        // dd($cart);
        Session::put('cart', $cart);
        return response()->json(['code' => 200, 'mes' => 'Đã thêm vào giỏ hàng','count'=>count(Session::get('cart'))]);

    }
    public function update(Request $request){
        $cart = Session::get('cart',[]);
        $id = $request->id;
        $action = $request->action;
        
            if($action=='giamsl'){
                if($cart[$id]['soluong']>1){
                    $cart[$id]['soluong']--;
                }
                else{
                    unset($cart[$id]);
                }
            }
            else{
                $cart[$id]['soluong']++;
            }
            $tong =0 ;
            foreach ($cart as $item) {
                $tong +=$item['soluong']*$item['gia'];
            }
            $soluongmoi =0;
            $gia =0;
            if(isset($cart[$id])){
                $soluongmoi = $cart[$id]['soluong'];
                $gia =$cart[$id]['gia'];
            }
            Session::put('cart', $cart);

            return response()->json(['code' => 200, 'soluong'=>$soluongmoi,'tong'=>$tong,'gia'=>$gia,'count'=>count(Session::get('cart'))]);    
    }
    public function deleteItemInCart(Request $request){
        $cart = Session::get('cart',[]);
        unset($cart[$request->id]);
        $tong =0 ;
        foreach ($cart as $item) {
            $tong +=$item['soluong']*$item['gia'];
        }
        Session::put('cart', $cart);
        return response()->json(['code' => 200, 'mes' => 'xóa thành công','tong'=>$tong,'count'=>count(Session::get('cart'))]);
    }
    
}
