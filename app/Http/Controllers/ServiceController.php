<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use File;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = getPages();
        return view('service.create', compact('pages'));
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
            'title' => 'required|unique:services|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/service/'.$imageName;

            if (!File::exists('upload/service/')){
                File::makeDirectory('upload/service/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }

        $service = Service::create($data);

        link_module_page($service);

        $notification = [
            'message' => 'Serviço criado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/service')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $itens = ServiceItem::where('service_id', $service->id)->get();
        $service = $service->id;
        return view('service.show', compact('itens', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $pages = getPages();
        return view('service.edit', compact('service', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|max:255',
            'active' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/service/'.$imageName;

            if (!File::exists('upload/service/')){
                File::makeDirectory('upload/service/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }

        $service->update($data);

        link_module_page($service);

        $notification = [
            'message' => 'Serviço editado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/service')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if($service){
            unlink_module_page($service);

            $service->delete();

            $notification = [
                'message' => 'Serviço eliminado com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/service')->with($notification);
        }
    }

}
