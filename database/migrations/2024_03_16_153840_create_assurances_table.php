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
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('taux')->nullable();
            $table->timestamps(); 

            // Index pour améliorer les performances lors des requêtes
            $table->index('id');

            // Relations
            // Aucune contrainte d'intégrité sur la table facture (orphanRemoval = true, cascade = CascadeType.ALL)
            // La clé étrangère dans la table facture doit être gérée séparément

            // Many-to-Many relation avec la table patient
            //$table->unsignedBigInteger('patient_id');
            //$table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};