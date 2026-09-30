<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->unsignedInteger('surface')->nullable();
            $table->decimal('prix', 15, 0)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->enum('statut', ['Disponible', 'Réservé', 'Vendu'])->default('Disponible');
            $table->json('caracteristiques')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('terrains'); }
};
