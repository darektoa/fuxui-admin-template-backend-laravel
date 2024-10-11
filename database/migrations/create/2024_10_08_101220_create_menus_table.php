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
        Schema::create('menus', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('menu_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('codename', 32)->index();
            $table->string('icon_uri')->nullable();
            $table->string('name', 32);
            $table->string('uri')->nullable();
            $table->unsignedTinyInteger('is_external_uri')->default(0);
            $table->string('description')->nullable();
            $table->string('tooltip', 100)->nullable();
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
        Schema::dropIfExists('menus');
    }
};
