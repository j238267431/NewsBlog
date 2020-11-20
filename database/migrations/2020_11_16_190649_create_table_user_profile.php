<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserProfile', function (Blueprint $table) {
            $table->bigInteger('user_id')
                ->nullable(false)
                ->unsigned()
                ->unique();
            $table->string('from_city', 255);
            $table->date('date_of_birth');
            $table->string('photo', 255);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('UserProfile', function (Blueprint $table){
           $table->dropForeign('userprofile_user_id_unique');
        });
        Schema::dropIfExists('UserProfile');
    }
}
