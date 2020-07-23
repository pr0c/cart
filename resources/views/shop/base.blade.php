@extends('main')

@php
    if(!isset($category_id)) $category_id = null;
@endphp

@section('content')
    <div class="shop-content">
        @yield('shop-content', 'Shop')
        @yield('right-nav', View::make('shop.categories')->with('category_id', $category_id))
    </div>
@endsection
