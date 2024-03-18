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
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->string('observation')->nullable();
            $table->double('part_payee')->default(0);
            $table->dateTime('date_entree')->nullable();
            $table->dateTime('date_sortie')->nullable();
            $table->double('prix_chambre')->default(0);
            $table->integer('nb_jour')->default(0);
            $table->integer('nb_passage_medecin')->default(0);
            $table->integer('nb_passage_medecin_specialiste')->default(0);
            $table->timestamps();
            $table->foreignId('facture_id')->nullable()->constrained('factures');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('medecin_traitant_id')->nullable()->constrained('personnel_medicals');
            $table->foreignId('chambre_id')->nullable()->constrained('chambres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitalisations');
    }
};
