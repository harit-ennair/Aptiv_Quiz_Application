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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->unsignedBigInteger('categories_id')->nullable();
            // $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->date('create_at')->default(now());
            $table->timestamps();
        });

        // - id : Integer
// - title : String
// - categories_id : Integer
// - create_at : date
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
