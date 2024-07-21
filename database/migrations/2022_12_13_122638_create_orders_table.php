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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('file')->nullable();
            $table->enum('status',['done','canceled','pending','successful']);
            $table->integer('total_price');
            $table->text('description_cust')->nullable();
            $table->enum('type_order',['service','package']);
            $table->string("rating")->nullable();
            $table->foreignId('type_id');
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
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
        Schema::dropIfExists('orders');
    }
};
