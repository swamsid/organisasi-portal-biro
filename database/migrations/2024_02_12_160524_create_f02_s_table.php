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
        Schema::create('f02_s', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('master_form_id');
            $table->foreign('master_form_id')->references('id')->on('master_forms')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('verifikator_id');
            $table->foreign('verifikator_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('jenis', ['A', 'B']);
            $table->string('file');
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
            $table->integer('12');
            $table->integer('13');
            $table->integer('14');
            $table->integer('15');
            $table->integer('16');
            $table->integer('17');
            $table->integer('18');
            $table->integer('19');
            $table->integer('20');
            $table->integer('21');
            $table->integer('22');
            $table->integer('23');
            $table->integer('24');
            $table->integer('25');
            $table->integer('26');
            $table->integer('27');
            $table->integer('28');
            $table->integer('29');
            $table->integer('30');
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
        Schema::dropIfExists('f02_s');
    }
};
