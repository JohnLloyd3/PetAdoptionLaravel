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
        Schema::dropIfExists('adoptions');

        Schema::create('adoptions', function (Blueprint $table) {
            $table->id('a_id');
            $table->unsignedBigInteger('adopter_id');
            $table->unsignedBigInteger('pet_id');
            $table->date('adoption_date')->nullable();
            $table->timestamps();

            $table->foreign('adopter_id')->references('a_id')->on('adopters')->onDelete('cascade');
            $table->foreign('pet_id')->references('p_id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');

        Schema::create('adoptions', function (Blueprint $table) {
            $table->id('a_id');
            $table->foreignId('u_id')->constrained('users')->onDelete('cascade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->timestamps();
        });
    }
};
