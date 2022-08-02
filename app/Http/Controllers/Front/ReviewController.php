<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function StoreReview(Request $request)
    {

        Review::insert([
            'name' => $request->name,
            'email' => $request->email,
            'desc' => $request->desc,
        ]);

        $notification = array(
            'message' => 'Review Submit Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method

    public function AllReviewView()
    {
        $reviews = Review::latest()->get();
        return view('admin.review.all_review', compact('reviews'));
    } //end method

    public function DeleteReview($id)
    {
        Review::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method
    public function ApproveReview($id)
    {
        Review::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method
}
