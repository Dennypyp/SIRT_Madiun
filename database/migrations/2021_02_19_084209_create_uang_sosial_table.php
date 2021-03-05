<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangSosialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_sosial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nkk',20)->index()->nullable();
            $table->foreign('nkk')->references('no_kk')->on('kk');
            $table->date('tanggal_jimpitan');
            $table->integer('jumlah_jimpitan');
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
        Schema::dropIfExists('uang_sosial');
    }
}
