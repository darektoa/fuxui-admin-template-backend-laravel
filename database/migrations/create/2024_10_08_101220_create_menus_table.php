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
            $table->string('name', 32);
            $table->string('uri');
            $table->boolean('is_external_uri')->default(false);
            $table->string('desc', 255);
            $table->integer('depth')->default(0);
            $table->integer('order')->default(1);
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
