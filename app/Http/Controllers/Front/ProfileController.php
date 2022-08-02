<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    public function ViewMyAccount()
    {
        $return_orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();


        return view('front.profile.myaccount', compact('return_orders'));
    }
    public function updateProfile(Request $request, $id)
    {

        $validation = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $hashedPassword = User::find($id)->password;
        if (Hash::check($request->oldPassword,  $hashedPassword)) {
            $admin = User::find($id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $noty = array(
                'message' => 'Admin Password Changed  Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($noty);
        } else {

            return redirect()->back();
        }
    } //end method

    public function OrderDetails($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();
        $item = OrderItem::where('order_id', $id)->orderBy('id', 'DESC')->first();
        return view('front.profile.order.order_details', compact('order', 'item'));
    } //end method

    public function ReturnOrder(Request $request, $id)
    {

        Order::findOrFail($id)->update([
            'return_reason' => $request->return_reason,
            'return_order' => 1,
            'return_date' =>  Carbon::now()->format('d F Y'),

        ]);
        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my-account')->with($notification);
    }
}
