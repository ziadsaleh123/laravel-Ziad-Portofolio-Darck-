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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('section_title')->nullable();

            $table->text('section_description')->nullable();

            $table->string('badge')->nullable();

            $table->string('main_title')->nullable();

            $table->longText('paragraph_one')->nullable();

            $table->longText('paragraph_two')->nullable();

            $table->string('name')->nullable();

            $table->string('specialty')->nullable();

            $table->string('focus')->nullable();

            $table->string('goal')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
