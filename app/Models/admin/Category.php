<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts(){
        return $this->hasmany(Post::class,'category_id','id');
    }
}
