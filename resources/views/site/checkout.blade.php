@extends('site.template')
@section('content')
<div class="banner-wrapper has_background">
    <img src="{{ asset('site/assets/images/banner-for-all2.jpg') }}" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">Checkout</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="{{route('getHome')}}"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Checkout</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="dayuna">
                        <div class="dayuna-notices-wrapper"></div>
                        <div class="checkout-before-top">
                            <div class="dayuna-checkout-login">
                                <div class="dayuna-form-login-toggle dayuna-form-toggle">
                                    <div class="dayuna-info">
                                        Returning customer? <a href="#" class="showlogin showbtn">Click here to login/Register</a></div>
                                </div>
                            </div>
                            <div class="dayuna-checkout-coupon">
                                <div class="dayuna-notices-wrapper"></div>
                                <div class="dayuna-form-coupon-toggle dayuna-form-toggle">
                                    <div class="dayuna-info">
                                        Have a coupon? <a href="#" class="showcoupon showbtn">Click here to enter your code</a>
                                    </div>
                                </div>
                                <form class="checkout_coupon dayuna-form-coupon dayuna-form-show" method="post"
                                      style="display:none">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <p class="form-row form-row-first">
                                        <input type="text" name="coupon_code" class="input-text"
                                               placeholder="Coupon code" id="coupon_code" value="">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                            Apply coupon
                                        </button>
                                    </p>
                                    <div class="clear"></div>
                                </form>
                            </div>
                        </div>
                        <form name="checkout" method="post" class="checkout dayuna-checkout" action="{{route('postOrder')}}">
                            @csrf()
                            <div class="col2-set" id="customer_details">
                                <div class="col-1">
                                    <div class="dayuna-billing-fields">
                                        <h3>Shipping details  - <a href="">Edit</a></h3>
                                        <div class="dayuna-billing-fields__field-wrapper">

                                           <p class="form-row form-row-wide address-field">
                                                <label class="">Full Name&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="dayuna-input-wrapper">
                                                    <input type="text" class="input-text" required name="name" value="{{$user->name}}">
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide address-field">
                                                <label class="">State&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="dayuna-input-wrapper">
                                                    <select class="input-text" required name="state" onchange="UpdateState()">
                                                       <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                        <option value="{{$state->state}}-{{$state->cost}}">{{$state->state}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </p>

                                            <p class="form-row form-row-wide address-field">
                                                <label class="">Address&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="dayuna-input-wrapper">
                                                    <input type="text" class="input-text" name="address" required value="{{$user->address}}">
                                                </span>
                                            </p>
                                            
                                            <p class="form-row form-row-wide">
                                                <label class="">Phone&nbsp;
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <span class="dayuna-input-wrapper">
                                                    <input type="number" class="input-text" name="phone" required value="{{$user->phone}}">
                                                </span>
                                            </p>
                                           </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="dayuna-shipping-fields">
                                    </div>
                                    <div class="dayuna-additional-fields">
                                        <h3>Additional information</h3>
                                        <div class="dayuna-additional-fields__field-wrapper">
                                            <p class="form-row notes" id="order_comments_field" data-priority="">
                                                <label class="">Order notes&nbsp;
                                                    <span class="optional">(optional)</span>
                                                </label>
                                                <span class="dayuna-input-wrapper">
                                                    <textarea name="comment" class="input-text "placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                </span>
                                            </p></div>
                                    </div>
                                </div>
                            </div>
                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="dayuna-checkout-review-order">
                                <table class="shop_table dayuna-checkout-review-order-table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $cart)
                                    <?php $getproduct = App\Models\Product::where('id', $cart->product_id)->limit(1)->first(); ?>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$getproduct->title}} &nbsp;&nbsp; <strong class="product-quantity">×
                                            {{$cart->qty}}</strong></td>
                                        <td class="product-total">
                                            <span class="dayuna-Price-amount amount"><span
                                                    class="dayuna-Price-currencySymbol">RM </span>{{$cart->cost}}</span></td>
                                    </tr>
                                    @endforeach
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr class="">
                                            <th>Shipping Charge</th>
                                            <td style="text-align: right;"><strong><span class=""><span id="shippingcost"></span></span></strong></td>
                                            <input type="hidden" name="shippingcost" id="shippingcostinput" value="">
                                        </tr>

                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="dayuna-Price-amount amount"><span class="dayuna-Price-currencySymbol">RM </span><span id="grandtotal">{{$totalamount}}</span></span></strong>
                                            <input type="hidden" name="totalcost" value="{{$totalamount}}">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="lang" value="en">
                                <div id="payment" class="dayuna-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        
                                       <li class="wc_payment_method payment_method_cod">
                                            <input id="payment_method_cod" type="radio" class="input-radio" name="paymenttype" value="card">
                                            <label for="payment_method_cod">
                                                Card <img src="{{ asset('site/assets/images/AM_mc_vs_ms_ae_UK.png') }}" alt="card acceptance mark">
                                            </label>
                                            
                                        </li>
                                        <li class="wc_payment_method payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio" name="paymenttype" value="cod">
                                            <label for="payment_method_paypal">
                                                Cash on delivery </label>
                                        </li>
                                       
                                        
                                    </ul>
                                    <div class="form-row place-order">
                                        <button type="submit" class="button alt" name="dayuna_checkout_place_order"
                                                id="place_order" value="Place order" data-value="Place order">Place
                                            order
                                        </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
@section('js')
<script>

function UpdateState(){

    var statedata = document.getElementsByName("state")[0].value; 
    var splitCost = statedata.split("-");
    var stateShippingCostContent = 'RM '+parseInt(splitCost[1]);
    var stateShippingCost = parseInt(splitCost[1]);

    var totalcost = parseInt(document.getElementsByName("totalcost")[0].value);
    
    var grandtotal = stateShippingCost+totalcost;



    document.getElementById("shippingcostinput").value = stateShippingCost;
    document.getElementById("shippingcost").innerHTML = stateShippingCostContent;
    document.getElementById("grandtotal").innerHTML = grandtotal;
}
</script>
@stop