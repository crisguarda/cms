<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public static function getSelect($title, $id, $model, $value = null){
        $options = '';
        if (!empty($model)){
            foreach ($model as $model){
                if ($model->id == $value){
                    $options .= '<option value="'.$model->id.'" selected>'.$model->title.'</option>';
                }else{
                    $options .= '<option value="'.$model->id.'">'.$model->title.'</option>';
                }
            }
        }

        $homeOption =  class_basename($model) == 'page' ? '<option value="0" selected="0">Home</option>' : '';
        $placeholder = '<option disabled selected>Escolha uma opção</option>';

        return '<div class="row mb-3">
                    <label class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="'.$id.'">
                            '.$placeholder.$homeOption.$options.'
                        </select>
                    </div>
                </div>';
    }

    public static function getInputText($title, $id, $value = null){
        return '<div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="'.$title.'" id="'.$id.'" name="'.$id.'" value="'.$value.'">
                    </div>
                </div>';
    }

    public static function getInputImage($title, $id, $value = null){
        $value = $value ?? 'upload/no__image.png';
        return '<div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="'.$id.'" name="'.$id.'">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="'.$id.'" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img
                            id="showImage"
                            class="rounded avatar-lg"
                            src="'.url($value).'"
                            alt=""
                        >
                    </div>
                </div>';
    }

    public static function getInputNumber($title, $id, $value = null){
        $value = $value ?? '0';
        return '<div class="row mb-3">
                    <label for="meta_description" class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" placeholder="'.$title.'" id="'.$id.'" name="'.$id.'" value="'.$value.'">
                    </div>
                </div>';
    }

    public static function getInputCheckbox($title, $id, $value = null, $defaultValue = null){
        if (isset($defaultValue) && !is_null($defaultValue)){
            $value = $defaultValue;
        }else{
            $value = $value ?? '1';
        }
        $checked = $value == 1 ? 'checked' : '';
        return '<div class="row mb-3 form-switch">
                    <label class="form-check-label col-sm-2 col-form-label" for="active">'.$title.'</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="'.$id.'" value="'.$value.'">
                        <input type="checkbox" class="form-check-input mx-0" id="'.$id.'" '. $checked .' name="'.$id.'" value="'.$value.'">
                    </div>
                </div>';
    }

    public static function getInputTextarea($title, $id, $value = null){
        return '<div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="'.$id.'">'.$value.'</textarea>
                    </div>
                </div>';
    }

    public static function getInputEmail($title, $id, $value = null){
        return '<div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">'.$title.'</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" placeholder="'.$title.'" id="'.$id.'" name="'.$id.'" value="'.$value.'">
                    </div>
                </div>';
    }

}
