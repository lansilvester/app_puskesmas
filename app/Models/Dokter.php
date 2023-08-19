<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dokter extends Authenticatable
{
    protected $table = 'dokter';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function rekam_medis(){
        return $this->hasMany(RekamMedis::class, 'id_dokter');
    }
}
