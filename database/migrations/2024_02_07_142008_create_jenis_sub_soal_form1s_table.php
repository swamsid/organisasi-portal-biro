<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_sub_soal_form1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_soalf1_id')->unsigned();
            $table->foreign('jenis_soalf1_id')->references('id')->on('jenis_soal_form1s')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
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
        Schema::dropIfExists('jenis_sub_soal_form1s');
    }
};
