<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFormatedDateParsedNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parsedNews', function (Blueprint $table) {
            $table->dateTime('pubDateFormatted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parsedNews', function (Blueprint $table) {
            $table->dropColumn('pubDateFormatted');
        });
    }
}
