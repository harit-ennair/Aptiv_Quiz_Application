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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('formateur_id');
            $table->integer('resultat');
            $table->integer('pourcentage');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
            $table->date('create_at')->default(now());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
