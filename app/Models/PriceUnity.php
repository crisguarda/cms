<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceUnity extends Model
{
    protected $table = 'product_price_unity';
    use HasFactory;

    protected $guarded = [];
}
