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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->double('montant_total')->default(0);
            $table->boolean('reduction_appliquee')->default(false);
            $table->integer('pourcentage_reduction')->nullable();
            $table->double('part_payee_assurance')->default(0);
            $table->double('part_payee_patient')->default(0);
            $table->double('reste_a_payer')->default(0);
            $table->string('etat');
            $table->foreignId('consultation_id')->nullable()->constrained('consultations');
            $table->foreignId('hospitalisation_id')->nullable()->constrained('hospitalisations');
            $table->foreignId('bon_examen_id')->nullable()->constrained('bon_examens');
            $table->foreignId('recu_id')->nullable()->constrained('recus');
            $table->foreignId('assurance_id')->nullable()->constrained('assurances');
            $table->foreignId('patient_id')->constrained('patients');
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
        Schema::dropIfExists('factures');
    }
};
