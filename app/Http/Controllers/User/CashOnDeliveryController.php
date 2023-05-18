<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CashOnDeliveryController extends Controller
{
    public function CashOrder(Request $request){
        $total_amount= round(Cart::total());

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'ward_id' => $request->ward_id,
            'township_id' => $request->township_id,
            'region_id' => $request->region_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' => 'MMK',
            'amount' => $total_amount,


            'invoice_no' => 'VAL'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  

        ]);

        // Start Send Email

        $invoice = Order::findOrFail($order_id);

        $data = [

            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'payment_method' => $invoice->payment_method,
            'name' => $invoice->name,
            'email' => $invoice->email,

        ];
        Mail::to($request->email)->send(new OrderMail($data));
        // End Send Email 
        $carts = Cart::content();
        foreach($carts as $cart){

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' =>Carbon::now(),
            ]);
        } // End Foreach
        Cart::destroy();
        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification); 
    } //End Method
}
