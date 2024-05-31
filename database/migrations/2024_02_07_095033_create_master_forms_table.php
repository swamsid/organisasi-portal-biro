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
        Schema::create('master_forms', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('unit_lokuses')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periodes')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('master_forms');
    }
};
