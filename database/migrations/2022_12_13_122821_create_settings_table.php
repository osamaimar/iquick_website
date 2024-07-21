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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("iquick");
            $table->string('header_logo')->default("assets/images/logo/IQuick4.png");
            $table->string('footer_logo')->default("assets/images/logo/IQuick5.png");
            $table->string('icon')->default("assets/images/favicon.ico");
            $table->text('small_description')->default("Loptus Digital Marketing HTML5 Template Is fully responsible, Performance oriented theme, Build whatever you like with the Loptus, Loptus is the creative, modern HTML5 Template suitable for ");
            $table->text('about_us')->default("Loptus Digital Marketing HTML5 Template Is fully responsible, Performance oriented theme, Build whatever you like with the Loptus, Loptus is the creative, modern HTML5 Template suitable for ");
            $table->string('phone')->default("iquick");
            $table->string('email')->default("iquick");
            $table->string('address')->default("iquick");
            $table->string('facebook')->default("iquick");
            $table->string('twitter')->default("iquick");
            $table->string('insta')->default("iquick");
            $table->string('youtube')->default("iquick");
            $table->string('Linkedin')->default("iquick");
            $table->string('mail_password')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('live_chat')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
