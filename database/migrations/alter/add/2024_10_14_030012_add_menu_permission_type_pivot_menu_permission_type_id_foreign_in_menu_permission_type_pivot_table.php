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
            $table->foreign('menu_permission_type_id', 'menu_permission_type_pivot_menu_permission_type_id_foreign')
                ->references('id')
                ->on('menu_permission_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_permission_type_pivot', function (Blueprint $table) {
            $table->dropForeign('menu_permission_type_pivot_menu_permission_type_id_foreign');
            $table->dropIndex('menu_permission_type_pivot_menu_permission_type_id_foreign');
        });
    }
};
