<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicecategory extends Model
{
    protected $fillable = [
        'title',
        'link',
        'image',
        'serial',
        'status',
        'category_id',
    ];
}
