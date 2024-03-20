<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Image;
use File;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = getPages();
        return view('contact.create', compact('pages'));
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
            'title' => 'required|unique:contacts|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);
        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/contact/'.$imageName;

            if (!File::exists('upload/contact/')){
                File::makeDirectory('upload/contact/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }
        $contact = Contact::create($data);

        link_module_page($contact);

        $notification = [
            'message' => 'Banner created successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/contact')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $pages = getPages();
        return view('contact.edit', compact('contact', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|max:255',
            'subtitle' => 'required',
            'active' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'upload/contact/'.$imageName;

            if (!File::exists('upload/contact/')){
                File::makeDirectory('upload/contact/');
            }
            Image::make($image)->save($location);

            $data['image'] = $location;
        }

        $contact->update($data);

        $notification = [
            'message' => 'Contacto editado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/contact')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        if($contact){
            unlink_module_page($contact);

            $contact->delete();

            $notification = [
                'message' => 'Contacto eliminado com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/contact')->with($notification);
        }
    }
}
