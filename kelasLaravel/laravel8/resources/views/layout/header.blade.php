<!-- Header section -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a href="/" class="site-logo">
                        <img src="{{asset('divisima')}}/img/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <form class="header-search-form">
                        <input type="text" placeholder="Search on @yield('title') ....">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="user-panel">
                        @guest
                            <div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a href="{{ route('login') }}">Sign In </a> or <a href="{{ route('register') }}">Create Account</a>
                            </div>
                        @else
                            <div class="up-item">
                                <img src="{{ asset('images/users/' . Auth::user()->image)  }}" class="rounded-circle" alt="profile" width="30px" height="30px">
                                <a class="dropdown-toggel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    @if (Auth::user()->level === 'ADMIN')
                                        <a class="dropdown-item" href="/admin/users">Admin Page</a>
                                    @endif
                                    <a class="dropdown-item" href="/user/profile">My Account</a>
                                    <a class="dropdown-item" href="/user/order">My Order</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>
                                    <span>0</span>
                                </div>
                                <a href="/cart">Shopping Cart</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/Woman+Wear">Women</a></li>
                <li><a href="/Man+Wear">Men</a></li>
                <li><a href="#">Jewelry
                        <span class="new">New</span>
                    </a></li>
                <li><a href="/shoes">Shoes</a>
                    <ul class="sub-menu">
                        <li><a href="/shoes/sneaker">Sneakers</a></li>
                        <li><a href="/shoes/sandal">Sandals</a></li>
                        <li><a href="/shoes/formal">Formal Shoes</a></li>
                        <li><a href="/shoes/boot">Boots</a></li>
                        <li><a href="/shoes/Flip+Flops">Flip Flops</a></li>
                    </ul>
                </li>
                <li><a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="/product">Product Page</a></li>
                        <li><a href="/category">Category Page</a></li>
                        <li><a href="/cart">Cart Page</a></li>
                        <li><a href="/checkout">Checkout Page</a></li>
                        <li><a href="/contact">Contact Page</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- Header section end -->