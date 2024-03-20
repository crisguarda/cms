<?php

namespace App\Http\Controllers;

use App\Models\Unity;
use Illuminate\Http\Request;

class UnityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unities = Unity::all();
        return view('unity.index', compact('unities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unity.create');
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
            'unity' => 'required|unique:unities|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $unity = Unity::create($data);

        link_module_page($unity);

        $notification = [
            'message' => 'Unidade criada com sucesso.',
            'alert-type' => 'success'
        ];

        return redirect('admin/unity')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function edit(Unity $unity)
    {
        return view('unity.edit', compact('unity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unity $unity)
    {
        $request->validate([
            'unity' => 'required|max:255',
            'active' => 'required'
        ]);

        $data = $request->all();

        $unity->update($data);

        $notification = [
            'message' => 'Unidade editada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/unity')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unity  $unity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unity $unity)
    {
        if($unity){
            unlink_module_page($unity);

            $unity->delete();

            $notification = [
                'message' => 'Unidade eliminada com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/unity')->with($notification);
        }
    }
}
