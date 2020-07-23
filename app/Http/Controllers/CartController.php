<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function addProduct(Request $request) {
        $product = $request->post('product');
        $user = Auth::user();
        $user->cart()->attach($product);

        return \response()->json([
            'result' => 1
        ]);
    }

    public function cart() {
        $user = Auth::user();
        $cart = $user->cart;
        return view('shop/cart', [
            'cart' => $cart
        ]);
    }

    public function remove(Request $request) {
        $item = $request->post('item');
        $user = Auth::user();

        $user->cart()->detach($item);

        return \response()->json([
            'result' => 1
        ]);
    }

    public function getItemsCount() {
        $user = Auth::user();

        return \response()->json([
            'itemsCount' => count($user->cart)
        ]);
    }
}
