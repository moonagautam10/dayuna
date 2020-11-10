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
                        <h5>Thank You for your order. We will review it and contact you as soon as possiable.</h5>
                        <h6>Thank You</h6>

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