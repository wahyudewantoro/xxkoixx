<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkPendafataranIkan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftaran_ikan', function (Blueprint $table) {
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftaran_ikan', function (Blueprint $table) {
            //
            $table->dropForeign('pendaftaran_ikan_pendaftaran_id_foreign');
        });
    }
}
