<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'name',
        'location',
        'email',
        'cell',
        'picture',
        'nat',
    ];

    public function blogs()
    {
        return $this->hasMany(News::class);
    }
}
