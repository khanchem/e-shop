<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMultiImage;

class ProductDetailController extends Controller
{
    public function ProductDetail($id)
    {
        $products = Product::findOrFail($id);
        $color = $products->product_color;
        $product_color = explode(',', $color);
        $size = $products->product_size;
        $product_size = explode(',', $size);
        $product_multiImage = ProductMultiImage::where('product_id', $id)->get();

        $related_products = Product::where('category_id', $products->category_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('front.product.product_detail', compact('products', 'product_color', 'product_size', 'related_products', 'product_multiImage'));
    } //end method

    public function ViewProduct()
    {

        $categories = Category::orderBy('id', 'DESC')->limit(6)->get();


        return view('front.product.all_product', compact('categories'));
    }
}
