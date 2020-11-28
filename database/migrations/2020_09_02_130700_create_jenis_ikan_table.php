<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisIkanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_ikan', function (Blueprint $table) {
          /*   ;
            $table->timestamps(); */
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kelas');
            $table->string('kelas_alias');
            $table->integer('sort');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_ikan');
    }
}
