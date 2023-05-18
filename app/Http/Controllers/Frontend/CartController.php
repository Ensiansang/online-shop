<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\DeliverWard;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

        $product = Product::findOrFail($id);

        // Check if the product is out of stock
    if ($product->product_qty <= 0) {
        return response()->json(['error' => 'The product is currently out of stock.']);
    }

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added to Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added to Cart' ]);

        }

    }// End Method

    public function AddToCartDetails(Request $request, $id){

        $product = Product::findOrFail($id);
       // Check if the product is out of stock
    if ($product->product_qty <= 0) {
        return response()->json(['error' => 'The product is currently out of stock.']);
    }

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method

    public function AddMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));
    }// End Method
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }// End Method
    public function MyCart(){
        $carts = Cart::content();
        return view('frontend.mycart.view_mycart',compact('carts'));

    }// End Method
    public function GetCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));

    }// End Method

    public function CartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Remove From Cart Successfully']);

    }// End Method
    public function CartIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty +1);

        return response()->json('Increment');

    }// End Method

    public function CartDecrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty -1);

        return response()->json('Decrement');

    }// End Method
    public function ShowTotal(){
        return response()->json(array(
          'subtotal' => Cart::total(),
          'total' => Cart::total(),
        ));
      }// End Method
      public function CheckoutCreate(){

        if (Auth::check()) {

            if (Cart::total() > 0) { 

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $ward = DeliverWard::orderBy('ward_name','ASC')->get();
        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','ward'));


            }else{

            $notification = array(
            'message' => 'At Least need one Product in the cart',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification); 
            }



        }else{

             $notification = array(
            'message' => 'You Need to Login First',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification); 
        }




    }// End Method

    public function CartCheck()
    {
        $count = Cart::count();
        return response()->json(['count' => $count]);
    }//End Metho
    
}
