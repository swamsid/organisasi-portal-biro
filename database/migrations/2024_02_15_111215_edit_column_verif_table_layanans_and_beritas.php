<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('layanans', function (Blueprint $table) {
            DB::statement("ALTER TABLE layanans MODIFY COLUMN verif ENUM('0','1','2')");
        });
        Schema::table('beritas', function (Blueprint $table) {
            DB::statement("ALTER TABLE beritas MODIFY COLUMN verif ENUM('0','1','2')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layanans', function (Blueprint $table) {
            DB::statement("ALTER TABLE layanans MODIFY COLUMN verif ENUM('0','1')");
        });
        Schema::table('beritas', function (Blueprint $table) {
            DB::statement("ALTER TABLE beritas MODIFY COLUMN verif ENUM('0','1')");
        });
    }
};
