<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userProfile', function (Blueprint $table) {
            $table->id()
                ->nullable(false)
                ->autoIncrement()
                ->unique()
                ->unsigned();
            $table->date('day_of_birth')->nullable(true);
            $table->string('image', '150')->nullable(true);
            $table->string('city_of_origin')->nullable(true);
            $table->binary('sex')->nullable(true);
            $table->string('email')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userProfile');
    }
}
