<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id')->unique();
            $table->string('location');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();

            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasien')
                ->onDelete('cascade'); // Cascade delete if a patient is deleted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
