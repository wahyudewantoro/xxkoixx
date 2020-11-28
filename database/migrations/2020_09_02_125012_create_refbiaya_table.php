<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefbiayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refbiaya', function (Blueprint $table) {
            /* $table->bigIncrements('id');
            $table->timestamps(); */
            $table->bigIncrements('id');
            $table->integer('ukuran_min');
            $table->integer('ukuran_max');
            $table->integer('biaya');
            $table->longText('keterangan')->nullable();
            $table->dateTime('created_at',0)->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('updated_at',0)->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refbiaya');
    }
}
