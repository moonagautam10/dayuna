<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Cart;
use GuzzleHttp\Client;
use DB;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getUserOrder(){
        $data =[
            'orders'=>Order::where('userid', Auth::user()->id)->get()
        ];
        return view('site.order', $data);
    }

    public function getAdminOrder(){
        
    }

    Public function postOrder(Request $request){
        $paymenttype = $request->input('paymenttype');
        $comment = $request->input('comment');

        $statedata = $request->input('state');
        $statedata_split = explode('-', $statedata);
        $state = $statedata_split[0];

        
        // get shipping cost

        $getshippingcost = Shipping::where('state', $state)->limit(1)->first();
        $shippingcost = $getshippingcost->cost;

        $userid = User::where('id', Auth::user()->id)->limit(1)->first();
        $cartcode = Session::get('cartcode');
        $totalcost = Cart::where('cart_code', Session::get('cartcode'))->sum('totalamount');

        $grandtotal = $shippingcost+$totalcost;

        if($paymenttype == 'cod'){
            $order = New Order;
            $order->userid = $userid->id;
            $order->cartcode = $cartcode;
            $order->paymenttype = $paymenttype;
            $order->totalcost = $totalcost;
            $order->name = $request->input('name');
            $order->state = $state;
            $order->address = $request->input('address');
            $order->phone= $request->input('phone');
            $order->comment= $request->input('comment');
            $order->shippingcost= $shippingcost;
            $order->grandtotal = $grandtotal;
            $order->save();
            Session::forget('cartcode');
            return redirect()->route('getUserOrder')->with('message', 'Thank you for your order');
        }
        else{
            $order = New Order;
            $order->userid = $userid->id;
            $order->cartcode = $cartcode;
            $order->paymenttype = $paymenttype;
            $order->totalcost = $totalcost;
            $order->name = $request->input('name');
            $order->state = $state;
            $order->address = $request->input('address');
            $order->phone= $request->input('phone');
            $order->comment= $request->input('comment');
            $order->shippingcost= $shippingcost;
            $order->grandtotal = $grandtotal;
            $order->save();

        $merchant_id = env('SENANGPAY_MERCHANT_ID', '');
        $secretkey = env('SENANGPAY_SECRET', '');
        $order_id = $cartcode;
        $detail = 'Dayuna Coth Shopping';
        $name1 = $userid->name;
        $email = $userid->email;
        $phone = $userid->phone;
        $amount = $grandtotal;



        $hashed_string = md5($secretkey.urldecode($detail).urldecode($amount).urldecode($order_id));
        $posturl = 'https://app.senangpay.my/payment/'.$merchant_id;
        $client = new Client();
        
                $response = $client->post($posturl, [
                    'form_params' => [
                    'detail' => $detail,
                    'amount' => $amount,
                    'order_id' => $order_id,
                    'name' => $name1,
                    'email' => $email,
                    'phone' => $phone,
                    'hash' => $hashed_string,
                ]

                ]);

           
                return $response->getBody();
            

        }
            
            


    }

     public function getSenangpayStatus(Request $request){
        $secretkey = env('SENANGPAY_SECRET', '');
        $status_id = $request->status_id;
        $order_id = $request->order_id;
        $transaction_id= $request->transaction_id;
        $msg = $request->msg;
        $hash = $request->hash;
        $cartcode = Session::get('cartcode');
        

        $hashed_string = md5($secretkey.urldecode($status_id).urldecode($order_id).urldecode($transaction_id).urldecode($msg));
        if($hashed_string == $hash){
            if(urldecode($request->status_id) == '1'){
                 DB::table('orders')->where('cartcode', $cartcode)->update(['status'=> 'Y', 'updated_at' => date('Y-m-d'), 'payerid' => $transaction_id]);
              
            return redirect()->route('getUserOrder')->with('message', 'Thank you for your order');

            }
            else{
                return redirect()->route('getCheckout')->with('message', 'Unable to success payment. Somethink wrong, try again');
            }
        }
        else{
            return redirect()->route('getCheckout')->with('message', 'Unable to success payment. Somethink wrong, try again');
        }
    }

    

    public function getOrderComplate(){
        return view('site.order');
    }
}
