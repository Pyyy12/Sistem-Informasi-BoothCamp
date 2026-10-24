<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title', 160);
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->longText('description');
            $table->string('mentor_name', 120);
            $table->string('level', 30)->default('Pemula');
            $table->unsignedSmallInteger('duration_weeks')->default(8);
            $table->decimal('price', 12, 2)->default(0);
            $table->string('thumbnail', 2048)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            $table->index(['is_published','is_featured']);
        });
    }
    public function down(): void { Schema::dropIfExists('bootcamps'); }
};
