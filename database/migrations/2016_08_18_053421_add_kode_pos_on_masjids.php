<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKodePosOnMasjids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('masjids', function (Blueprint $table) {
            $table->string('kode_pos', 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('masjids', function (Blueprint $table) {
            $table->dropColumn('kode_pos');
        });
    }
}
