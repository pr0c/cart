@extends('shop.base')

@section('content')
    @if($cart->count() > 0)
        <div class="cart g-table">
            @foreach($cart as $item)
            <div id="{{ $item->id }}" class="item">
                <div class="image">
                    <img src="{{ asset('images/products/' . $item->image) }}" alt="product">
                </div>
                <div class="title">{{ $item->title }}</div>
                <div class="price">${{ $item->cost }}</div>
                <div class="control"><i class="linked cart-remove ri-delete-bin-line"></i></div>
            </div>
            @endforeach
        </div>
    @endif
@endsection
