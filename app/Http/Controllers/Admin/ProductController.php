<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMultiImage;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function AddProduct()
    {
        return view('admin.product.add_product');
    }

    public function StoreProduct(Request $request)
    {
        if ($request->file('product_thambnail')) {
            $file = $request->file('product_thambnail');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/product/product_thambnail/'), $file_name);
            $data = $file_name;
        }
        $product_id =  Product::insertGetId([
            'product_name' => $request->product_name,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'product_qty' => $request->product_qty,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),

            'product_tag' => $request->product_tag,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,

            'product_code' => $request->product_code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,

            'latest' => $request->latest,
            'feature' => $request->feature,


            'product_thambnail' => $data,
            'status' => 1,
            'created_at' => Carbon::now(),





        ]);

        $file = $request->file('multi_image');
        foreach ($file as $multi_image) {

            $fileName = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            $multi_image->move(public_path('/product/multi_image/product_multi_image/'), $fileName);
            $multi = $fileName;

            ProductMultiImage::insert([
                'product_id' => $product_id,
                'multi_image' => $multi,


            ]);
        }

        $noty = array(
            'message' => 'Product Added  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    } //end method

    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.manage_product', compact('products'));
    } //end method
    public function EditProduct($id)
    {
        $multi_images = ProductMultiImage::where('product_id', $id)->get();
        $products = Product::findOrFail($id);
        return view('admin.product.edit_product', compact('products', 'multi_images'));
    } //end method
    public function UpdateDetailsProduct(Request $request, $id)
    {
        Product::find($id)->update([
            'product_name' => $request->product_name,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'product_qty' => $request->product_qty,
            'discount_price' => $request->discount_price,
            'selling_price' => $request->selling_price,


            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),

            'product_tag' => $request->product_tag,

            'product_code' => $request->product_code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,


            'latest' => $request->latest,
            'feature' => $request->feature,



            'status' => 1,
            'created_at' => Carbon::now(),





        ]);
        $noty = array(
            'message' => 'Product Without Image Updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    } //end method

    public function deletemultiimage($id)
    {
        $images = ProductMultiImage::findOrFail($id);

        unlink(public_path('/product/multi_image/product_multi_image/') . $images->multi_image);
        ProductMultiImage::findOrFail($id)->delete();

        $noty = array(
            'message' => 'Multi Image Deleted  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    } //end method
    public function Updatemultiimage(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = ProductMultiImage::findOrFail($id);
            unlink(public_path('/product/multi_image/product_multi_image/') . $imgDel->multi_image);
            $fileName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('/product/multi_image/product_multi_image/'), $fileName);
            $multi = $fileName;

            ProductMultiImage::where('id', $id)->update([
                'multi_image' => $multi,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path('image/product/product_thambnail/') . $product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = ProductMultiImage::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink(public_path('/product/multi_image/product_multi_image/') . $img->multi_image);
            ProductMultiImage::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
