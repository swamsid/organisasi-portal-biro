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
        Schema::create('kabkots', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('logo');
            $table->char('regency_id', 4);
            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('kabkots');
    }
};
