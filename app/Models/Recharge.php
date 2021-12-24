<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;
protected $table = "recharge";
    protected $filable =[
        'user_id',
        'post_id',
        'status',
    ];
    public function post()
    {
    return $this->hasOne(Post::class, 'id', 'post_id');
    }
    public function user()
    {
    return $this->hasOne(User::class, 'id', 'user_id');
    }
}
