<?php

namespace Database\Seeders;

use App\Models\Assurance;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Patient1'; 
        $user1->email = 'patient1@gmail.com';
        $user1->password = bcrypt('Password$2024');
        $user1->save(); 

        $user2 = new User();
        $user2->name = 'Patient2'; 
        $user2->email = 'patient2@gmail.com';
        $user2->password = bcrypt('Password$2024');
        $user2->save(); 
        
        $assurance = new Assurance();
        $assurance->nom = 'Axa';
        $assurance->description = "1ère marque mondiale de l’assurance pour la 10ème année consécutive.";
        $assurance->image = 'axa_assurance.jpg';
        $assurance->taux = 3;
        $assurance->save();
        
        $assurance = new Assurance();
        $assurance->nom = 'Cnamgs';
        $assurance->description = "l\’amélioration de l\’accès aux soins de santé";
        $assurance->image = 'cnamgs_assurance.png';
        $assurance->taux = 4;
        $assurance->save();

        $assurance = new Assurance();
        $assurance->nom = 'Sunu';
        $assurance->description = "2ème compagnie Vie du marché gabonais avec plus de 22 milliards de FCFA d\’actifs gérés.";
        $assurance->image = 'sunu_assurance.jpg';
        $assurance->taux = 3;
        $assurance->save();  

        $patientUser1 = User::where('name', 'Patient1')->first();
        $patientUser2 = User::where('name', 'Patient2')->first();
        $assurance1 = Assurance::where('nom', 'Axa')->first();
        $assurance2 = Assurance::where('nom', 'Cnamgs')->first();

        $patient1 = new Patient();
        $patient1->user_id = $patientUser1->id; 
        $patient1->fonction = 'Manager';
        $patient1->personne_a_contacter = 'Marie Dupont';
        $patient1->fonction_personne = 'Secrétaire';
        $patient1->lien_parente = 'Conjoint';
        $patient1->contact_personne = '123456789';
        $patient1->adresse_personne = '123 Rue de la République';
        $patient1->save();
        $patient1->assurances()->attach($assurance1); 
        
        $patient2 = new Patient();
        $patient2->user_id = $patientUser2->id; 
        $patient2->fonction = 'Médecin';
        $patient2->personne_a_contacter = 'Pierre Durand';
        $patient2->fonction_personne = 'Ingénieur';
        $patient2->lien_parente = 'Parent';
        $patient2->contact_personne = '987654321';
        $patient2->adresse_personne = '456 Avenue des Champs-Élysées';
        $patient2->save();
        $patient2->assurances()->attach($assurance2); 
    }
}