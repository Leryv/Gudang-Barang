<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_reg', 20)->nullable()->default('Kode Tidak Valid');
            $table->string('nama_barang', 30)->nullable()->default('Nama Tidak Valid');
            $table->string('harga')->nullable()->default('text');
            // $table->foreignId('kategori_id')->unsigned();
            // $table->foreignId('brand_id')->unsigned();
            // $table->foreignId('satuan_id')->unsigned();
            $table->unsignedInteger('kategori_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('satuan_id')->nullable();
            $table->integer('stock')->unsigned();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}