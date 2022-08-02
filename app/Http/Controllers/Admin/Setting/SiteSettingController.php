<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function ManageSiteView()
    {
        $setting = SiteSetting::find(1);
        return view('admin.mnanage_site.site_setting', compact('setting'));
    } //end ,method

    public function UpdateSiteView(Request $request)
    {

        $setting_id = $request->id;


        if ($request->file('logo')) {

            $file = $request->file('logo');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/logo/'), $file_name);
            $data = $file_name;




            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'logo' =>  $data,

            ]);

            $notification = array(
                'message' => 'Setting Updated with Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } else {

            SiteSetting::findOrFail($setting_id)->update([
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,


            ]);

            $notification = array(
                'message' => 'Setting Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        } // end else s
    }
}
