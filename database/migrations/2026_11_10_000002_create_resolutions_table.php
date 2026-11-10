<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('resolution_number', 50)->unique();
            $table->string('title');
            $table->date('date_passed');
            $table->string('author');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('title');
            $table->index('date_passed');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resolutions');
    }
};
