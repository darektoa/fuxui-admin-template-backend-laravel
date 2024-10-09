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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('access_token_id', 100)->nullable();
            $table->foreignUuid('client_id')->nullable()->constrained('oauth_clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUlid('user_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('url');
            $table->string('ip');
            $table->string('user_agent')->nullable();
            $table->json('parameters')->nullable();
            $table->json('headers')->nullable();
            $table->timestamps();

            $table->foreign('access_token_id')->on('oauth_access_tokens')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
