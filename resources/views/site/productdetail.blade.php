@extends('site.template')
@section('content')



<div class="" style="padding: 30px 0">
    <div class="container">
        <div class="row">
        	<div class="col-md-12" style="padding: 80px 0 60px 0;">
			    <div class="" style="background: #CF9163;">
			        <nav style="padding: 10px;">
			        	<a href="{{route('getHome')}}">Home</a> <i class="fa fa-angle-right"></i> 
			        	<a href="#">Shop</a> <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
			        	{{$product->title}}
			        </nav>
			    </div>
			</div>
        </div>
        <div class="row">
            <div class="main-content col-md-12">
                <div class="dayuna-notices-wrapper"></div>
                <div id="{{$product->id}}" class="product">
                    <div class="main-contain-summary">
                        <div class="contain-left has-gallery">
                            <div class="single-left">
                                <p style="text-align: right;">
                                    <a href="#down" class="ajax_add_to_cart">View Down</a> 
                                </p>
                                <div class="dayuna-product-gallery dayuna-product-gallery--with-images dayuna-product-gallery--columns-4 images">
                                    <a href="#" class="dayuna-product-gallery__trigger">
                                        <img draggable="false" class="emoji" alt="🔍"
                                             src="https://s.w.org/images/core/emoji/11/svg/1f50d.svg"></a>
                                    <div class="flex-viewport">
                                        <figure class="dayuna-product-gallery__wrapper">
                                        	<div class="dayuna-product-gallery__image">
                                                <img alt="img" src="{{ asset('site/product/'.$product->photo) }}">
                                            </div>
                                        	@foreach($productphotos as $pphoto)
                                            <div class="dayuna-product-gallery__image">
                                                <img alt="img" src="{{ asset('site/product/'.$pphoto->photo) }}">
                                            </div>
                                            @endforeach
                                        </figure>
                                    </div>
                                    <ol class="flex-control-nav flex-control-thumbs">
                                    	<li>
                                    		<img src="{{ asset('site/product/'.$product->photo) }}" alt="{{$product->title}}">
                                    	</li>
                                    	@foreach($productphotos as $pphoto)
                                        <li>
                                        	<img src="{{ asset('site/product/'.$pphoto->photo) }}" alt="{{$product->title}}">
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div id="down" class="summary entry-summary">
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <h1 class="product_title entry-title">{{$product->title}}</h1>
                                 @if($product->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$product->rcost}} 
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol"> RM</span> {{$product->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$product->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                <p class="stock in-stock">
                                    Availability: <span> In stock</span>
                                </p>
                                <div class="dayuna-product-details__short-description">
                                    <p>{{$product->detail}}</p>
                                </div>

                                <form action="{{route('postAddCart')}}" method="POST" class="variations_form cart">
                                	@csrf()
                                	<div class="row">
                                	<div class="col-md-6">
                                        <?php $getcolor = App\Models\Productcolor::where('product_id', $product->id);  ?>
                                                @if($getcolor->count())
                                    <table class="variations">
                                        <tbody>
                                        <tr>
                                            <td class="label"><label>Color</label></td>
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
                                    @else
                                    <br />
                                    @endif
                                	</div>
                                	<div class="col-md-6">
                                		Size
                                		<ul class="sizebox">
                                            <?php $getsize = App\Models\Productsize::where('product_id', $product->id);  ?>
                                			@if($getsize->count())
                                                    @foreach($getsize->get() as $psize)
                                                    <li><a href="">{{$psize->size}}</a></li>
                                                    @endforeach
                                                    @else
                                                    <li>Free Size</li>
                                                    @endif
                                		</ul>
                                	</div>
                                </div>
                                    <div class="single_variation_wrap" style="margin-top: 10px;">
                                        <div class="dayuna-variation single_variation"></div>
                                        <div class="dayuna-variation-add-to-cart variations_button ">
                                            <div class="quantity">
                                                <span class="qty-label">Quantiy:</span>
                                                <div class="control">
                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                    <input type="text" data-step="1" min="1" max="" name="qty" title="Qty" class="input-qty input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" value="1" required>
                                                    <a class="btn-number qtyplus quantity-plus" href="#">+</a>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$product->id}}" name="productid">

                                            <button type="submit"
                                                    class="single_add_to_cart_button button alt dayuna-variation-selection-needed">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button show">
                                        <a href="#" rel="nofollow"
                                           data-product-id="27" data-product-type="variable" class="add_to_wishlist">
                                            Add to Wishlist</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="product_meta">
                                    <span class="sku_wrapper">SKU: <span class="sku">{{$product->code}}</span></span>
                                    <span class="posted_in">Categories:
                                    	@php $getcatagory = App\Models\Catagory::where('id', $product->catagory_id)->limit(1)->first(); @endphp
                                    	<a href="#" rel="tag">{{$getcatagory->title}}</a>
                                    </span>
                                </div>
                                <div class="dayuna-share-socials">
                                    <h5 class="social-heading">Share: </h5>
                                    <a target="_blank" class="facebook" href="#">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a target="_blank" class="twitter"
                                       href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a target="_blank" class="pinterest"
                                       href="#"> <i class="fa fa-pinterest"></i>
                                    </a>
                                    <a target="_blank" class="googleplus"
                                       href="#"><i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dayuna-tabs dayuna-tabs-wrapper">
                        <ul class="tabs dreaming-tabs" role="tablist">
                            <li class="description_tab active" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="#tab-description">Description</a>
                            </li>
                            <li class="additional_information_tab" id="tab-title-additional_information" role="tab"
                                aria-controls="tab-additional_information">
                                <a href="#tab-additional_information">Additional information</a>
                            </li>
                            <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                <a href="#tab-reviews">Reviews (0)</a>
                            </li>
                        </ul>
                        <div class="dayuna-Tabs-panel dayuna-Tabs-panel--description panel entry-content dayuna-tab"
                             id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                            <h2>Description</h2>
                            <div class="container-table">
                                <div class="container-cell">
                                    <h2 class="az_custom_heading">{{$product->title}}<br>{{$getcatagory->title}}</h2>
                                    <p>{{$product->detail}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="dayuna-Tabs-panel dayuna-Tabs-panel--additional_information panel entry-content dayuna-tab"
                             id="tab-additional_information" role="tabpanel"
                             aria-labelledby="tab-title-additional_information">
                            <h2>Additional information</h2>
                            <p>{{$product->additionalinformation}}</p>
                        </div>
                        <div class="dayuna-Tabs-panel dayuna-Tabs-panel--reviews panel entry-content dayuna-tab"
                             id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                            <div id="reviews" class="dayuna-Reviews">
                                <div id="comments">
                                    <h2 class="dayuna-Reviews-title">Reviews</h2>
                                    <p class="dayuna-noreviews">There are no reviews yet.</p>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            <span id="reply-title" class="comment-reply-title">Be the first to review “{{$product->title}}”</span>
                                            <form id="commentform" class="comment-form">
                                                <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>
                                                    Required fields are marked <span class="required">*</span></p>
                                                <p class="comment-form-author">
                                                    <label for="author">Name&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input id="author" name="author" value="" size="30" required=""
                                                           type="text"></p>
                                                <p class="comment-form-email"><label for="email">Email&nbsp;
                                                    <span class="required">*</span></label>
                                                    <input id="email" name="email" value="" size="30" required=""
                                                           type="email"></p>
                                                <div class="comment-form-rating"><label for="rating">Your rating</label>
                                                    <p class="stars">
                                                        <span>
                                                        <a class="star-1" href="#">1</a>
                                                        <a class="star-2" href="#">2</a>
                                                        <a class="star-3" href="#">3</a>
                                                        <a class="star-4" href="#">4</a>
                                                        <a class="star-5" href="#">5</a>
                                                        </span>
                                                    </p>
                                                    <select title="product_cat" name="rating" id="rating" required=""
                                                            style="display: none;">
                                                        <option value="">Rate…</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very poor</option>
                                                    </select></div>
                                                <p class="comment-form-comment"><label for="comment">Your
                                                    review&nbsp;<span class="required">*</span></label><textarea
                                                        id="comment" name="comment" cols="45" rows="8"
                                                        required=""></textarea></p><input name="wpml_language_code"
                                                                                          value="en" type="hidden">
                                                <p class="form-submit"><input name="submit" id="submit" class="submit"
                                                                              value="Submit" type="submit"> <input
                                                        name="comment_post_ID" value="27" id="comment_post_ID"
                                                        type="hidden">
                                                    <input name="comment_parent" id="comment_parent" value="0"
                                                           type="hidden">
                                                </p></form>
                                        </div><!-- #respond -->
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($rproducts->count())
            <div class="col-md-12 col-sm-12 dreaming_related-product">
                <div class="block-title">
                    <h2 class="product-grid-title">
                        Related Products
                        <span></span>
                    </h2>
                </div>
                <div class="owl-slick owl-products equal-container better-height"
                     data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                     data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                    @foreach($rproducts as $rproduct)
                    <div class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="{{route('getProductDetail', $rproduct->slug)}}">
                                                <img class="img-responsive" src="{{ asset('site/product/'.$rproduct->photo) }}" alt="{{$rproduct->title}}" width="270" height="350">
                                            </a>
                                            <div class="flash">
                                                @if($rproduct->dcost != null)
                                                <span class="onsale"><span class="text">Discount</span></span>
                                                @endif
                                                @if($rproduct->new == 'Y')
                                                <span class="onsale"><span class="text">New</span></span>
                                                @endif
                                                @if($rproduct->collection == 'Y')
                                                <span class="onsale"><span class="text">Collection</span></span>
                                                @endif
                                                @if($rproduct->featured == 'Y')
                                                <span class="onsale"><span class="text">Featured</span></span>
                                                @endif
                                            </div>
                                            <form class="variations_form cart">
                                                <?php $getcolor = App\Models\Productcolor::where('product_id', $rproduct->id);  ?>
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
                                                    <a href="{{route('getProductDetail', $rproduct->slug)}}" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h2 class="product-name product_title" style="text-align: center;">
                                                <a href="{{route('getProductDetail', $rproduct->slug)}}">{{$product->title}}</a>
                                            </h2>
                                            <?php $getsize = App\Models\Productsize::where('product_id', $rproduct->id);  ?>
                                            
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
                                                @if($rproduct->dcost != null)
                                            <span class="price">
                                                <del>
                                                    <span class="dayuna-Price-amount amount">
                                                        <span class="dayuna-Price-currencySymbol">RM</span>{{$rproduct->rcost}}
                                                    </span>
                                                </del>
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$rproduct->dcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @else
                                            <span class="price">
                                                <ins>
                                                    <span class="dayuna-Price-amount amount" style="font-size: 22px;">
                                                        <span class="dayuna-Price-currencySymbol">RM</span> {{$rproduct->rcost}}
                                                    </span>
                                                </ins>
                                            </span>
                                            @endif
                                            </div>
                                            <div class="addtocart">
                                            <a href="{{route('getProductDetail', $rproduct->slug)}}" class="">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@stop