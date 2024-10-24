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
        Schema::create('contents', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('directory_id')->nullable()->constrained('content_directories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_id')->constrained('content_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('using_content_id')->nullable()->constrained('contents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('codename', 32)->unique()->nullable();
            $table->string('value')->nullable();
            $table->json('json')->nullable();
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
        Schema::dropIfExists('contents');
    }
};
