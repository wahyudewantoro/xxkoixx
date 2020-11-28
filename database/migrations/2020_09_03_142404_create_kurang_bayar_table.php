<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurangBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurang_bayar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pendaftaran_ikan_id');
            $table->integer('nominal');
            $table->dateTime('created_at', 0)->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('updated_at', 0)->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('deleted_at', 0)->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kurang_bayar');
    }
}
