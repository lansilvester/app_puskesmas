<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDokterTableSetNipDefaultToNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokter', function (Blueprint $table) {
            // Menambahkan kolom 'nip' dengan nilai default NULL
            $table->string('nip')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokter', function (Blueprint $table) {
            // Mengubah kembali kolom 'nip' agar tidak bisa NULL
            $table->string('nip')->nullable(false)->change();
        });
    }
}
