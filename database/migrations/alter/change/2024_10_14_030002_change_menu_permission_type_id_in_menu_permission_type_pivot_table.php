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
        Schema::table('menu_permission_type_pivot', function (Blueprint $table) {
            $table->foreignId('menu_permission_type_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_permission_type_pivot', function (Blueprint $table) {
            $table->foreignUlid('menu_permission_type_id')->change();
        });
    }
};
