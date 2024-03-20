<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Module;
use App\Models\Page;
use Illuminate\Http\Request;
use File;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('banner.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:banners|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/banner/'.$imageName;

            if (!File::exists('upload/banner/')){
                File::makeDirectory('upload/banner/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }
        $banner = Banner::create($data);

        link_module_page($banner);

        $notification = [
            'message' => 'Banner created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/banner')->with($notification);

    }

    public function edit(Banner $banner)
    {
        $pages = Page::all();
        $isCreate = false;
        return view('banner.edit', compact('banner', 'pages', 'isCreate'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|max:255|unique:banners,title,'.$banner->id,
            'active' => 'required'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/banner/'.$imageName;

            if (!File::exists('upload/banner/')){
                File::makeDirectory('upload/banner/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }
        $banner->update($data);

        link_module_page($banner);

        $notification = [
            'message' => 'Banner Updated successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/banner')->with($notification);
    }

    public function destroy(Banner $banner)
    {
        if($banner){
            $banner->delete();

            unlink_module_page($banner);

            $notification = [
                'message' => 'Banner Deleted successfully',
                'alert-type' => 'success'
            ];

            return redirect('admin/banner')->with($notification);
        }
    }

}
