<div class="main-nav">
    <div class="logo">
        @auth
            <a href="{{ URL::route('cart') }}">
                <i class="ri-shopping-cart-2-line"></i>
            </a>
            @if(isset($cartCount))
                <span id="cart-count" class="badge badge-light">{{ $cartCount }}</span>
            @endif
        @endauth
        @guest
            <span>Cart</span>
        @endguest
    </div>
    <div class="menu">
        <div class="item"><a href="{{ URL::route('main') }}">Home</a></div>
        <div class="item"><a href="{{ URL::route('products') }}">Shop</a></div>
    </div>
    <div class="right-side">
        @auth
            <div class="btn-group dropleft">
                <i id="user" class="profile ri-account-circle-line"></i>
                <div id="user-dropdown" class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="{{ URL::route('logout') }}">Logout</a>
                </div>
            </div>
        @endauth
        @guest
            <a href="{{ URL::route('login') }}">Log in</a>
        @endguest
    </div>
</div>
