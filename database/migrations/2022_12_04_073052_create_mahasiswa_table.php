<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigInteger('id_mahasiswa')->primary();
            $table->string('nama_mahasiswa');
            $table->bigInteger('id_kost');
            $table->bigInteger('no_kamar');
            $table->string('metode_pembayaran');
            $table->bigInteger('ktm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
}
};