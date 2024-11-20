<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lector;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'datetime',
        'location',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function registrations()
{
    return $this->hasMany(Registration::class);
}

public function lectors()
{
    return $this->hasMany(Lector::class);
}

}
