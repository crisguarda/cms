<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    public function index()
    {
        $service_id = $_GET['service_id'];
        if(isset($service_id)){
            $itens = ServiceItem::where('service_id',$service_id)->get();

            return view('serviceItem.index', compact('itens', 'service_id'));
        }else{
            $notification = [
                'message' => 'O Serviço nao foi encontrado',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

    }

    public function create()
    {
        $service_id = $_GET['service_id'];

        if (isset($service_id)){
            return view('serviceItem.create', compact('service_id'));
        }else{
            $notification = [
                'message' => 'O serviço nao foi encontrado',
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

        $serviceItem = ServiceItem::create($data);

        $notification = [
            'message' => 'Item do serviço criado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/service/'.$serviceItem->service_id)->with($notification);

    }

    public function edit(ServiceItem $serviceItem)
    {
        $pages = Page::all();
        return view('serviceItem.edit', compact('serviceItem', 'pages'));
    }

    public function update(Request $request, ServiceItem $serviceItem)
    {
        $request->validate([
            'title' => 'required|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $serviceItem->update($data);

        $notification = [
            'message' => 'Itemd do Serviço editado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/service/'.$serviceItem->service_id)->with($notification);
    }

    public function destroy(ServiceItem $serviceItem)
    {
        if($serviceItem){
            $serviceItem->delete();

            $notification = [
                'message' => 'Item do serviço apagado com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/service/'.$serviceItem->service_id)->with($notification);
        }
    }
}
