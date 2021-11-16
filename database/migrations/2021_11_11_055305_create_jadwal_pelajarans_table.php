<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_mata_pelajaran_id')->nullable();
            $table->unsignedBigInteger('jam_pelajaran_id');
            $table->unsignedBigInteger('rombel_id');
            $table->foreign('guru_mata_pelajaran_id')->on('guru_mata_pelajarans')->references('id')->onDelete('cascade');
            $table->foreign('jam_pelajaran_id')->on('jam_pelajarans')->references('id')->onDelete('cascade');
            $table->foreign('rombel_id')->on('rombels')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('jadwal_pelajarans');
    }
}
