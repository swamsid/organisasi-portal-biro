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
        Schema::create('soal_form1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_jenis_soalf1_id')->unsigned();
            $table->foreign('sub_jenis_soalf1_id')->references('id')->on('jenis_sub_soal_form1s')->onDelete('cascade')->onUpdate('cascade');
            $table->string('keterangan');
            $table->string('soal');
            $table->string('type_soal');
            $table->enum('has_child', ["true", "false"])->default("false");
            $table->json('parent_json_soal')->nullable();
            $table->json('child_json_soal')->nullable();
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
        Schema::dropIfExists('soal_form1s');
    }
};
