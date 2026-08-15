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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
             $table->string('logo')->nullable();
        $table->string('main_title')->nullable();
        $table->text('description')->nullable();
        $table->string('button_text')->nullable();
        $table->string('main_image')->nullable();

        $table->string('experience_years')->nullable();
        $table->string('projects_count')->nullable();
        $table->string('skills_count')->nullable();
        $table->string('happy_clients')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
