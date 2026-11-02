<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('destination');
            $table->string('category');
            $table->string('duration');
            $table->decimal('price', 10, 2);
            $table->char('currency', 3)->default('USD');
            $table->string('image_url', 2048);
            $table->string('summary', 240);
            $table->text('description');
            $table->text('itinerary')->nullable();
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
