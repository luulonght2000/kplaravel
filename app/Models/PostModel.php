<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function comment()
    {
        return $this->hasMany(\App\Models\CommentModel::class, 'post_id');
    }

    public function getTotalLikesAttribute()
    {
        return $this->hasMany(\App\Models\CommentModel::class)->where('post_id', $this->post_id)->count();
    }
}
