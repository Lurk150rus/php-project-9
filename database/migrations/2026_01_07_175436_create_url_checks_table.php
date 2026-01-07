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
        Schema::create('url_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('url_id')->constrained('urls', 'id')->cascadeOnDelete();
            $table->string('status_code');
            $table->string('h1');
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_checks');
    }
};
