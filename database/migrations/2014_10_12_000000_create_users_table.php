<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //Chefs table
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->required()->unique();
            $table->string('email', 200)->required()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',150)->required();
            $table->text('description',150)->nullable();
            $table->string('profile_picture_path')->default("/img/default_img.png");
            $table->tinyInteger('visibility')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
