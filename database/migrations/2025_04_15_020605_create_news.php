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
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('title');
            $table->string('short_desc')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_breaking_news')->default(false);
            $table->string('author')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('views')->default(0); // field views ditambahkan di sini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
