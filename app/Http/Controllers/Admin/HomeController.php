<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function SliderManage()
    {
        $sliders = Slider::get();
        return view('admin.home.manage_slider', compact('sliders'));
    }
    public function SliderStore(Request $request)
    {
        $data = new Slider();


        $data->slider_desc = $request->slider_desc;

        if ($request->file('slider_image')) {
            $file = $request->file('slider_image');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend_images/slider_image/'), $file_name);
            $data->slider_image = $file_name;
        }
        $data->save();
        $noty = array(
            'message' => 'Slider Added  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }

    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $file_path = 'backend_images/slider_image/' . $slider->slider_image;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        Slider::findOrFail($id)->delete();
        $noty = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
}
