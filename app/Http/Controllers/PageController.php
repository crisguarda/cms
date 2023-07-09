<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }

    public function create()
    {
        $pages = Page::where('parent_id',null)->get();;
        return view('page.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();
        $data['url'] = Str::slug($data['title']);
        $page = Page::create($data);

        $notification = [
            'message' => 'Page created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/page')->with($notification);
    }

    public function edit(Page $page)
    {
        $pages = Page::all();
        return view('page.edit', compact('page', 'pages'));
    }

    public function update(Request $request,Page $page)
    {
        $request->validate([
            'title' => 'required|max:255',
            'active' => 'required'
        ]);
        $data = $request->all();

        $page->update($data);

        $notification = [
            'message' => 'Página atualizada com sucesso.',
            'alert-type' => 'success'
        ];

        return redirect('admin/page')->with($notification);
    }

    public function destroy(Page $page)
    {
        if($page){
            $page->delete();

            unlink_module_page($page);

            $notification = [
                'message' => 'Página eliminada com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/page')->with($notification);
        }
    }
}
