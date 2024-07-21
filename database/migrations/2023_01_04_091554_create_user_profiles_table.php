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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("username")->nullable();
            $table->date("date_of_Birth")->nullable();
            $table->string("gender")->nullable();
            $table->string("profile_image")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string("post_number")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('user_profiles');
    }
};
