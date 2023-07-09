<?php

namespace App\Http\Controllers;

use App\Models\ImageText;
use Illuminate\Http\Request;

class ImageTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageTexts = ImageText::all();
        return view('imageText.index', compact('imageTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = getPages();
        return view('imageText.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|unique:image_texts|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);
        $data = $request->all();

        $imageText = ImageText::create($data);

        link_module_page($imageText);

        $notification = [
            'message' => 'Banner created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/imageText')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageText  $imageText
     * @return \Illuminate\Http\Response
     */
    public function show(ImageText $imageText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageText  $imageText
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageText $imageText)
    {
        $pages = getPages();
        return view('imageText.edit', compact('imageText', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageText  $imageText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageText $imageText)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);

        $data = $request->all();

        $imageText->update($data);

        $notification = [
            'message' => 'Texto Simples editado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/imageText')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageText  $imageText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageText $imageText)
    {
        if($imageText){
            unlink_module_page($imageText);

            $imageText->delete();

            $notification = [
                'message' => 'Texto Simples eliminado com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/imageText')->with($notification);
        }
    }
}
