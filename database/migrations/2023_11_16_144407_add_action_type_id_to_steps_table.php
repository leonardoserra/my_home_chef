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
        Schema::table('steps', function (Blueprint $table) {
            $table->unsignedBigInteger('action_type_id')->nullable()->after('recipe_id');

            $table->foreign('action_type_id')
            ->references('id')
            ->on('action_types')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->dropForeign('steps_action_type_id_foreign');
            $table->dropColumn('action_type_id');
        });
    }
};
