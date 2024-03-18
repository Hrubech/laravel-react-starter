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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('resultat')->nullable();
            $table->boolean('prise_en_charge_structure')->default(false);
            $table->foreignId('hospitalisation_id')->nullable()->constrained('hospitalisations');
            $table->foreignId('bon_examen_id')->nullable()->constrained('bon_examens');
            $table->foreignId('type_examen_id')->constrained('type_examens');
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
        Schema::dropIfExists('examens');
    }
};
