<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incremented.
            $table->string('title'); // Title of the blog
            $table->string('slug', 191)->unique();
            $table->string('author');
            $table->text('content'); // Main body of the blog.
            $table->date('published_date'); // Explicit field for the blog's publication date.
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // Better categorization of blog status.
            $table->string('blog_image_path');
            $table->timestamps(); // Automatically add created_at and updated_at.
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
