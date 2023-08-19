<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log_resepsionis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->date('tanggal_kunjungan');
            $table->text('tujuan_kunjungan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
    
            $table->foreign('id_pasien')->references('id')->on('pasien');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('log_resepsionis');
    }
    
};
