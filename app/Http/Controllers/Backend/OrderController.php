<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use DB;

class OrderController extends Controller
{
    public function PendingOrder(){
        $order = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.order.pending_order',compact('order'));
    } // End Method 
    public function ConfirmOrder(){
        $order = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.order.confirm_order',compact('order'));
    } // End Method 
    public function ProcessOrder(){
        $order = Order::where('status','on-the-way')->orderBy('id','DESC')->get();
        return view('backend.order.process_order',compact('order'));
    } // End Method 
    public function DeliverOrder(){
        $order = Order::where('status','deliver')->orderBy('id','DESC')->get();
        return view('backend.order.deliver_order',compact('order'));
    } // End Method 
    public function CancelOrderRequest(){
        $order = Order::where('status','cancel-request')->orderBy('id','DESC')->get();
        return view('backend.order.cancel_request',compact('order'));
    } // End Method

    public function AdminOrderDetail($order_id){
        $order = Order::with('ward','township','region','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        return view('backend.order.admin_order_detail',compact('order','orderItem'));
    }// End Method
    public function PendingConfirm($order_id){
        Order::findOrFail($order_id)->update(['status' => 'confirm','updated_at' => Carbon::now(),]);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirm.order')->with($notification); 


    }// End Method 
    public function ConfirmProcess($order_id){
        Order::findOrFail($order_id)->update(['status' => 'on-the-way','updated_at' => Carbon::now(),]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('process.order')->with($notification); 


    }// End Method 
    public function ProcessDeliver($order_id){

        $product = OrderItem::where('order_id',$order_id)->get();
            foreach($product as $item){
                Product::where('id',$item->product_id)
                        ->update(['product_qty' => DB::raw('product_qty-'.$item->qty) ]);
            } 
        
                Order::findOrFail($order_id)->update(['status' => 'deliver',
                'updated_at' => Carbon::now(),]);
        
                $notification = array(
                    'message' => 'Order Deliver Successfully',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('deliver.order')->with($notification); 
        
        
            }// End Method 
            public function CancelRequest($order_id)
{
    $order = Order::findOrFail($order_id);

    // Check if the order status is cancel-request
    if ($order->status === 'cancel-request') {
        // Update the order status to canceled
        $order->status = 'canceled';
        $order->save();

        

        $notification = array(
            'message' => 'Cancellation request approved. Order canceled successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('cancel.order')->with($notification);
    }

    return response()->json(['error' => 'The cancellation request cannot be approved.']);
}

            public function cancelOrder($id)
            {
                $order = Order::findOrFail($id);
            
                // Check if the order status is pending
                if ($order->status === 'pending') {
                    // Update the order status to canceled
                    $order->status = 'cancel-request';
                    $order->save();
            
                    // Optionally, you can perform additional tasks here, such as updating the stock, refunding the payment, etc.
            
                    return response()->json(['success' => 'Cancellation request sent successfully.']);
                }
            
                return response()->json(['error' => 'The order cannot be canceled.']);
            }
            
}
