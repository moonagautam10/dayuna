<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Slider;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Productphoto;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Shipping;
use Auth;


class SiteController extends Controller
{
    public function getWelcome(){
        return view('site.welcome');
    }
    public function getHome(){

    	$data =[
    		'sliders'=>Slider::where('status', 'Y')->orderby('id', 'desc')->limit(6)->get(),
    		'products_new'=>Product::where('new', 'Y')->where('status', 'Y')->orderby('id', 'desc')->get(),
    		'products_collection'=>Product::where('collection', 'Y')->where('status', 'Y')->orderby('id', 'desc')->get(),
    		'products_featured'=>Product::where('featured', 'Y')->where('status', 'Y')->orderby('id', 'desc')->get(),
            'catagories'=>Catagory::limit(3)->get(),
            'bestsellings'=>DB::table('carts')
                ->selectRaw("products.id, COUNT('carts.*') as user_activitiesCount")
                ->join('products', 'products.id', '=', 'carts.product_id')
                ->groupBy('products.id')
                ->take(9)
                ->get(),
            'products'=>Product::limit(9)->get()
            ];
    	return view('site.home', $data);
    }
    public function getProductDetail($productSlug){
    	$getproductinfo = Product::where('slug', $productSlug)->limit(1)->first();

    	$data =[
    		'product'=>$getproductinfo,
    		'productphotos'=>Productphoto::where('product_id', $getproductinfo->id)->get(),
    		'rproducts'=>Product::where('catagory_id', $getproductinfo->catagory_id)->where('id', '!=', $getproductinfo->id)->get()
    	];
    	return view('site.productdetail', $data);
    }
   
    public function postAddCart(Request $request){
    	$productid = $request->input('productid');
    	$qty = $request->input('qty');
    	$product = Product::where('id', $productid)->limit(1)->first();
    	if($product->dcost == null){
    		$cost = $product->rcost;
    	}
    	else{
    		$cost = $product->dcost;
    	}
    	if(Session::get('cartcode')){
    		$cart_code = Session::get('cartcode');
    			DB::table('carts')->insert(
     				array(
            			'cart_code'     =>   $cart_code,
            			'product_id'   =>   $productid,
            			'cost'   =>   $cost,
            			'qty'   =>   $qty,
            			'totalamount'   => $qty*$cost
     					)
				);
    	}
    	else{
    		$cart_code = Str::random(5);

    		$cart = New Cart;
    		$cart->cart_code= $cart_code;
    		$cart->product_id = $productid;
    		$cart->cost = $cost;
    		$cart->qty = $qty;
    		$cart->totalamount =$qty*$cost;
    		$cart->save();
    		Session::put('cartcode', $cart_code);
    	}
    	return redirect()->route('getCart');
    }
    public function getCart(){
    	
    	return view('site.cart');
    	
    }
    public function getProductByCatagory($catagoryslug){
        $cat = Catagory::where('slug', $catagoryslug)->limit(1)->first();
        $data = [
            'products'=>Product::where('catagory_id', $cat->id)->get(),
            'cat'=>$cat
        ];
        return view('site.productbycatagory', $data);
    }
    public function getDeleteCart(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }
    public function getCheckout(){
        if(Auth::check()){
            if(Session::get('cartcode')){

            $data=[
                'carts' => Cart::where('cart_code', Session::get('cartcode'))->get(),
                'totalamount'=>Cart::where('cart_code', Session::get('cartcode'))->sum('totalamount'),
                'user'=>User::where('id', Auth::user()->id)->limit(1)->first(),
                'states'=>Shipping::all()
            ];

            
            return view('site.checkout', $data);
        }
        else
        {
            return redirect()->route('getHome');
        }
        }
        else{
            return redirect()->route('login');
        }
        
        
    }

    public function getProductByType($type){

            $data=[
                'products'=>Product::where($type, 'Y')->get(),
                'type'=>$type,
                'maxcost'=> Product::max('rcost'),
                'mincost'=> Product::min('rcost')

            ];
    
        return view('site.productlistbytype', $data);
    }
    


}
