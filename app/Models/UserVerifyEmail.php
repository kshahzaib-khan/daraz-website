<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifyEmail extends Model
{
    use HasFactory;


      protected $table = 'user_verify_emails';

      protected $fillable = [

          'user_id',
          'token',
      ];


      public function user(){
          return $this->belongsTo(User::class);
      }
}
