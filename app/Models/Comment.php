<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'comment',
        'blog_id',
        'user_id',
    ];


    public function blogs()
    {
        return $this->belongsTo('App\Models\Blog','blog_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
