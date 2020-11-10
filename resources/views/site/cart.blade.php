@extends('site.template')
@section('content')
<div class="banner-wrapper has_background">
    <img src="{{ asset('site/assets/images/banner-for-all2.jpg') }}" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">Cart</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="{{route('getHome')}}"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Cart</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-container shop-page right-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                <div class="page-main-content">
                    <div class="dayuna">
                        <div class="dayuna-notices-wrapper"></div>
                        @if(Session::get('cartcode'))
                        <?php
                        $getcarts = App\Models\Cart::where('cart_code', Session::get('cartcode'))->get();
                        $grandtotal = App\Models\Cart::where('cart_code', Session::get('cartcode'))->sum('totalamount');
                        ?>
                        
                        <form class="dayuna-cart-form">
                            <table class="shop_table shop_table_responsive cart dayuna-cart-form__contents"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getcarts as $cart)
                                	<?php $getproduct = App\Models\Product::where('id', $cart->product_id)->limit(1)->first(); ?>
                                <tr class="dayuna-cart-form__cart-item cart_item">
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{asset('site/product/'.$getproduct->photo	)}}" class="attachment-lynessa_thumbnail size-lynessa_thumbnail"
                                                alt="img" width="600" height="778"></a></td>
                                    <td class="product-name" data-title="Product">
                                        <a href="#">{{$getproduct->title}}</a></td>
                                    <td class="product-price" data-title="Price">
                                        <span class="dayuna-Price-amount amount"><span
                                                class="dayuna-Price-currencySymbol">RM </span>{{$cart->cost}}</span></td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">
                                            <span class="qty-label">Quantiy:</span>
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" value="{{$cart->qty}}" title="Qty" class="input-qty input-text qty text">
                                                <a class="btn-number qtyplus quantity-plus" href="#">+</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        <span class="dayuna-Price-amount amount">
                                            <span class="dayuna-Price-currencySymbol">RM </span>{{$cart->totalamount}}</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="" class="custom-button">Update</a>
                                        <a href="{{route('getDeleteCart', $cart->id)}}" class="remove">×</a>
                                       </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                        
                        
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart totals</h2>
                                <table class="shop_table shop_table_responsive" cellspacing="0">
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="dayuna-Price-amount amount"><span
                                                class="dayuna-Price-currencySymbol">RM </span>{{$grandtotal}}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span
                                                class="dayuna-Price-amount amount"><span
                                                class="dayuna-Price-currencySymbol">RM </span>{{$grandtotal}}</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="dayuna-proceed-to-checkout">
                                    <a href="{{route('getCheckout')}}"
                                       class="checkout-button button alt dayuna-forward">
                                        Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                        @else
                         Card Empty
                        @endif
                    </div>
                </div>
            </div>
            <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                <div id="widget-area" class="widget-area shop-sidebar">
                    <div id="lynessa_product_categories-3" class="widget lynessa widget_product_categories">
                        <h2 class="widgettitle">Product categories<span class="arrow"></span></h2>
                        <ul class="product-categories">
                            <?php
                                $new = App\Models\Product::where('new', 'Y')->count();
                                $collection = App\Models\Product::where('collection', 'Y')->count();
                                $featured = App\Models\Product::where('featured', 'Y')->count();
                            ?>
                            <li class="cat-item">
                                <a href="{{route('getProductByType', 'new')}}">
                                    <label>
                                        <span>New Arrivals</span>
                                        <span class="count">{{$new}}</span>
                                    </label>
                                </a>
                            </li>
                            <li class="cat-item">
                                <a href="{{route('getProductByType', 'collection')}}">
                                    <label>
                                        <span>Collection</span>
                                        <span class="count">{{$collection}}</span>
                                    </label>
                                </a>
                            </li>
                            <li class="cat-item">
                                <a href="{{route('getProductByType', 'featured')}}">
                                    <label>
                                        <span>Featured</span>
                                        <span class="count">{{$featured}}</span>
                                    </label>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop