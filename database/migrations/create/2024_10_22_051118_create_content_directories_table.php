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
        Schema::create('content_directories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('directory_id')->nullable()->constrained('content_directories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('menu_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('codename', 32)->unique()->nullable();
            $table->unsignedTinyInteger('depth')->default(0);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_directories');
    }
};
