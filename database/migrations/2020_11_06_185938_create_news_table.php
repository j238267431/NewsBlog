<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id()
                ->nullable(false)
                ->autoIncrement()
                ->unsigned()
                ->unique();
            $table->bigInteger('categoryId')
                ->nullable(false)
                ->unsigned()
                ->comment('id категории');
            $table->bigInteger('resourceId')
                ->comment('id сточника данных')
                ->nullable(false)
                ->unsigned();
            $table->string('title')
                ->comment('заголовок');
            $table->text('description')
                ->comment('описание новости');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
