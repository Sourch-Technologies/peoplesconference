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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', ['M','F','O']);
            $table->string('photo')->nullable();
            $table->foreignId('section_name_id')->constrained('section_names')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    // $table->enum('is_Active', ['0','1'])->default('0');
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memebers');
    }
};
