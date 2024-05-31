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
        Schema::disableForeignKeyConstraints();

        $tableName = 'f02_s';

        $sql = "ALTER TABLE $tableName ";

        for ($i = 1; $i <= 30; $i++) {
            $sql .= "CHANGE `$i` u_$i INT NOT NULL, ";
        }

        // Menghapus koma ekstra di akhir perintah SQL
        $sql = rtrim($sql, ', ');

        DB::statement($sql);

        // -----------------------------f03

        $tableName1 = 'f03_s';

        $sql1 = "ALTER TABLE $tableName1 ";

        for ($i = 1; $i <= 11; $i++) {
            $sql1 .= "CHANGE `$i` u_$i INT NOT NULL, ";
        }

        // Menghapus koma ekstra di akhir perintah SQL
        $sql1 = rtrim($sql1, ', ');

        DB::statement($sql1);

        $sql2 = "ALTER TABLE $tableName1 ";

        for ($i = 12; $i <= 14; $i++) {
            $sql2 .= "CHANGE `$i` u_$i INT NULL, ";
        }

        // Menghapus koma ekstra di akhir perintah SQL
        $sql2 = rtrim($sql2, ', ');

        DB::statement($sql2);

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
