<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\AddCardRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        return view("Cart.get_list_cart");
    }
    public function add(Request $request){
        $token = $request->_token;
        // Xử lý dữ liệu
        Cart::create([
            'id_user'  => $token,
            'id_figure'=> $token,
            'so_luong' => "1",
        ]);

        // Trả về kết quả
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm sản phẩm vào giỏ hàng'
        ]);
    }
}
