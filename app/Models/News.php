<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'title',
        'description',
        'url',
        'urlToImage',
        'publishedAt',
        'content',
    ];

    protected $casts = [
        'publishedAt' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
