<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/chosen.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/pe-icon-7-stroke.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/jquery.scrollbar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/lightbox.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/magnific-popup.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/slick.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/fonts/flaticon.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/megamenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/dreaming-attribute.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/assets/css/style.css') }}"/>

    <title>Dayuna</title>
</head>
<body>
<header id="header" class="header style-02 header-dark header-sticky header-transparent">
    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-middle">
                <div class="dayuna-menu-wapper"></div>
                <div class="header-middle-inner">
                    <div class="header-search-menu">
                        <div class="block-menu-bar">
                            <a class="menu-bar menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div class="header-logo-nav">
                        <div class="header-logo">
                            <a href="{{route('getHome')}}"><img src="{{ asset('site/assets/images/logo.png') }}" class="logo"></a>
                            </div>
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu dayuna-clone-mobile-menu dayuna-nav main-menu">
                                <li class="menu-item">
                                    <a class="dayuna-menu-item-title" title="Home" href="{{route('getHome')}}">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a class="dayuna-menu-item-title" title="New Arrivals" href="{{route('getProductByType', 'new')}}">New Arrivals</a>
                                </li>
                                <li class="menu-item">
                                    <a class="dayuna-menu-item-title" title="Collection" href="{{route('getProductByType', 'collection')}}">Collection</a>
                                </li>
                                <li class="menu-item">
                                    <a class="dayuna-menu-item-title" title="Featured" href="{{route('getProductByType', 'featured')}}">Featured</a>
                                </li>
                                @php $getCatagories = App\Models\Catagory::where('status', 'Y')->get(); @endphp

                                @foreach($getCatagories as $getcatagory)
                                <li class="menu-item">
                                    <a class="dayuna-menu-item-title" title="{{$getcatagory->title}}" href="{{route('getProductByCatagory', $getcatagory->slug)}}">{{$getcatagory->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="header-control">
                        <div class="header-control-inner">
                            <div class="meta-dreaming">
                                <div class="header-search dayuna-dropdown">
                                    <div class="header-search-inner" data-dayuna="dayuna-dropdown">
                                        <a href="#" class="link-dropdown block-link">
                                            <span class="pe-7s-search"></span>
                                        </a>
                                    </div>
                                    <div class="block-search">
                                        <form role="search" method="get"
                                              class="form-search block-search-form dayuna-live-search-form">
                                            <div class="form-content search-box results-search">
                                                <div class="inner">
                                                    <input autocomplete="off" class="searchfield txt-livesearch input"name="s" value="" placeholder="Search here..." type="text">
                                                </div>
                                            </div>
                                           
                                            <button type="submit" class="btn-submit">
                                                <span class="pe-7s-search"></span>
                                            </button>
                                        </form><!-- block search -->
                                    </div>
                                </div>
                                <div class="dayuna-dropdown-close">x</div>
                                <div class="menu-item block-user block-dreaming dayuna-dropdown">
                                    <a class="block-link" href="{{route('login')}}">
                                        <span class="pe-7s-user"></span>
                                    </a>
                                    @if(Auth::check())
                                    <ul class="sub-menu">
                                        <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--orders">
                                            <a href="{{route('getUserOrder')}}">Orders</a>
                                        </li>
                                        <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--downloads">
                                            <a href="#">Profile</a>
                                        </li>
                                        <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--edit-address">
                                            <a href="#">Shipping Address</a>
                                        </li>
                                        <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--customer-logout">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                                @if(Session::get('cartcode'))
                                <div class="block-minicart block-dreaming dayuna-mini-cart dayuna-dropdown">
                                    <?php 
                                    $getcartdetail = App\Models\Cart::where('cart_code', Session::get('cartcode'))->get();
                                    $grandtotal = App\Models\Cart::where('cart_code', Session::get('cartcode'))->sum('totalamount');
                                    ?>

                                    <div class="shopcart-dropdown block-cart-link" data-dayuna="dayuna-dropdown">
                                        <a class="block-link link-dropdown" href="{{route('getCart')}}">
                                            <span class="pe-7s-shopbag"></span>
                                            <span class="count">{{$getcartdetail->count() }}</span>
                                        </a>
                                    </div>
                                    <div class="widget dayuna widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <h3 class="minicart-title">Your Cart<span class="minicart-number-items">{{$getcartdetail->count() }}</span></h3>
                                            <ul class="dayuna-mini-cart cart_list product_list_widget">
                                               @foreach($getcartdetail as $cat)
                                                <?php $getproductC = App\Models\Product::where('id', $cat->product_id)->limit(1)->first(); ?>
                                                <li class="dayuna-mini-cart-item mini_cart_item">
                                                    <a href="{{route('getDeleteCart', $cat->id)}}" class="remove remove_from_cart_button">×</a>
                                                    <a href="#">
                                                        <img src="{{ asset('site/product/'.$getproductC->photo) }}"
                                                             class="attachment-dayuna_thumbnail size-lynessa_thumbnail"
                                                             alt="img" width="600" height="778">{{$getproductC->title}} &nbsp;
                                                    </a>
                                                    <span class="quantity">{{$cat->qty}} × <span
                                                            class="dayuna-Price-amount amount"><span
                                                            class="dayuna-Price-currencySymbol">RM </span>{{$cat->cost}}</span></span>
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                            <p class="dayuna-mini-cart__total total"><strong>Subtotal:</strong>
                                                <span class="dayuna-Price-amount amount"><span
                                                        class="dayuna-Price-currencySymbol">RM</span>{{$grandtotal}}</span>
                                            </p>
                                            <p class="dayuna-mini-cart__buttons buttons">
                                                <a href="{{route('getCart')}}" class="button dayuna-forward">Viewcart</a>
                                                <a href="{{route('getCheckout')}}" class="button checkout dayuna-forward">Checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="block-minicart block-dreaming dayuna-mini-cart dayuna-dropdown">
                                    <div class="shopcart-dropdown block-cart-link" data-dayuna="dayuna-dropdown">
                                        <a class="block-link link-dropdown" href="{{route('getCart')}}">
                                            <span class="pe-7s-shopbag"></span>
                                            <span class="count">0</span>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search dayuna-dropdown">
                <div class="header-search-inner" data-dayuna="dayuna-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="pe-7s-search"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form role="search" method="get"
                          class="form-search block-search-form dayuna-live-search-form">
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="s" value=""
                                       placeholder="Search here..." type="text">
                            </div>
                        </div>
                        <input name="post_type" value="product" type="hidden">
                        
                        <button type="submit" class="btn-submit">
                            <span class="pe-7s-search"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="{{route('getHome')}}"><img alt="Dayuna" src="{{ asset('site/assets/images/logo.png') }}" class="logo"></a>
            </div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming dayuna-dropdown">
                        <a class="block-link" href="{{route('login')}}">
                            <span class="pe-7s-user"></span>
                        </a>
                         @if(Auth::check())
                        <ul class="sub-menu">
                            <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--orders">
                                <a href="{{route('getUserOrder')}}">Order History</a>
                            </li>
                            <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--downloads">
                                <a href="#">Profile</a>
                            </li>
                            <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--edit-address">
                                <a href="#">Shipping Address</a>
                            </li>
                            <li class="menu-item dayuna-MyAccount-navigation-link dayuna-MyAccount-navigation-link--customer-logout">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </li>
                        </ul>
                        @endif
                    </div>
                    @if(Session::get('cartcode'))
                    <div class="block-minicart block-dreaming dayuna-mini-cart dayuna-dropdown">      
                        <div class="shopcart-dropdown block-cart-link" data-dayuna="dayuna-dropdown">
                            <a class="block-link link-dropdown" href="{{route('getCart')}}">
                                <span class="pe-7s-shopbag"></span>
                                <span class="count">{{$getcartdetail->count() }}</span>
                            </a>
                        </div>
                        <div class="widget dayuna widget_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <h3 class="minicart-title">Your Cart<span class="minicart-number-items">{{$getcartdetail->count() }}</span></h3>
                                <ul class="dayuna-mini-cart cart_list product_list_widget">
                                     @foreach($getcartdetail as $cat)
                                                <?php $getproductC = App\Models\Product::where('id', $cat->product_id)->limit(1)->first(); ?>
                                                <li class="dayuna-mini-cart-item mini_cart_item">
                                                    <a href="{{route('getDeleteCart', $cat->id)}}" class="remove remove_from_cart_button">×</a>
                                                    <a href="#">
                                                        <img src="{{ asset('site/product/'.$getproductC->photo) }}"
                                                             class="attachment-dayuna_thumbnail size-lynessa_thumbnail"
                                                             alt="img" width="600" height="778">{{$getproductC->title}} &nbsp;
                                                    </a>
                                                    <span class="quantity">{{$cat->qty}} × <span
                                                            class="dayuna-Price-amount amount"><span
                                                            class="dayuna-Price-currencySymbol">RM </span>{{$cat->cost}}</span></span>
                                                </li>
                                                @endforeach
                                </ul>
                                <p class="dayuna-mini-cart__total total"><strong>Subtotal:</strong>
                                    <span class="dayuna-Price-amount amount"><span
                                            class="dayuna-Price-currencySymbol">RM</span>{{$grandtotal}}</span>
                                </p>
                                <p class="dayuna-mini-cart__buttons buttons">
                                    <a href="{{route('getCart')}}" class="button dayuna-forward">Viewcart</a>
                                    <a href="{{route('getCheckout')}}" class="button checkout dayuna-forward">Checkout</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="block-minicart block-dreaming dayuna-mini-cart dayuna-dropdown">      
                        <div class="shopcart-dropdown block-cart-link" data-dayuna="dayuna-dropdown">
                            <a class="block-link link-dropdown" href="{{route('getCart')}}">
                                <span class="pe-7s-shopbag"></span>
                                <span class="count">0</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

    @yield('content')

<footer id="footer" class="footer style-04">
    <div class="section-001 section-009">
        <div class="container">
            <div class="dayuna-newsletter style-01">
                <div class="newsletter-inner">
                    <div class="newsletter-info">
                        <div class="newsletter-wrap">
                            <h3 class="title">Newsletter<span></span></h3>
                            <h4 class="subtitle">Get Update Latest Products</h4>
                        </div>
                    </div>
                    <div class="newsletter-form-wrap">
                        <div class="newsletter-form-inner">
                            <input class="email email-newsletter" name="email" placeholder="Enter your email ..."
                                   type="email">
                            <a href="#" class="button btn-submit submit-newsletter">
                                <span class="text">Subscribe</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-025">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 d-lg-none">
                    <div class="logo-footer">
                        <img src="{{ asset('site/assets/images/logo.png') }}"
                             class="az_single_image-img attachment-full" alt="img">
                    </div>
                    <div class="footer-desc">dayuna helps you sell anything.<br/>
                        The best choice for your next personal
                    </div>
                    <div class="dayuna-socials style-01">
                        <div class="content-socials">
                            <ul class="socials-list">
                                <li>
                                    <a href="https://facebook.com/" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-listitem style-04">
                        <div class="listitem-inner">
                            <h4 class="title">Customer </h4>
                            <ul class="listitem-list">
                                <li>
                                    <a href="#" target=" _blank">
                                        Shipping &amp; Returns </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        Secure Shopping </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        Order Status </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        National Shipping </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="logo-footer">
                        <img src="{{ asset('site/assets/images/logo.png') }}"
                             class="az_single_image-img attachment-full" alt="img">
                    </div>
                    <div class="footer-desc">dayuna helps you sell anything.<br/>
                        The best choice for your next personal
                    </div>
                    <div class="dayuna-socials style-01">
                        <div class="content-socials">
                            <ul class="socials-list">
                                <li>
                                    <a href="https://facebook.com/" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-listitem style-04">
                        <div class="listitem-inner">
                            <h4 class="title">
                                Information </h4>
                            <ul class="listitem-list">
                                <li>
                                    <a href="#" target="_self">
                                        Privacy Policy </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        Customer Service </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        Orders and Returns </a>
                                </li>
                                <li>
                                    <a href="#" target="_self">
                                        Contact </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-016">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p> &copy; Copyright 2020 <a href="#">dayuna</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <div class="payment">
                        <img src="{{ asset('site/assets/images/payment.png') }}"
                             class="az_single_image-img attachment-full" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="{{route('getHome')}}">
					<span class="icon">
						<span class="pe-7s-home"></span>
					</span>
                Home
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-wishlist">
            <a href="">
					<span class="icon">
						<span class="pe-7s-like"></span>
					</span>
                Wishlist
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
            <a href="{{route('getCart')}}">
					<span class="icon">
						<span class="pe-7s-shopbag"></span>
						<span class="count-icon">
                            @if(Session::get('cartcode'))
                            <?php $getcartcount = App\Models\Cart::where('cart_code', Session::get('cartcode'))->count(); ?>
							 {{$getcartcount}}
                            @else
                             0
                            @endif
						</span>
					</span>
                <span class="text">Cart</span>
            </a>
        </div>
        @if(Auth::check())
        <div class="footer-device-mobile-item device-home device-user">
            <a href="">
					<span class="icon">
						<span class="pe-7s-user"></span>
					</span>
                Account
            </a>
        </div>
        @endif
    </div>
</div>
<a href="#" class="backtotop active">
    <i class="fa fa-angle-up"></i>
</a>
<script src="{{ asset('site/assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/assets/js/chosen.min.js') }}"></script>
<script src="{{ asset('site/assets/js/countdown.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('site/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('site/assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('site/assets/js/slick.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('site/assets/js/threesixty.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('site/assets/js/mobilemenu.js') }}"></script>
<script src="{{ asset('site/assets/js/functions.js') }}"></script>
@yield('js');
</body>
</html>