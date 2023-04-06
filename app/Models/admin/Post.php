<?php

namespace App\Models\admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=[
        'title',
        'description',
        'content',
        'image',
        'view_counts',
        'user_id',
        'new_post',
        'slug',
        'category_id',
        'highlight_post',
    ];
    
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id','id');   
    // }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function showimage(){
        return 'image/post/'.$this->image;
    }
} 
