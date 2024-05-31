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
        Schema::table('master_f02_s', function (Blueprint $table) {
            $table->enum('jenis', ['A', 'B'])->after('indikator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_f02_s', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });
    }
};
