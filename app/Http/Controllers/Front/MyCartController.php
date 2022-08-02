<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class MyCartController extends Controller
{
    public function MyCart()
    {

        return view('front.cart.myCart');
    }
    public function MyCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    } //end method


    public  function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from My Cart']);
    }
    public function IncrementCart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => Cart::total() * $coupon->coupon_discount / 100,
                'total_amount' => Cart::total() - Cart::total() * $coupon->coupon_discount / 100
            ]);
        }

        return response()->json('increment');
    }
    public function decrementCart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
            ]);
        }
        return response()->json('Decrement');
    } // end mehtod




    public function ViewWishlist()
    {
        if (Auth::check()) {
            return view('front.whishlist.whishlist');
        } else {
            $noty = array(
                'message' => 'Login First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($noty);
        }
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {

            $exists = WishList::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {


                WishList::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {
                return response()->json(['error' => 'Product Already in Watchlist']);
            }
        } else {

            return response()->json(['error' => 'At First Login Your Account']);
        }
    }
    public function GetAjaxWishList()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }
    public function RemoveWishlist($id)
    {
        WishList::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }
}
