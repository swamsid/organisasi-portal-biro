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
        Schema::create('f03_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedInteger('master_form_id');
            $table->foreign('master_form_id')->references('id')->on('master_forms')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('jenis', ['A', 'B']);
            $table->string('no_hp');
            $table->string('nama');
            $table->integer('1');
            $table->integer('2');
            $table->integer('3');
            $table->integer('4');
            $table->integer('5');
            $table->integer('6');
            $table->integer('7');
            $table->integer('8');
            $table->integer('9');
            $table->integer('10');
            $table->integer('11');
            $table->integer('12')->nullable();
            $table->integer('13')->nullable();
            $table->integer('14')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f03_s');
    }
};
