<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use App\SellerProduct;
use App\DeliveryAddress;
use App\Mail\NewOrder;
use App\Mail\NewOrderBuyer;
use App\Order;
use App\OrderProduct;
use App\PaymentOption;
use App\Seller;
use function auth;
use function compact;
use function dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $carts= Cart::where('buyer_id', auth()->user()->buyer->id)->whereHas('product')->get();
        $paymentOptions = PaymentOption::all();
        return view('cart.index', compact(['paymentOptions', 'carts']));
    }

    public function edit($id) {
        $cart = Cart::findOrFail($id);
        $sellerProduct = SellerProduct::findOrFail($cart->seller_product_id);
        return view('cart.edit', compact('cart', 'sellerProduct'));
    }
    
    public function update(Request $request)
    {
        $cart = Cart::where([
            'product_id' => $request->product_id,
            'buyer_id' => auth()->user()->buyer->id,
            'seller_id' => $request->seller_id,
            'seller_product_id' => $request->seller_product_id,
        ])->get()->last();

        if ($cart) {
            $seller_product = SellerProduct::findOrFail($request->seller_product_id);

            // Check if the new quantity is greater or less than the old quantity
            $oldQuantity = $cart->quantity;
            $newQuantity = $request->quantity;
            $quantityDiff = $newQuantity - $oldQuantity;

            // Update the cart with the new quantity and total
            $cart->update([
                'quantity' => $newQuantity,
                'total' => $newQuantity * $seller_product->price,
            ]);

            // Update the stock of the related seller product
            $newStock = $seller_product->stock - $quantityDiff;
            $seller_product->update([
                'stock' => $newStock,
            ]);

            return redirect(route('cart.index'))->with(['message' => 'Cart info updated', 'response' => 'success']);
        }

        $seller_product = SellerProduct::findOrFail($request->seller_product_id);
        return view('cart.index', compact('seller_product'));
    }




    public function delete($id)
    {

        $delete =  Cart::where('id', $id)->delete();

        if($delete){
            $response = ['response' => 'success', 'message' => 'Item was deleted'];
        }else {
            $response = ['response' => 'error', 'message' => 'Opps! Something went wrong'];
        }

        return response()->json($response);

//        return view('cart.index', compact(['paymentOptions']));
    }

    public function checkout(Request $request)
    {



        $carts = Cart::whereIn('id', $request->cart_ids)->get()->groupBy('seller_id');

        session()->put('carts', $carts);
        session()->put('cart_ids', $request->cart_ids);


        return redirect(route('cart.checkout.chooseDeliveryAddress'));
    }



    public function chooseDeliveryAddress(){

//        dd(session()->get('carts'));

        return view('cart.chooseDeliveryAddress', compact([]));
    }

    public function selectDeliveryAddress(Request $request){

        $validate = $request->validate([
            'delivery_address' => 'required',
        ]);

        if($request->delivery_address == 'others'){
            $validate = $request->validate([
                "stnumber" => ['required'],
                "stname" => ['required'],
                "city" => ['required'],
                "barangay" => ['required'],
                "province" => ['required'],
                "country" => ['required'],
                "zip" => ['required'],
                "longitude" => '',
                "latitude" => '',
            ]);


            $delivery_detail = [
                'stnumber' => $request->stnumber,
                'stname' => $request->stname,
                'barangay' => $request->barangay,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'zip' => $request->zip,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'buyer_id' => auth()->user()->buyer->id
            ];



        }else{

            $deliveryAddress = DeliveryAddress::find($request->delivery_address);

            $delivery_detail   =    [
                        'stnumber' => $deliveryAddress->stnumber,
                        'stname' => $deliveryAddress->stname,
                        'barangay' => $deliveryAddress->barangay,
                        'city' => $deliveryAddress->city,
                        'province' => $deliveryAddress->province,
                        'country' => $deliveryAddress->country,
                        'zip' => $deliveryAddress->zip,
                        'longitude' => $deliveryAddress->longitude,
                        'latitude' => $deliveryAddress->latitude,
                        'buyer_id' => auth()->user()->buyer->id
                    ];
        }


        session()->put('delivery_detail', $delivery_detail);

        return redirect(route('cart.checkout.choosePaymentMethod'));

    }

    public function choosePaymentMethod()
    {

        $paymentOptions = PaymentOption::all();
        return view('cart.choosePaymentMethod', compact(['paymentOptions']));
    }


    public function selectPaymentMethod(Request $request){


        $carts = session()->get('carts');


        $deliver_detail =  session()->get('delivery_detail');


        foreach ($carts as $cart) {

            $transaction_id = $cart->first()->seller_id.uniqid();
            //get_price

            $total = '';

            foreach ($cart as $item){

                $total = (int)$total +  (int)$item->total;

            }

            $order = Order::create([
                'buyer_id' => auth()->user()->buyer->id,
                'seller_id' => $cart->first()->seller_id,
                'transaction_id' => $transaction_id,
                'total' => $total,
                'status' => 'pending',
                'payment_option_id' => $request->payment_method,
            ]);
//
//
            if($order->save()){

                $order->order_delivery_detail()->create(
                    [
                        'stnumber' => $deliver_detail['stnumber'],
                        'stname' => $deliver_detail['stname'],
                        'barangay' => $deliver_detail['barangay'],
                        'city' => $deliver_detail['city'],
                        'province' => $deliver_detail['province'],
                        'country' => $deliver_detail['country'],
                        'zip' => $deliver_detail['zip'],
                        'longitude' => $deliver_detail['longitude'],
                        'latitude' => $deliver_detail['latitude'],
                        'buyer_id' => auth()->user()->buyer->id
                    ]
                );
//
                $order->order_statuses()->create( [
                    'status_id' => 1
                 ]);
                foreach ($cart as $item){
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'buyer_id' => $item->buyer_id,
                        'seller_id' => $item->seller_id,
                        'seller_product_id' => $item->seller_product_id,
                        'quantity' => $item->quantity,
                        'total' => $item->total,
                        'status' => 'pending',

                    ]);
                }
//
                $seller = Seller::find($cart->first()->seller_id);
                try{
                    Mail::to($seller->user->email)->send(new NewOrder($order));
                    Mail::to(auth()->user()->email)->send(new NewOrderBuyer($order));
                }catch (Exception $e) {
                    //dd("Error: ". $e->getMessage());
                }

                if($seller->user->mobile !== ''){


                    $receiverNumber = '+63'.$seller->user->mobile;
                    $message = "New Order has been placed. Click this link to view order " . route('buyer.orders.find', ['order_id' => $order->transaction_id]);
                    if (preg_match("~^9\d+$~", $seller->user->mobile)) {
                        try {


                            /*$account_sid = env("TWILIO_SID");
                            $auth_token = env("TWILIO_TOKEN");
                            $twilio_number = env("TWILIO_FROM");

                            $client = new Client($account_sid, $auth_token);
                            $client->messages->create($receiverNumber, [
                                'from' => $twilio_number,
                                'body' => $message]);*/

                            //////dd('SMS Sent Successfully.');

                        } catch (Exception $e) {
                            //dd("Error: ". $e->getMessage());
                        }

                    }else{


                    }
                }

                if(auth()->user()->mobile !== ''){


                    $receiverNumber = '+63'.auth()->user()->mobile;
                    $message = "You've just placed an order. Click this link to view order " . route('buyer.orders.find', ['order_id' => $order->transaction_id]);
                    if (preg_match("~^9\d+$~", auth()->user()->mobile)) {
                        try {


                           $account_sid = env("TWILIO_SID");
                            $auth_token = env("TWILIO_TOKEN");
                            $twilio_number = env("TWILIO_FROM");

                            $client = new Client($account_sid, $auth_token);
                            $client->messages->create($receiverNumber, [
                                'from' => $twilio_number,
                                'body' => $message]);

                            //////dd('SMS Sent Successfully.');

                        } catch (Exception $e) {
                            //dd("Error: ". $e->getMessage());
                        }

                    }else{


                    }
                }

            }

        }

        Cart::whereIn('id', session()->get('cart_ids'))->delete();

        if($request->payment_method == 1){
            $response = [
                'response' => 'success',
                'message' => 'Order has been placed. Please pay via Paypal in Orders Dashboard'
            ];
        }else{
            $response = [
                'response' => 'success',
                'message' => 'Your order has been placed!'
            ];
        }


        return redirect(route('buyer.orders.index'))->with($response);
    }


    public function checkRandomNumber($transaction_id)
    {
        if (Order::where('transaction_id', $transaction_id)->get()->count() > 0) {
            return false;
        } else {
            return true;
        }

    }



    public function delivery_address_create(){
        return view('cart.delivery_address_create',compact([]));
    }

    public function delivery_address_store(){

    }

}
