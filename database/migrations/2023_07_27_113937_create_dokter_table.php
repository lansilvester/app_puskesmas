<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->unique();
            $table->string('nip');
            $table->string('spesialisasi')->nullable();
            $table->string('nomor_telepon', 20)->nullable();
            $table->timestamps();
    
            $table->foreign('id_user')->references('id')->on('users');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
    
};
