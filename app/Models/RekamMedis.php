<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $guarded = ['id'];
     
    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'id_poliklinik');
    }
}
