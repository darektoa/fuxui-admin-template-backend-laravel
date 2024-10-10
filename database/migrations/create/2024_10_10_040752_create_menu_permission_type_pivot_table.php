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
        Schema::create('menu_permission_type_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('menu_permission_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('menu_permission_type_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_permission_type_pivot');
    }
};
