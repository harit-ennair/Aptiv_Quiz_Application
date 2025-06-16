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
        // Update quzs table to better represent questions
        Schema::table('quzs', function (Blueprint $table) {
            $table->renameColumn('description', 'question_text');
        });

        // Update repos table to better represent answers
        Schema::table('repos', function (Blueprint $table) {
            $table->renameColumn('description', 'answer_text');
            $table->renameColumn('status', 'is_correct');
            $table->dropColumn('create_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repos', function (Blueprint $table) {
            $table->renameColumn('answer_text', 'description');
            $table->renameColumn('is_correct', 'status');
            $table->date('create_at')->default(now());
        });

        Schema::table('quzs', function (Blueprint $table) {
            $table->renameColumn('question_text', 'description');
        });
    }
};
