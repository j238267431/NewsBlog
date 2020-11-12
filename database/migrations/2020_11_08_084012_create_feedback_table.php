<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id()
                ->unsigned()
                ->nullable(false)
                ->unique()
                ->autoIncrement();
            $table->bigInteger('newsId')
                ->nullable(false)
                ->unsigned();
            $table->string('name');
            $table->text('feedback');
            $table->timestamps();
            $table->foreign('newsId')
                ->references('id')
                ->on('news');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
