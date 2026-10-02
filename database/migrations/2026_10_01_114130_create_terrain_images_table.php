<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terrain_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('terrain_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('image');

            $table->integer('ordre')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terrain_images');
    }
};