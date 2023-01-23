<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barang_id')->unsigned();
            $table->integer('keluar_id')->unsigned();
            $table->integer('jumlah_retur');
            $table->string('alasan');
            $table->date('tanggal_retur');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('barang_id')
                    ->references('id')
                    ->on('barang')
                    ->onCascade('delete');
            $table->foreign('keluar_id')
                    ->references('id')
                    ->on('barang_keluar')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur');
    }
}
