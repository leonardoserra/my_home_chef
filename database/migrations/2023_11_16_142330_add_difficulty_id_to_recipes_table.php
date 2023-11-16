<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('difficulty_id')->nullable()->after('user_id');

            $table->foreign('difficulty_id')
            ->references('id')
            ->on('difficulties')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign('recipes_diffuculty_id_foreign');
            $table->dropColumn('difficulty_id');
        });
    }
};
