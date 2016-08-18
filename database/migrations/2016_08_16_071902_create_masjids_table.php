<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasjidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('pulau_id');
            $table->integer('provinsi_id');
            $table->integer('kota_id');
            $table->integer('kecamatan_id');
            $table->integer('kelurahan_id');
            $table->string('alamat');
            $table->string('kontak_nama');
            $table->string('kontak_telp');
            $table->decimal('lat', 10, 6);
            $table->decimal('long', 10, 6);
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
        Schema::drop('masjids');
    }
}
