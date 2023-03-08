<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $addToCart = new Cart();
        $addToCart->user_id = auth()->user()->id;
        $addToCart->vendor_id = $request->vendor_id;
        $addToCart->product_id = $request->product_id;
        $addToCart->price = $request->price;
        $addToCart->qty = 1;
        $addToCart->total_price = 1 * $request->price;
        $addToCart->save();
        return redirect()->back()->with('success', 'Product has been added to cart');



    }


    public function checkOut()
    {
        $cartToProducts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        return view('frontend.checkout.index', compact('cartToProducts'));
    }


    public function cartProductUpdate(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $cart->save();
        return redirect()->back()->with('success', 'Qty has been updated');
    }


    public function cartProductDelete($id)
    {
        $cartDelete = Cart::find($id);
        $cartDelete->delete();
        return redirect()->back()->with('success', 'Cart has been Deleted');
    }

    public function customerOrderDetails(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->vendor_id = $request->vendor_id;
        $order->user_id = auth()->check()? auth()->user()->id : '';
        $order->total_price = $request->total_price;
        $order->total_qty = $request->total_qty;
        $order->save();

        if(auth()->check()){
            $orderDetails = new OrderDetails();
            $orderDetails-> order_id = $order->id;
            $orderDetails-> name = $request->name;
            $orderDetails-> email = $request->email;
            $orderDetails-> phone = $request->phone;
            $orderDetails-> address = $request->address;
            $orderDetails->save();


        }

        $cartEmpty = Cart::where('user_id', auth()->user()->id)->get();
        foreach($cartEmpty as $cart){
            $cart->delete();
        }

        return redirect()->back()->with('success', 'Order has been Completed');

    }



    
}
