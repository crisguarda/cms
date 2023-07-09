<?php

namespace App\Http\Controllers;

use App\Models\SimpleText;
use Illuminate\Http\Request;

class SimpleTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpleTexts = SimpleText::all();
        return view('simpleText.index', compact('simpleTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = getPages();
        $isCreate = true;
        return view('simpleText.create', compact('pages'));
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
            'title' => 'required|unique:simple_texts|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);
        $data = $request->all();

        $simpleText = SimpleText::create($data);

        link_module_page($simpleText);

        $notification = [
            'message' => 'Banner created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/simpleText')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpleText  $simpleText
     * @return \Illuminate\Http\Response
     */
    public function show(SimpleText $simpleText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpleText  $simpleText
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleText $simpleText)
    {
        $pages = getPages();
        return view('simpleText.edit', compact('simpleText', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpleText  $simpleText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleText $simpleText)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);

        $data = $request->all();

        $simpleText->update($data);

        $notification = [
            'message' => 'Texto Simples editado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/simpleText')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpleText  $simpleText
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleText $simpleText)
    {
        if($simpleText){
            unlink_module_page($simpleText);

            $simpleText->delete();

            $notification = [
                'message' => 'Texto Simples eliminado com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/simpleText')->with($notification);
        }
    }
}
