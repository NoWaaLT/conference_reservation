<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'date', 'location'];

    public function registrations()
{
    return $this->hasMany(Registration::class);
}
}
