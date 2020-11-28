<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            /* $table->bigIncrements('id');
            $table->timestamps(); */
            $table->string('id')->primary();
            $table->string('code')->nullable();
            $table->string('nama_handling')->nullable();
            $table->string('kota_handling')->nullable();
            $table->string('no_telepon',20)->nullable();
            // $table->string('branch')->nullable();
            $table->dateTime('created_at',0)->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('updated_at',0)->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('deleted_at',0)->nullable();
            $table->integer('deleted_by')->nullable();
            $table->dateTime('bayar_at',0)->nullable();
            $table->integer('bayar_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}
