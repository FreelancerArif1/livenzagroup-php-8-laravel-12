<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'button_text',
        'button_link',
        'short_description',
        'description',
        'image',
        'company_logo',
        'video',
        'map',
        'serial',
        'status',
        'slug',
        'company_name'
    ];
}
