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
        Schema::create('soins', function (Blueprint $table) {
            $table->id();
            $table->string('patient');
            $table->text('observation')->nullable();
            $table->double('part_payee')->default(0.0);
            
            $table->unsignedBigInteger('facture_id');
            $table->unsignedBigInteger('type_soin_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('dossier_medical_id');
            $table->unsignedBigInteger('personnel_medical_id');
            
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->foreign('type_soin_id')->references('id')->on('types_soins')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('dossier_medical_id')->references('id')->on('dossiers_medicaux')->onDelete('cascade');
            $table->foreign('personnel_medical_id')->references('id')->on('personnels_medicaux')->onDelete('cascade');

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
        Schema::dropIfExists('soins');
    }
};
