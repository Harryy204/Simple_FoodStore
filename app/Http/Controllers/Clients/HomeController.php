<?php

namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{

    function __construct() { 
             
    }
    public function cart_quantity(){
        return DB::table('tbl_cart')
            ->where('id_khachhang','=',Session::get('user'))
            ->count();
    }
    
    public function index($hang_id=null,$from=null,$to=null){
        $cart_quantity = $this->cart_quantity();
            $products = DB::table('tbl_monan')->paginate(8);
            // $tt = 'Tất cả món ăn';
            // dd($products);
            return view("Clients.home",compact('products','cart_quantity'));
    }
    public function theohang($hang_id=null){
        $cart_quantity = $this->cart_quantity();
        $products =DB::table('tbl_monan')->where("id_hangsp","=",$hang_id)->paginate(8);
        $sl = DB::table('tbl_monan')
        ->select(DB::raw('count(ma_sp) as soluong'))
        ->where('id_hangsp', '=', $hang_id)
        ->groupBy('id_hangsp')
        ->first();

        $category_name = DB::table('tbl_loaimon')
        ->where('id_hangsp', $hang_id)
        ->value('tenhangsp');
        // $tt = 
        // dd($products);
        return view("Clients.home",compact('products','sl','cart_quantity', 'category_name'));
    }
    // public function theogia($from=null,$to=null){
    //     $cart_quantity = $this->cart_quantity();  
    //         if($to==-1){
    //             $products =DB::table('tbl_monan')
    //             ->where("gia",">=",$from*1000000)->paginate(20);
    //             $sl = DB::table('tbl_monan')
    //             ->select(DB::raw('count(ma_sp) as soluong'))
    //             ->where('gia', '>=', $from*1000000)
    //             ->groupBy('id_hangsp')
    //             ->first();
    //             $tt = "Sản phẩm có giá trên ".$from;
    //             return view("Clients.home",compact('products','sl','tt','cart_quantity'));
    //         }
    //         else{
    //             $products =DB::table('tbl_monan')
    //             ->where("gia",">=",$from*1000000)
    //             ->where('gia','<=',$to*1000000)->paginate(20);
    //             $sl = DB::table('tbl_monan')
    //             ->select(DB::raw('count(ma_sp) as soluong'))
    //             ->where("gia",">=",$from*1000000)
    //             ->where('gia','<=',$to*1000000)
    //             ->groupBy('id_hangsp')
    //             ->first();
    //             $tt = "Sản phẩm có giá từ ".$from." đến ".$to." triệu";
    //             // dd($tt);
    //             // dd($sl);
    //             return view("Clients.home",compact('products','sl','tt','cart_quantity'));
    //         }
    //     }
        
        // return view("Admin.Category.Index");
    
    public function search(Request $request){
        $cart_quantity = $this->cart_quantity();  
        $search = $request->tukhoa;
        $productList = DB::table('tbl_monan')
        ->where("ten_sp","like",'%'.$search.'%')
        // ->get();
        ->paginate(8);
        $count = $productList->count();
        // dd($productList);
        return view("Clients.search",compact('search','count','productList','cart_quantity'));
    }
    public function ShowProduct(Request $request){
        $cart_quantity = $this->cart_quantity();  
        $id = $request->id;
        $product = DB::table('tbl_monan')
        ->join('tbl_loaimon', 'tbl_monan.id_hangsp', '=', 'tbl_loaimon.id_hangsp')
        ->where("id_sp","=",$id)
        ->first();
        $mucgia = DB::table('tbl_mucgia')->get();
        $hangsp = DB::table('tbl_loaimon')->get();
        return view("Clients.DetailProduct",compact('product','cart_quantity'));
    }
}
