<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmedOnDonasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->boolean('confirmed');
            $table->string('bank_pengirim');
            $table->string('rekening_pengirim');
            $table->string('bank_penerima');
            $table->string('penerima');
            $table->string('rekening_penerima');
            $table->string('bukti_transfer');
            $table->string('pengirim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->dropColumn(['confirmed', 'bank_pengirim', 'rekening_pengirim', 'bank_penerima', 'penerima', 'rekening_penerima', 'pengirim', 'bukti_transfer']);
        });
    }
}
