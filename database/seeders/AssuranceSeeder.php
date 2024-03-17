<?php

namespace Database\Seeders;

use App\Models\Assurance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Assurance();
        $permission->nom = 'Axa';
        $permission->description = "1ère marque mondiale de l’assurance pour la 10ème année consécutive.";
        $permission->image = 'axa_assurance.jpg';
        $permission->taux = 3;
        $permission->save();
        
        $permission = new Assurance();
        $permission->nom = 'Cnamgs';
        $permission->description = "l\’amélioration de l\’accès aux soins de santé";
        $permission->image = 'cnamgs_assurance.png';
        $permission->taux = 4;
        $permission->save();

        $permission = new Assurance();
        $permission->nom = 'Sunu';
        $permission->description = "2ème compagnie Vie du marché gabonais avec plus de 22 milliards de FCFA d\’actifs gérés.";
        $permission->image = 'sunu_assurance.jpg';
        $permission->taux = 3;
        $permission->save();  
    }
}