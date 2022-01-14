<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'poster',
        'description',
        'text_news',
        'date_news',
        'region',
        'tags',
        'favorites'
    ];

    protected $table = 'news';
}
