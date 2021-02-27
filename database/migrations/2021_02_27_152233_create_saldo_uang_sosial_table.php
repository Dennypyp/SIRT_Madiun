<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoUangSosialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_uang_sosial', function (Blueprint $table) {
            $table->id();
            $table->increments('id');
            $table->unsignedInteger('saldo_id')->index()->nullable();
            $table->unsignedInteger('uang_sosial_id')->index()->nullable();
            $table->foreign('saldo_id')
                ->references('id')
                ->on('saldo');
            $table->foreign('uang_sosial_id')
                ->references('id')
                ->on('uang_sosial');
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
        Schema::dropIfExists('saldo_uang_sosial');
    }
}
