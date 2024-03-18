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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('medicament');
            $table->string('dose')->nullable();
            $table->string('nb_prise_par_jour')->nullable();
            $table->string('duree_traitement')->nullable();
            $table->timestamps();
            $table->foreignId('ordonnance_id')->constrained('ordonnances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
