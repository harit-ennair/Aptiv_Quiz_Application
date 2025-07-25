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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('process_id')->nullable();
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade');
            $table->date('create_at')->default(now());
            $table->timestamps();
        });

        //     - id : Integer
// - title : String
// - create_at : date
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
