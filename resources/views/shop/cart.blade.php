@extends('shop.base')

@section('content')
    @if($cart->count() > 0)
        <div class="cart g-table">
            @foreach($cart as $item)
                @php
                    $count = $item->count();
                @endphp
            <div id="{{ $item->first()->id }}" class="item">
                <div class="image">
                    <img src="{{ asset('images/products/' . $item->first()->image) }}" alt="product">
                </div>
                <div class="title">{{ $item->first()->title }}</div>
                <div class="price">${{ $item->first()->cost }}{{ $count > 1 ? ' x ' . $count : '' }}</div>
                <div class="control"><i class="linked cart-remove ri-delete-bin-line"></i></div>
            </div>
            @endforeach
        </div>
    @endif
@endsection
