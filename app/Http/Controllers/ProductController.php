<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\ProductPhoto;
use App\Models\Productcolor;
use App\Models\Productsize;


class ProductController extends Controller
{
    public function getProductManage(){
    	$data =[
    		'products'=>Product::orderby('id','desc')->get(),
    		'catagories'=>Catagory::all()
    	];
    	return view('admin.product.manage', $data);
    }
    public function postProductAdd(Request $request){
    	$title = $request->input('title');
    	$slug = Str::slug($title);
    	$catagory_id = $request->input('catagory_id');
    	$detail = $request->input('detail');
    	$additionalinformation = $request->input('additionalinformation');
    	$rcost = $request->input('rcost');
    	$dcost = $request->input('dcost');
    	$new = $request->input('new');
    	$featured = $request->input('featured');
    	$collection = $request->input('collection');
    	$photo = $request->file('photo');
    	$code = Str::random(4);
    	if($new == null){ $newvalue = '0'; } else { $newvalue = '1'; }
    	if($featured == null){ $featuredvalue = '0'; } else { $featuredvalue = '1'; }
    	if($collection == null){ $collectionvalue = '0'; } else { $collectionvalue = '1'; }

    		$getuniquename = sha1($photo->getClientOriginalName().time());
            $getextension = $photo->getClientOriginalExtension();
            $getrealname = $getuniquename.'.'.$getextension;
            $photo->move('site/product/', $getrealname);

            $product = New Product;
            $product->title = $title;
            $product->slug = $slug;
            $product->catagory_id = $catagory_id;
            $product->detail = $detail;
            $product->additionalinformation = $additionalinformation;
            $product->rcost = $rcost;
            $product->dcost = $dcost;
            $product->new = $newvalue;
            $product->featured = $featuredvalue;
            $product->collection = $collectionvalue;
            $product->photo = $getrealname;
            $product->code = $code;
            $product->save();
            return redirect()->back()->with('message', 'Product Added Success');

    }

    public function getProductPhotoAdd(Product $product){
    	$data =[
    		'product'=>$product,
    		'photos'=>Productphoto::orderby('id', 'desc')->where('product_id', $product->id)->get()
    	];
    	return view('admin.product.managephoto', $data);
    }
    public function postProductPhotoAdd(Request $request, $productid){
    	   $photo = $request->file('photo');
    		$getuniquename = sha1($photo->getClientOriginalName().time());
            $getextension = $photo->getClientOriginalExtension();
            $getrealname = $getuniquename.'.'.$getextension;
            $photo->move('site/product/', $getrealname);

            $store = New Productphoto;
            $store->photo = $getrealname;
            $store->product_id = $productid;
            $store->save();
            return redirect()->back()->with('message', 'Photo Added Success');
    }
    public function getDeleteProduct(Product $product){
        unlink('site/product/'.$product->photo);
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted Success');
    }
    public function getProductPhotoDelete(Productphoto $productphoto){
    	unlink('site/product/'.$productphoto->photo);
    	$productphoto->delete();
    	return redirect()->back()->with('message', 'Photo deleted Success');
    }
    public function getManageSizeColor(Product $product){
    	$data =[
    		'product'=>$product,
    		'sizes'=>Productsize::where('product_id', $product->id)->get(),
    		'colors'=>Productcolor::where('product_id', $product->id)->get()
    	];
    	return view('admin.product.managesizecolor', $data);
    }
    public function postProductColorAdd(Request $request, $product){
    	$color = $request->input('color');

    	$pcolor = New Productcolor;
    	$pcolor->color= $color;
    	$pcolor->product_id= $product;
    	$pcolor->save();
    	return redirect()->back()->with('message', 'Photo Color Added Success');
    }
    public function postProductSizeAdd(Request $request, $product){
    	$size = $request->input('size');

    	$psize = New Productsize;
    	$psize->size= $size;
    	$psize->product_id= $product;
    	$psize->save();
    	return redirect()->back()->with('message', 'Photo Size Added Success');
    }

    public function getDeleteProductSize(Productsize $size){
    	$size->delete();
    	return redirect()->back()->with('message', 'Product size delete Success');
    }
    public function getDeleteProductColor(Productcolor $color){
    	$color->delete();
    	return redirect()->back()->with('message', 'Product Color delete Success');
    }
    public function getProductEdit(Request $request, Product $product){
        $data=[
            'product'=>$product,
            'catagories'=>Catagory::all()
        ];
        return view('admin.product.edit',$data);
    }
    public function postProductEdit(Request $request , Product $product){
        $title = $request->input('title');
        $slug = Str::slug($title);
        $catagory_id = $request->input('catagory_id');
        $detail = $request->input('detail');
        $additionalinformation = $request->input('additionalinformation');
        $rcost = $request->input('rcost');
        $new = $request->input('new');
        $featured = $request->input('featured');
        $collection = $request->input('collection');
        $photo = $request->file('photo');
        if($new == null){ $newvalue = 'N'; } else { $newvalue = 'Y'; }
        if($featured == null){ $featuredvalue = 'N'; } else { $featuredvalue = 'Y'; }
        if($collection == null){ $collectionvalue = 'N'; } else { $collectionvalue = 'Y'; }


         $checked=Product::where('slug',$slug)->where('id','!=',$product->id)->count();
         if($checked == 0){
            if($photo){
                
            $getuniquename = sha1($photo->getClientOriginalName().time());
            $getextension = $photo->getClientOriginalExtension();
            $getrealname = $getuniquename.'.'.$getextension;
            $photo->move('site/product/', $getrealname);

           
            $product->title = $title;
            $product->slug = $slug;
            $product->catagory_id = $catagory_id;
            $product->detail = $detail;
            $product->additionalinformation = $additionalinformation;
            $product->rcost = $rcost;
            $product->new = $newvalue;
            $product->featured = $featuredvalue;
            $product->collection = $collectionvalue;
            $product->photo = $getrealname;
            $product->save();                

            }
            else{
            $product->title = $title;
            $product->slug = $slug;
            $product->catagory_id = $catagory_id;
            $product->detail = $detail;
            $product->additionalinformation = $additionalinformation;
            $product->rcost = $rcost;
            $product->new = $newvalue;
            $product->featured = $featuredvalue;
            $product->collection = $collectionvalue;
            $product->save(); 
            }
            return redirect()->back()->with('message', 'Photo Edited Success');

         }
         else{
             return redirect()->back()->with('message', 'Unable to edit. due to dublicate product title. Please change your title, which is unique from other product');

         }
    }
}
