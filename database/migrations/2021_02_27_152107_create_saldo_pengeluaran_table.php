<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoPengeluaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('saldo_id')->index()->nullable();
            $table->unsignedInteger('pengeluaran_id')->index()->nullable();
            $table->foreign('saldo_id')
                ->references('id')
                ->on('saldo');
            $table->foreign('pengeluaran_id')
                ->references('id')
                ->on('pengeluaran');
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
        Schema::dropIfExists('saldo_pengeluaran');
    }
}
