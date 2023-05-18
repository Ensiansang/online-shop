<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DeliverRegion;
use App\Models\DeliverTownship;
use App\Models\DeliverWard;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;


class CheckoutController extends Controller
{
    public function TownshipGetAjax($ward_id){

        $deliver = DeliverTownship::where('ward_id',$ward_id)->orderBy('township_name','ASC')->get();
        return json_encode($deliver);

    } // End Method 

    public function RegionGetAjax($township_id){

        $deliver = DeliverRegion::where('township_id',$township_id)->orderBy('region_name','ASC')->get();
        return json_encode($deliver);

    }// End Method 
    public function CheckoutStore(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;   
    
        $data['ward_id'] = $request->ward_id;
        $data['township_id'] = $request->township_id;
        $data['region_id'] = $request->region_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes; 
        $cartTotal = Cart::total();
    
        // Return the view for the 'cash' payment option
        return view('frontend.payment.cash',compact('data','cartTotal'));
    }
    
}
