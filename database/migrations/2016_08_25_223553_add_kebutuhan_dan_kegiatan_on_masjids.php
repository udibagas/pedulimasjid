<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKebutuhanDanKegiatanOnMasjids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('masjids', function (Blueprint $table) {
            $table->string('kebutuhan');
            $table->string('kegiatan');
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
            $table->dropColumn(['kebutuhan', 'kegiatan']);
        });
    }
}
