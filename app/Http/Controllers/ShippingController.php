<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function getManageShipping(){
    	$data=[
    		'shippings'=>Shipping::Orderby('id','desc')->get(),
    	];
    	return view('admin.shipping.manage', $data);
    }
    public function postShippingAdd(Request $request){
    	$state = $request->input('state');
    	$cost = $request->input('cost');

    	$shipping = New Shipping;
    	$shipping->state = $state;
    	$shipping->cost = $cost;
    	$shipping->save();
    	return redirect()->back()->with('message', 'Shipping cost Added Success');

    }
    public function getShippingDelete(Shipping $shipping){
        $shipping->delete();
        return redirect()->back()->with('message', 'Shipping Deleted Success');
    }
     public function getShippingEdit(Request $request , Shipping $shipping){
        $data=[
            'shipping'=>$shipping
        ];
        return view('admin.shipping.edit',$data);
     }
     public function postShippingEdit(Request $request , Shipping $shipping){
        $state = $request->input('state');
        $cost = $request->input('cost');

        $shipping->state = $state;
        $shipping->cost = $cost;
        $shipping->save();
        return redirect()->back()->with('message', 'Shipping cost Edited Success');



     }
}
