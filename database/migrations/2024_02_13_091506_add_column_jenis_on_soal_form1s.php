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
        Schema::table('soal_form1s', function (Blueprint $table) {
            $table->enum('jenis', ["A", "B"])->nullable()->default('B')->comment('A:Luring , B:Daring')->after('sub_jenis_soalf1_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal_form1s', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });
    }
};
