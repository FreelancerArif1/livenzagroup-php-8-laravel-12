<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'button_text',
        'button_link',
        'short_description',
        'description',
        'image',
        'images',
        'company_logo',
        'video',
        'map',
        'serial',
        'status',
        'slug',
        'company_name',
        'company_id',
        'company_category_id',
        'brand',
        'model',
        'reg_year',
        'mileage',
        'engine',
        'transmission',
        'fuel_type',
        'drive_type',
        'wheel',
        'exterior',
        'body_style',
        'price',
    ];
}
