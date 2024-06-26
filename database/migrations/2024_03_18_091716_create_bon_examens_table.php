<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_examens', function (Blueprint $table) {
            $table->id();
            $table->string('salle')->nullable();
            $table->text('renseignement_clinique')->nullable(); 
            $table->foreignId('consultation_id')->constrained('consultations');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('dossier_medical_id')->constrained('dossier_medicals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bon_examens');
    }
};
