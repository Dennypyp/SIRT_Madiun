<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanNonfisikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_nonfisik', function (Blueprint $table) {
            $table->id();
            $table->string('nik',20)->index()->nullable();
            $table->string('kegiatan');
            $table->string('statusk');
            $table->integer('dana');
            $table->string('keterangan');
            $table->string('status_kegiatan');
            $table->foreign('nik')->references('nik')->on('anggota_kk');
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
        Schema::dropIfExists('kegiatan_nonfisik');
    }
}
