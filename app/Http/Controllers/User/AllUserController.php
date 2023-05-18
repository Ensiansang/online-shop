<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AllUserController extends Controller
{
    public function UserAccount(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_detail',compact('userData'));
    }//End Method
    public function ChangePassword(){

        return view('frontend.userdashboard.user_change_password');
    }//End Method
    public function OrderPage(){
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');
    $timestamp = time();
        $id = Auth::user()->id;
        $order = Order::where('user_id',$id)->orderBy('id','ASC')->get();
        return view('frontend.userdashboard.user_order_page',compact('order','timestamp'));
    }//End Method
    public function UserOrderDetails($order_id){
        // Add cache-control headers
    
        $order = Order::with('ward','township','region','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','ASC')->get();
        
        return view('frontend.order.order_details',compact('order','orderItem'));
    }//End Method
    public function ReturnOrder(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1, 
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.order.page')->with($notification); 

    }// End Method
    public function ReturnOrderPage(){

        $order = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.order.return_order_view',compact('order'));

    }// End Method  
}
