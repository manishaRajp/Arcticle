<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function article_like()
    {
        return $this->hasMany(Article::class, 'like', 'id');
    }
}
