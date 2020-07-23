@extends('shop.base')

@section('shop-content')
    <div class="products">
        @foreach($products as $product)
        <div id="{{ $product->id }}" class="product card">
            <div class="title">{{ $product->title }}</div>
            <div class="image">
                <img src="{{ asset('images/products/' . $product->image) }}" alt="product">
            </div>
            <div class="bottom">
                <div class="cost">${{ $product->cost }}</div>
                <div class="to-cart">
                    <i class="add-to-cart ri-shopping-cart-2-line"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
