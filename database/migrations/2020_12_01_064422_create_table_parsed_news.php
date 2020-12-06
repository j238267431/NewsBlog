<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableParsedNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsedNews', function (Blueprint $table) {
            $table->id()->autoIncrement()->nullable(false)->unsigned();
            $table->string('title', 100);
            $table->string('link', 200)->nullable(true);
            $table->integer('guid')->nullable(true);
            $table->string('description', 900);
            $table->string('image', 200)->nullable(true);
            $table->string('pubDate', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parsedNews');
    }
}
