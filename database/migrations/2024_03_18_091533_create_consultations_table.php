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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('diagnostic')->nullable();
            $table->string('motif')->nullable();
            $table->string('lieu')->nullable();
            $table->double('prix')->default(0.0);
            $table->double('part_payee_par_patient')->default(0.0);
            $table->enum('etat', ['TERMINEE', 'EN_COURS'])->default('EN_COURS');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('dossier_medical_id')->constrained('dossier_medicals');
            $table->foreignId('personnel_medical_id')->constrained('personnel_medicals');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
