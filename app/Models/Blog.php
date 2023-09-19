<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id'
    ];

    public function comments()
    {
         return $this->hasMany('App\Models\Comment', 'blog_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
