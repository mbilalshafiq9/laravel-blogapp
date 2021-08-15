<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'image',
        'short_desc',
        'post',
        'tags',
        'u_id',
        'cat_id',
        'created_at'
    ];
}
