<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderReturnController extends Controller
{
    public function ReturnOrder()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('admin.returnOrder.return_orders', compact('orders'));
    } //end method

    public function ApproveOrder($id)
    {
        Order::where('id', $id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end methode

    public function ViewApproveOrder()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('admin.returnOrder.approved_return_orders', compact('orders'));
    }
}
