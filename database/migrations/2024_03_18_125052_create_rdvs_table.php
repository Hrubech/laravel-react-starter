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
        Schema::create('rdvs', function (Blueprint $table) {
            $table->id();
            $table->string('patient');
            $table->string('contact');
            $table->string('sexe');
            $table->dateTime('date');
            $table->string('heure');
            $table->string('etat');
            $table->foreignId('personnel_medical_id')->constrained('personnel_medical');
            $table->foreignId('service_id')->constrained('services');
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
        Schema::dropIfExists('rdvs');
    }
};
