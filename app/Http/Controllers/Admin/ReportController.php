<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('admin.report.all_report');
    } //end method

    public function ReportByDate(Request $request)
    {

        //return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('admin.report.show_report', compact('orders'));
    } //end method

    public function SeachByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('admin.report.show_report', compact('orders'));
    } //end

    public function SeachByYear(Request $request)
    {
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('admin.report.show_report', compact('orders'));
    } //end method

    public function allUser()
    {
        $users = User::latest()->get();
        return view('admin.user.all_user', compact('users'));
    }
}
