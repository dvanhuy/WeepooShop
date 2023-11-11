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
    public function add(AddCardRequest $request){
        // Xử lý dữ liệu
        $existsCart = Cart::where('id_user', $request->id_user)
            ->where('id_figure',  $request->id_figure)
            ->get();
        if($existsCart->count() == 0)
        {
            Cart::create($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng'
            ]);
        };

        // Trả về kết quả
        return response()->json([
            'success' => false,
            'message' => 'Đã tồn tại trong giỏ hàng'
        ]);
    }
}