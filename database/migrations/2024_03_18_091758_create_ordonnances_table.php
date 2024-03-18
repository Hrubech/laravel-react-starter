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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('consultation_id')->constrained('consultations');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->foreignId('dossier_medical_id')->constrained('dossier_medicals');
        });

        /*Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('prescription');
            $table->foreignId('ordonnance_id')->constrained('ordonnances');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnances');
    }
};
