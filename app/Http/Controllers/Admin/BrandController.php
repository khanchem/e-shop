<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\User;

class BrandController extends Controller
{
    public function ViewBrand()
    {
        $brands = Brand::get();
        return view('admin.brand.viewbrand', compact('brands'));
    }
    public function storeBrand(Request $request)
    {

        $data = new Brand();
        $validation =   $request->validate(
            [
                'brand_name' => 'required',

                'brand_image' => 'required'
            ]

        );

        $data->brand_name = $request->brand_name;;

        if ($request->file('brand_image')) {
            $file = $request->file('brand_image');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend_images/brand_image/'), $file_name);
            $data->brand_image = $file_name;
        }
        $data->save();
        $noty = array(
            'message' => 'Brand Added  Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($noty);
    }
    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $file_path = '/backend_images/brand_image/' . $brand->brand_image;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        Brand::findOrFail($id)->delete();
        $noty = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
}
