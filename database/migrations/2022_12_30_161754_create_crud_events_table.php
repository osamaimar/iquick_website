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
        Schema::create('crud_events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('event_name');
            $table->date('event_start');
            $table->date('event_end');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('crud_events');
    }
};
