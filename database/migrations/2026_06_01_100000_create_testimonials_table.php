<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();        // e.g. "Parent", "Class XII Graduate"
            $table->string('relation')->nullable();           // parent | student | alumni | staff
            $table->text('content');
            $table->unsignedTinyInteger('rating')->default(5); // 1-5 stars
            $table->string('photo_path')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
