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
        Schema::create('test_quz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('quz_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('quz_id')->references('id')->on('quzs')->onDelete('cascade');
            $table->unique(['test_id', 'quz_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_quz');
    }
};
