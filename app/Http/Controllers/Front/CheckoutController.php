<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function ViewCheckout()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();


                return view('front.checkout.view_checkout', compact('carts', 'cartQty', 'cartTotal'));
            } else {
                $noty = array(
                    'message' => 'Add Something to Cart',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($noty);
            }
        } else {
            $noty = array(
                'message' => 'Login First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($noty);
        }
    } //end method

    public function StoreCheckout(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;



        if ($request->payment_method == 'stripe') {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            return view('front.payment.stripe', compact('carts', 'cartQty', 'cartTotal', 'data'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            return view('front.payment.cash', compact('carts', 'cartQty', 'cartTotal', 'data'));
        }
    }
}
