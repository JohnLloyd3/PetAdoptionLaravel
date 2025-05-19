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
        Schema::create('pets', function (Blueprint $table) {
            $table->id('p_id');
            $table->foreignId('u_id')->constrained('users')->onDelete('cascade');
            $table->string('p_name');
            $table->string('p_size');
            $table->integer('p_age');
            $table->string('p_breed');
            $table->string('p_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
