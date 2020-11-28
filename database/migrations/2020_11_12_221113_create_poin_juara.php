<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoinJuara extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poin_juara', function (Blueprint $table) {
            // refjuara_id,refjuara_nama,ukuran_min,ukuran_max,poin,alias_juara
            $table->bigIncrements('id');
            $table->integer('refjuara_id');
            $table->string('refjuara_nama');
            $table->integer('ukuran_min');
            $table->integer('ukuran_max');
            $table->integer('poin');
            $table->string('alias_juara');
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
        Schema::dropIfExists('poin_juara');
    }
}
