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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('fonction')->nullable();
            $table->string('personne_a_contacter')->nullable();
            $table->string('fonction_personne')->nullable();
            $table->string('lien_parente')->nullable();
            $table->string('contact_personne')->nullable();
            $table->string('adresse_personne')->nullable();
            // Ajoutez les colonnes supplémentaires selon vos besoins
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('assurance_patient', function (Blueprint $table) {
            $table->foreignId('assurance_id')->constrained('assurance');
            $table->foreignId('patient_id')->constrained('patient');
            $table->primary(['assurance_id', 'patient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
        Schema::dropIfExists('assurance_patient');
    }
};