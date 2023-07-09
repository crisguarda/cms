<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Page;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $pages = Page::all();
        return view('gallery.index', compact('galleries', 'pages'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('gallery.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:galleries|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();
        $gallery = Gallery::create($data);

        link_module_page($gallery);

        $notification = [
            'message' => 'Gallery created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/gallery')->with($notification);

    }

    public function show(Gallery $gallery)
    {
        $images = Image::where('gallery_id', $gallery->id)->get();
        $gallery = $gallery->id;
        return view('gallery.show', compact('images', 'gallery'));
    }

    public function edit(Gallery $gallery)
    {
        $pages = Page::all();
        return view('gallery.edit', compact('gallery', 'pages'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $gallery->update($data);

        $notification = [
            'message' => 'Gallery Updated successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/gallery')->with($notification);


    }

    public function destroy(Gallery $gallery)
    {
        if($gallery){
            $gallery->delete();

            unlink_module_page($gallery);

            $notification = [
                'message' => 'Gallery Deleted successfully',
                'alert-type' => 'success'
            ];

            return redirect('admin/gallery')->with($notification);
        }
    }
}
