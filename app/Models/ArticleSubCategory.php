<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'maincat_id',
        'name',
    ];

public function maincat(){
return $this->hasOne(ArticleCategory::class, 'id', 'maincat_id');
}
}
