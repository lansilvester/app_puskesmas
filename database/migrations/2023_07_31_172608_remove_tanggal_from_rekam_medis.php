<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTanggalFromRekamMedis extends Migration
{
    public function up()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->dropColumn('tanggal');
        });
    }

    public function down()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->date('tanggal')->nullable();
        });
    }
}
