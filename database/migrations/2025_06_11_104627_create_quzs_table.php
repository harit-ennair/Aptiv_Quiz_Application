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
        Schema::create('quzs', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('test_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->date('create_at')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quzs');
    }
};
