<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use File;
use Image;

class SettingControler extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1);
        $data = $request->post();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/'.mb_strtolower(class_basename($setting)).'/'.$imageName;

            if (!File::exists('upload/setting/')){
                File::makeDirectory('upload/setting/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }

        $setting->update($data);

        $notification = [
            'message' => 'Home Slider updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
