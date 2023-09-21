<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'longitude',
        'latitude',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
