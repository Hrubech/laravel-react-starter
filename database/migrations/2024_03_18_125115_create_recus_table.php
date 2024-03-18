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
        Schema::create('recus', function (Blueprint $table) {
            $table->id();
            $table->double('montant');
            $table->string('motif')->nullable();
            $table->string('lieu')->nullable();
            $table->dateTime('date_payment');
            $table->foreignId('facture_id')->constrained('factures');
            $table->foreignId('patient_id')->constrained('patients');
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
        Schema::dropIfExists('recus');
    }
};
