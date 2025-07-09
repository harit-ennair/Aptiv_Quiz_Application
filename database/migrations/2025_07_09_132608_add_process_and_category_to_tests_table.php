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
        Schema::table('tests', function (Blueprint $table) {
            $table->unsignedBigInteger('process_id')->nullable()->after('formateur_id');
            $table->unsignedBigInteger('category_id')->nullable()->after('process_id');
            
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropForeign(['process_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['process_id', 'category_id']);
        });
    }
};
