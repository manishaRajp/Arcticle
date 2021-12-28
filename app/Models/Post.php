<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function recharge()
    {
    return $this->hasOne(RechagerDetails::class, 'id', 'rech_id');
    }

      public function User()
      {
      return $this->belongsTo(User::class, 'user_id', 'id');
      }

}
