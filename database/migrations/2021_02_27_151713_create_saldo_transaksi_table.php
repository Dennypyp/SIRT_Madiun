<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saldo_id')->index()->nullable();
            $table->unsignedInteger('transaksi_id')->index()->nullable();
            $table->foreign('saldo_id')
                ->references('id')
                ->on('saldo');
            $table->foreign('transaksi_id')
                ->references('id')
                ->on('transaksi');
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
        Schema::dropIfExists('saldo_pemasukan');
    }
}
