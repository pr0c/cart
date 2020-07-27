<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCategory;

class ShopController extends Controller {
    public function index() {
        return view('shop.index');
    }

    public function products($category = null) {
        if(is_null($category)) {
            $products = Product::all();
        }
        else {
            $products = ShopCategory::find($category)->products;
        }

        return view('shop.products', [
            'products' => $products,
            'category_id' => $category
        ]);
    }

    public function categories() {
        $categories = ShopCategory::with('child')->get();

        return view('shop.categories', [
            'categories' => $categories
        ]);
    }

    public function productInfo(Product $product) {
        $product->refresh();

        return view('shop.product', [
            'product' => $product
        ]);
    }
}
