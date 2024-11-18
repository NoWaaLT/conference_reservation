<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
     // Specify which fields are mass assignable
     protected $fillable = ['user_id', 'conference_id'];

     // Define the relationship with the User model
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     // Define the relationship with the Conference model
     public function conference()
     {
         return $this->belongsTo(Conference::class);
     }
}
