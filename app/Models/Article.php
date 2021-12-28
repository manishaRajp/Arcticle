<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $filable = [
        'maincat_id',
        'subcat_id',
        'title',
        'description',
        'like',
        'comment',
        'image',
    ];

    public function maincat()
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'maincat_id');
    }
    public function subcat()
    {
        return $this->hasOne(ArticleSubCategory::class, 'id', 'subcat_id');
    }

    public function like_count()
    {
        return $this->hasMany(Like::class, 'art_id', 'id');
    }
    
    public function comment_count()
    {
        return $this->hasMany(Comment::class, 'art_id', 'id');
    }
 
}
