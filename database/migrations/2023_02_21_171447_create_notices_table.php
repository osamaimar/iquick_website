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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string("user_name")->nullable();
            $table->string("messages")->nullable();
            $table->string("order_code")->nullable();
            $table->string("order_status")->nullable();
            $table->string("filed_name")->nullable();
            $table->string("attchname")->nullable();
            $table->string("user_id")->nullable();
            $table->string("employee_type")->nullable();
            $table->string("employee_id")->nullable();
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
        Schema::dropIfExists('notices');
    }
};
