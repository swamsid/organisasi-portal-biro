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
        Schema::create('media_informasis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('link_embed');
            $table->string('email');
            $table->string('alamat');
            $table->string('telp');
            $table->string('hotline');
            $table->string('link_web');
            $table->enum('tarif', ['gratis', 'berbayar', 'menyesuaikan'])->comment('0 => gratis', '1 => berbayar', 'menyesuaikan');
            $table->string('link_akses');
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
            $table->uuid('layanan_id');
            $table->foreign('layanan_id')->references('id')->on('layanans')
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
        Schema::dropIfExists('media_informasis');
    }
};
