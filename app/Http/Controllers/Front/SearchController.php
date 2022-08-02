<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function SearchByBrand($id)
    {
        $products = Product::where('status', 1)->where('brand_id', $id)->orderBy('id', 'DESC')->get();
        return view('front.search.search_brand', compact('products'));
    } //end methode

    public function SearchByCategory($id)
    {
        $products = Product::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->get();
        return view('front.search.search_category', compact('products'));
    } //end methode
    public function SearchBytags($id)
    {
        $products = Product::where('status', 1)->where('product_tag', $id)->orderBy('id', 'DESC')->get();
        return view('front.search.search_category', compact('products'));
    } //end methode

    public function SearchByProduct(Request $request)
    {
        $request->validate(["search" => "required"]);

        $item = $request->search;
        // echo "$item";

        $products = Product::where('product_name', 'LIKE', "%$item%")->get();
        return view('front.search.search', compact('products'));
    } // end method 

    ///// Advance Search Options 


}
