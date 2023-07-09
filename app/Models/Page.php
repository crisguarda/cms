<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded;

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order', 'ASC');
    }
}
