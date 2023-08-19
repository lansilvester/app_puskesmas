<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_poliklinik');
            $table->text('diagnosa')->nullable();
            $table->text('resep_obat')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
    
            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->foreign('id_dokter')->references('id')->on('dokter');
            $table->foreign('id_poliklinik')->references('id')->on('poliklinik');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
    
};
