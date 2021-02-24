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
            $table->string('kegiatan');
            $table->string('nama_pengusul');
            $table->string('alamat_pengusul');
            $table->string('status');
            $table->integer('dana');
            $table->string('keterangan');
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
