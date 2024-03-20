<?php

use App\Models\Module;
use App\Models\Page;
//use Image;
//use File;

function getPages(){
    return Page::all();
}

function link_module_page($model){
    if (!is_null($model->page_id) and $model->page_id !== '0'){
        $module = New Module();
        $module->create([
            'page_id' => $model->page_id,
            'model' => class_basename($model),
            'module_id' => $model->id,
            'order' => $model->order,
        ]);
    }
}

function unlink_module_page($model){
    if(!is_null($model->page_id)){
        $module = Module::where(['page_id' => $model->page_id, 'module_id' => $model->id])->first();
        $module->delete();
    }
}

function uploadImage($request, $model){
    if ($request->hasFile('image')){
        $image = $request->file('image');

        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $location = 'upload/'.class_basename($model).'/'.$imageName;

        if (!File::exists('upload/'.class_basename($model).'/')){
            File::makeDirectory('upload/'.class_basename($model).'/');
        }
        Image::make($image)->save($location);
        return $location;
    }
}

