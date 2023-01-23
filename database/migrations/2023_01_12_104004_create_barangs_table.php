<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// use App\Models\Kategori;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_barang',10);
            $table->text('nama_barang');
            $table->integer('id_kategori');
            $table->integer('id_merk');
            $table->integer('id_warna');
            $table->integer('angka_size');
            $table->integer('id_size');
            $table->integer('stock');
            // $table->integer('harga_satuan');
            // $table->boolean('status_ada_retur');
            $table->timestamps();
            // $table->softDeletes();

        });

        
        // Schema::table('barang', function($table) {
        //     $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
