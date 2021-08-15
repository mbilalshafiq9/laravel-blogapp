<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = [
        'u_id',
        'blog_id',
        'comment',
        'created_at'
    ];
}
