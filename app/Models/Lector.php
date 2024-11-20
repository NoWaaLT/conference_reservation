<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lector extends Model
{
    use HasFactory;

    protected $fillable = [
        'conference_id',
        'name',
        'surname',
    ];

    // Define the relationship with the Conference model
    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }
}
