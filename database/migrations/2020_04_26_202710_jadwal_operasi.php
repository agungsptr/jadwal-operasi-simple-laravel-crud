<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalOperasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JadwalOperasi', function (Blueprint $table) {
            $table->id();
            $table->string('pasien', 191);
            $table->string('dokter', 191);
            $table->text('tindakan');
            $table->string('status', 64);
            $table->timestamp('jam_keluar');
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
        Schema::dropIfExists('JadwalOperasi');
    }
}
