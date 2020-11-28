<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranIkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_ikan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('pendaftaran_id');
            $table->string('nama_handling')->nullable();
            $table->string('kota_handling')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('kota_pemilik')->nullable();
            $table->integer('jenis_ikan_id')->nullable();
            $table->string('jenis_ikan_nama')->nullable();
            $table->string('path_image')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('ukuran')->nullable();
            $table->integer('biaya')->nullable();
            $table->integer('status_bayar')->nullable();
            $table->string('breeder')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('created_at',0)->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('updated_at',0)->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('deleted_at',0)->nullable();
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
        Schema::dropIfExists('pendaftaran_ikan');
    }
}
