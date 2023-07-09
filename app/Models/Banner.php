<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'image',
        'image_alt',
        'order',
        'active',
    ];
}
