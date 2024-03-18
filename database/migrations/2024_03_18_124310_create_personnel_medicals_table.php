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
        Schema::create('personnel_medicals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('username');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_de_naissance');
            $table->string('adresse');
            $table->string('contact');
            $table->string('email');
            $table->string('mot_de_passe');
            $table->timestamps();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('service_id')->nullable()->constrained('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_medicals');
    }
};
