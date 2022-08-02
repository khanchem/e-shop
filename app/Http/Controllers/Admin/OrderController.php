<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use PDF;


class OrderController extends Controller
{
    public function PendingOrder()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.order.pending', compact('orders'));
    } //end method

    public function DeleteOrder($id)
    {
        Order::findOrFail($id)->delete();
        $noty = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    } //end method

    public function PendingOrdersDetails($id)
    {

        $order = Order::with('user')->where('id', $id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.order.pending_orders_details', compact('order', 'orderItem'));
    } //end method

    public function ConfirmedOrder()
    {
        $orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('admin.order.confirm.confirm', compact('orders'));
    } //end method
    public function ProcessingdOrder()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('admin.order.processing.processing', compact('orders'));
    } //end method
    public function PickedOrder()
    {
        $orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('admin.order.picked.picked', compact('orders'));
    } //end method
    public function ShipedOrder()
    {
        $orders = Order::where('status', 'shiped')->orderBy('id', 'DESC')->get();
        return view('admin.order.shipe.shiped_orders', compact('orders'));
    } //end method

    public function DeliveredOrder()
    {
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('admin.order.delivered.delivered_orders', compact('orders'));
    } //end method
    public function cancelOrder()
    {
        $orders = Order::where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('admin.order.cancel.cancel_orders', compact('orders'));
    } //end method

    public function PendingToConfirm($id)
    {

        Order::findOrFail($id)->update(['status' => 'confirmed']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-order')->with($notification);
    } // end method

    public function ConfirmToProcessing($id)
    {

        Order::findOrFail($id)->update(['status' => 'processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirm-order')->with($notification);
    } // end method
    public function ProcessingToPicked($id)
    {

        Order::findOrFail($id)->update(['status' => 'picked']);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-order')->with($notification);
    } // end method
    public function PickedToShiped($id)
    {

        Order::findOrFail($id)->update(['status' => 'shiped']);

        $notification = array(
            'message' => 'Order Shiped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-order')->with($notification);
    } // end method

    public function ShipedToDelivered($id)
    {

        Order::findOrFail($id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shiped-order')->with($notification);
    } // end method
    public function CancelDeliverOrder($id)
    {

        Order::findOrFail($id)->update(['status' => 'cancel']);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('delivered-order')->with($notification);
    } // end method
    public function AdminInvoiceDownload($order_id)
    {

        $order = Order::with('user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('admin.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end method 
}
