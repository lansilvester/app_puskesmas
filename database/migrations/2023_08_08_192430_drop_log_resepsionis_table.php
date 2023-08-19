<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLogResepsionisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('log_resepsionis');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('log_resepsionis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resepsionis');
            $table->timestamps();

            $table->foreign('id_resepsionis')->references('id')->on('resepsionis')->onDelete('cascade');
        });
    }
}
