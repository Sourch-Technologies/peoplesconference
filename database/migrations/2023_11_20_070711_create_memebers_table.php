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
        Schema::create('memebers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', ['M','F','O']);
            $table->enum('is_Active', ['0','1'])->default('0');
            $table->string('photo');
            $table->foreignId('section_id')->constrained('section_names')->onDelete('cascade');
            $table->timestamps();
        });
    }

   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memebers');
    }
};
