<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_kk', function (Blueprint $table) {
            $table->string('nik',20)->primary();
            $table->string('nama',100);
            $table->date('ttl');
            $table->string('jenis_kelamin',10);
            $table->string('pendidikan',20);
            $table->string('agama',10);
            $table->string('pekerjaan',50);
            $table->string('nama_ibu_bapak',100);
            $table->string('status',20);
            $table->string('no_kk',20)->index()->nullable();
            $table->foreign('no_kk')->references('no_kk')->on('kk');
            $table->string('role');
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
        Schema::dropIfExists('anggota_kk');
    }
}
