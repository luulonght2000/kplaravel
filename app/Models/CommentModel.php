<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'title'
    ];

    public function post()
    {
        return $this->belongsTo(\App\Models\PostModel::class);
    }
}
