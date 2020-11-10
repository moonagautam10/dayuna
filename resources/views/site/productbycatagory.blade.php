@extends('site.template')
@section('content')
<div class="banner-wrapper has_background">
    <img src="{{ asset('site/assets/images/banner-for-all2.jpg') }}" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">{{$cat->title}}</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="{{route('getHome')}}"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Shop</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="main-container shop-page no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class=" auto-clear dayuna-products">
                    <ul class="row products columns-3">
                        @foreach($products as $product)
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-ts-6 style-01" data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <<div class="product-inner tooltip-left">
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
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop