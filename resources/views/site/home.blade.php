@extends('site.template')
@section('content')
<div class="fullwidth-template">
<div class="slide-home-04">
        <div class="response-product product-list-owl owl-slick equal-container better-height"
             data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:0,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:1}"
             data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}}]">
             @foreach($sliders as $slider)
            <div class="slide-wrap">
                <img src="{{ asset('site/slider/'.$slider->photo) }}" alt="Dayuna {{$slider->subtitle}}">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h2>{{$slider->subtitle}}</h2>
                            <h1>{{$slider->title}}</h1>
                            <a href="{{$slider->link}}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="section-013 section-001">
        <div class="container">
            <div class="row">
                @foreach($catagories as $catagory1)
                <div class="col-md-4">
                    <div class="dayuna-banner style-03 left-center">
                        <div class="banner-inner">
                            <figure class="banner-thumb">
                                <img src="{{ asset('site/catagory/'.$catagory1->photo) }}" class="attachment-full size-full" alt="img"></figure>
                            <div class="banner-info ">
                                <div class="banner-content">
                                    <div class="title-wrap">
                                        <h6 class="title">
                                            <a target="_self" href="{{route('getProductByCatagory', $catagory1->slug)}}">Show now</a>
                                        </h6>
                                    </div>
                                    <div class="cate">{{$catagory1->title}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="section-022">
        <div class="container">
            <div class="dayuna-tabs style-01">
                <div class="tab-head">
                    <ul class="tab-link equal-container " data-loop="1">
                        <li class="active">
                            <a class="loaded" data-ajax="0" data-animate="" data-section="new"
                               data-id="330" href="#new">
                                <span>New Arrival</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="" data-ajax="0" data-animate="" data-section="collection"
                               data-id="330" href="#collection">
                                <span>Collection</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="" data-ajax="0" data-animate="" data-section="featured"
                               data-id="330" href="#featured">
                                <span>Featured</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container">
                    <div class="tab-panel active" id="new">
                        <div class="dayuna-products style-01">
                            <div class="response-product product-list-grid row auto-clear equal-container better-height">
                                @foreach($products_new as $product)
                                <div class="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="{{route('getProductDetail', $product->slug)}}">
                                                <img class="img-responsive" src="{{ asset('site/product/'.$product->photo) }}" alt="{{$product->title}}" width="270" height="350">
                                            </a>
                                            <div class="flash">
                                                @if($product->dcost != null)
                                                <span class="onsale"><span class="text">Discount</span></span>
                                                @endif
                                                @if($product->new == 'Y')
                                                <span class="onsale"><span class="text">New</span></span>
                                                @endif
                                                @if($product->collection == 'Y')
                                                <span class="onsale"><span class="text">Collection</span></span>
                                                @endif
                                                @if($product->featured == 'Y')
                                                <span class="onsale"><span class="text">Featured</span></span>
                                                @endif
                                            </div>
                                            <form class="variations_form cart">
                                                <?php $getcolor = App\Models\Productcolor::where('product_id', $product->id);  ?>
                                                @if($getcolor->count())
                                                <table class="variations">
                                                    <tbody>
                                                        <tr>
                                                            <td class="value">
                                                                <div class="data-val attribute-pa_color"
                                                                     data-attributetype="box_style">
                                                                     @foreach($getcolor->get() as $pcolor)
                                                                    <label>
                                                                        <span class="change-value color"
                                                                              style="background: {{$pcolor->color}};"
                                                                              data-value="blue">
                                                                        </span>
                                                                    </label>
                                                                    @endforeach
                                                                </div>
                                                                <a class="reset_variations" href="#"
                                                                   style="visibility: hidden;">Clear</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                            </form>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="add-to-cart">
                                                    <a href="{{route('getProductDetail', $product->slug)}}" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h2 class="product-name product_title" style="text-align: center;">
                                                <a href="{{route('getProductDetail', $product->slug)}}">{{$product->title}}</a>
                                            </h2>
                                            <?php $getsize = App\Models\Productsize::where('product_id', $product->id);  ?>
                                            
                                            <div class="rating-wapper nostar" style="text-align: center;">
                                                <ul class="sizebox">
                                                    @if($getsize->count())
                                                    @foreach($getsize->get() as $psize)
                                                    <li>{{$psize->size}}</li>
                                                    @endforeach
                                                    @else
                                                    <li>Free Size</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div style="text-align: center; margin: 10px 0;">
                                                @if($product->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$product->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                            </div>
                                            <div class="addtocart">
                                            <a href="{{route('getProductDetail', $product->slug)}}" class="">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel" id="collection">
                        <div class="dayuna-products style-01">
                            <div class="response-product product-list-grid row auto-clear equal-container better-height">
                                @foreach($products_collection as $product)
                                <div class="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-ts-6">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="{{route('getProductDetail', $product->slug)}}">
                                                <img class="img-responsive" src="{{ asset('site/product/'.$product->photo) }}" alt="{{$product->title}}" width="270" height="350">
                                            </a>
                                            <div class="flash">
                                                @if($product->dcost != null)
                                                <span class="onsale"><span class="text">Discount</span></span>
                                                @endif
                                                @if($product->new == 'Y')
                                                <span class="onsale"><span class="text">New</span></span>
                                                @endif
                                                @if($product->collection == 'Y')
                                                <span class="onsale"><span class="text">Collection</span></span>
                                                @endif
                                                @if($product->featured == 'Y')
                                                <span class="onsale"><span class="text">Featured</span></span>
                                                @endif
                                            </div>
                                            <form class="variations_form cart">
                                                <?php $getcolor = App\Models\Productcolor::where('product_id', $product->id);  ?>
                                                @if($getcolor->count())
                                                <table class="variations">
                                                    <tbody>
                                                        <tr>
                                                            <td class="value">
                                                                <div class="data-val attribute-pa_color"
                                                                     data-attributetype="box_style">
                                                                     @foreach($getcolor->get() as $pcolor)
                                                                    <label>
                                                                        <span class="change-value color"
                                                                              style="background: {{$pcolor->color}};"
                                                                              data-value="blue">
                                                                        </span>
                                                                    </label>
                                                                    @endforeach
                                                                </div>
                                                                <a class="reset_variations" href="#"
                                                                   style="visibility: hidden;">Clear</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                            </form>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="add-to-cart">
                                                    <a href="{{route('getProductDetail', $product->slug)}}" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h2 class="product-name product_title" style="text-align: center;">
                                                <a href="{{route('getProductDetail', $product->slug)}}">{{$product->title}}</a>
                                            </h2>
                                            <?php $getsize = App\Models\Productsize::where('product_id', $product->id);  ?>
                                            
                                            <div class="rating-wapper nostar" style="text-align: center;">
                                                <ul class="sizebox">
                                                    @if($getsize->count())
                                                    @foreach($getsize->get() as $psize)
                                                    <li>{{$psize->size}}</li>
                                                    @endforeach
                                                    @else
                                                    <li>Free Size</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div style="text-align: center; margin: 10px 0;">
                                                @if($product->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$product->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                            </div>
                                            <div class="addtocart">
                                            <a href="{{route('getProductDetail', $product->slug)}}" class="">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-panel" id="featured">
                        <div class="dayuna-products style-01">
                           <div class="response-product product-list-grid row auto-clear equal-container better-height">
                                @foreach($products_featured as $product)
                                <div class="product-item recent-product style-01 rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-4 col-sm-12 col-ts-12">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="{{route('getProductDetail', $product->slug)}}">
                                                <img class="img-responsive" src="{{ asset('site/product/'.$product->photo) }}" alt="{{$product->title}}" width="270" height="350">
                                            </a>
                                            <div class="flash">
                                                @if($product->dcost != null)
                                                <span class="onsale"><span class="text">Discount</span></span>
                                                @endif
                                                @if($product->new == 'Y')
                                                <span class="onsale"><span class="text">New</span></span>
                                                @endif
                                                @if($product->collection == 'Y')
                                                <span class="onsale"><span class="text">Collection</span></span>
                                                @endif
                                                @if($product->featured == 'Y')
                                                <span class="onsale"><span class="text">Featured</span></span>
                                                @endif
                                            </div>
                                            <form class="variations_form cart">
                                                <?php $getcolor = App\Models\Productcolor::where('product_id', $product->id);  ?>
                                                @if($getcolor->count())
                                                <table class="variations">
                                                    <tbody>
                                                        <tr>
                                                            <td class="value">
                                                                <div class="data-val attribute-pa_color"
                                                                     data-attributetype="box_style">
                                                                     @foreach($getcolor->get() as $pcolor)
                                                                    <label>
                                                                        <span class="change-value color"
                                                                              style="background: {{$pcolor->color}};"
                                                                              data-value="blue">
                                                                        </span>
                                                                    </label>
                                                                    @endforeach
                                                                </div>
                                                                <a class="reset_variations" href="#"
                                                                   style="visibility: hidden;">Clear</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                            </form>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="add-to-cart">
                                                    <a href="{{route('getProductDetail', $product->slug)}}" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h2 class="product-name product_title" style="text-align: center;">
                                                <a href="{{route('getProductDetail', $product->slug)}}">{{$product->title}}</a>
                                            </h2>
                                            <?php $getsize = App\Models\Productsize::where('product_id', $product->id);  ?>
                                            
                                            <div class="rating-wapper nostar" style="text-align: center;">
                                                <ul class="sizebox">
                                                    @if($getsize->count())
                                                    @foreach($getsize->get() as $psize)
                                                    <li>{{$psize->size}}</li>
                                                    @endforeach
                                                    @else
                                                    <li>Free Size</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div style="text-align: center; margin: 10px 0;">
                                                @if($product->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$product->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                            </div>
                                            <div class="addtocart">
                                            <a href="{{route('getProductDetail', $product->slug)}}" class="">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-014">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="pe-7s-rocket"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">National Delivery</h4>
                                <div class="desc">
                                    we ship to all over the malaysia with reasonal delivery charge.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="pe-7s-unlock"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Safe Shipping</h4>
                                <div class="desc">Pay with the world’s most popular and secure payment methods.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="pe-7s-piggy"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">365 Days Return</h4>
                                <div class="desc">Round-the-clock assistance for a smooth shopping experience.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dayuna-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="pe-7s-help2"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Shop Confidence</h4>
                                <div class="desc">Our Buyer Protection covers your purchase from click to delivery.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="border-top-1"></div>
    </div>
    <div class="section-001 section-024">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dayuna-products style-06">
                        <h3 class="title">
                            <span>Best selling</span>
                        </h3>
                        <div class="response-product product-list-owl owl-slick equal-container better-height"
                             data-slick="{&quot;arrows&quot;:true,&quot;slidesMargin&quot;:30,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:3}"
                             data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                            @foreach($bestsellings as $bestselling)
                            <?php $bsproduct = App\Models\Product::where('id', $bestselling->id)->limit(1)->first(); ?>
                            <div class="product-item best-selling style-06 rows-space-30 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock first instock sale featured shipping-taxable purchasable product-type-simple">
                                <div class="product-inner">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                           href="#"
                                           tabindex="0">
                                            <img class="img-responsive"
                                                 src="{{ asset('site/product/'.$bsproduct->photo) }}"
                                                 alt="{{$bsproduct->title}}" width="90" height="90">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name product_title">
                                            <a href="#"
                                               tabindex="0">{{$bsproduct->title}}</a>
                                        </h3>
                                        <div class="rating-wapper nostar">
                                            <div class="star-rating"><span
                                                    style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                            <span class="review">(0)</span></div>
                                        <div style=" margin: 10px 0;">
                                                @if($bsproduct->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$bsproduct->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$bsproduct->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$bsproduct->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                        </div>
                                            
                                        <a href="{{route('getProductDetail', $bsproduct->slug)}}" class="">View Product</a>
                                            
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="dayuna-products style-06">
                        <h3 class="title">
                            <span>On Sale</span>
                        </h3>
                        <div class="response-product product-list-owl owl-slick equal-container better-height"
                             data-slick="{&quot;arrows&quot;:true,&quot;slidesMargin&quot;:30,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:3}"
                             data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                            @foreach($products as $sproduct)
                            <div class="product-item on_sale style-06 rows-space-30 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock first instock sale shipping-taxable purchasable product-type-simple">
                                <div class="product-inner">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                           href="#"
                                           tabindex="0">
                                            <img class="img-responsive"
                                                 src="{{ asset('site/product/'.$sproduct->photo) }}"
                                                 alt="{{$sproduct->title}}" width="90" height="90">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name product_title">
                                            <a href="#" tabindex="0">{{$sproduct->title}}</a>
                                        </h3>
                                        <div class="rating-wapper nostar">
                                            <div class="star-rating"><span
                                                    style="width:0%">Rated <strong
                                                    class="rating">0</strong> out of 5</span></div>
                                            <span class="review">(0)</span></div>
                                        <div style=" margin: 10px 0;">
                                                @if($sproduct->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$sproduct->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$sproduct->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$sproduct->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                        </div>
                                            
                                        <a href="{{route('getProductDetail', $sproduct->slug)}}" class="">View Product</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="dayuna-banner style-12 left-center">
                                <div class="banner-inner">
                                    <figure class="banner-thumb">
                                        <img src="{{ asset('site/assets/images/banner4-6.jpg') }}"
                                             class="attachment-full size-full" alt="img"></figure>
                                    <div class="banner-info ">
                                        <div class="banner-content">
                                            <div class="title-wrap">
                                                <h6 class="title">Neck Top</h6>
                                            </div>
                                            <div class="cate">Clothes Essential</div>
                                            <div class="button-wrap">
                                                <a class="button" target="_self"
                                                   href="#"><span>Show now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="dayuna-banner style-12 left-center">
                                <div class="banner-inner">
                                    <figure class="banner-thumb">
                                        <img src="{{ asset('site/assets/images/banner4-7.jpg') }}"
                                             class="attachment-full size-full" alt="img"></figure>
                                    <div class="banner-info ">
                                        <div class="banner-content">
                                            <div class="title-wrap">
                                                <h6 class="title">Smock dress</h6>
                                            </div>
                                            <div class="cate">New Collection</div>
                                            <div class="button-wrap">
                                                <a class="button" target="_self"
                                                   href="#"><span>Show now</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop