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
        Schema::create('assigned_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("admin_id");
            $table->foreignId("user_task_id");
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->text('notes')->nullable();
            $table->timestamp("start_date")->nullable();
            $table->timestamp("end_date")->nullable();
            $table->integer("time_duration")->nullable();
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
        Schema::dropIfExists('assigned_tasks');
    }
};
