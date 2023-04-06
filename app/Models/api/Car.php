<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable=[
        'name_car',
        'vehicles',
        'seat',
        'distance',
        'content',
        'price',
        'image',
        'image_detail',
        'maximum',
        'maximum_torque'
    ];
}
