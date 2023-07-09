<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Page;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $gallery_id = $_GET['gallery_id'];
        if(isset($gallery_id)){
            $images = Image::where('gallery_id',$gallery_id)->get();

            return view('image.index', compact('images', 'gallery_id'));
        }else{
            $notification = [
                'message' => 'A página nao foi encontrada',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

    }

    public function create()
    {
        $gallery_id = $_GET['gallery_id'];

        if (isset($gallery_id)){
            return view('image.create', compact('gallery_id'));
        }else{
            $notification = [
                'message' => 'A página nao foi encontrada',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }


    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $data['image'] = uploadImage($request, 'image');

        $image = Image::create($data);

        $notification = [
            'message' => 'Imagem criada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/gallery/'.$image->gallery_id)->with($notification);

    }

//    public function show(Gallery $gallery)
//    {
//        $images = Image::where('gallery_id', $gallery->id)->get();
//        return view('image.index', compact('images'));
//    }

    public function edit(Image $image)
    {
        $pages = Page::all();
        return view('image.edit', compact('image', 'pages'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $data['image'] = uploadImage($request, 'image');

        $image->update($data);

        $notification = [
            'message' => 'Imagem editada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/gallery/'.$image->gallery_id)->with($notification);


    }

    public function destroy(Image $image)
    {
        if($image){
            $image->delete();

            unlink_module_page($image);

            $notification = [
                'message' => 'Imagem pagada com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/gallery/'.$image->gallery_id)->with($notification);
        }
    }
}
