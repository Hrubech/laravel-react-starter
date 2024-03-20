<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Acte;
use Illuminate\Support\Facades\DB;

class ExamenService
{
    private $acteService;

    public function __construct(ActeService $acteService)
    {
        $this->acteService = $acteService;
    }

    public function getAllExamens()
    {
        return Examen::orderByDesc('created_at')->get();
    }

    public function getExamensByFilters(array $filters)
    {
        // Implémentez la logique pour filtrer les examens en fonction des filtres fournis
    }

    public function count()
    {
        return Examen::count();
    }

    public function getExamenById($id)
    {
        return Examen::find($id);
    }

    public function createExamen(array $data)
    {
        DB::beginTransaction();

        try {
            // Créez un nouvel examen
            $examen = Examen::create([
                'nom' => $data['nom'],
                'dateCreation' => $data['dateCreation'],
                'priseEnChargeStructure' => $data['priseEnChargeStructure'],
                // Ajoutez d'autres champs nécessaires
            ]);

            // Créez l'acte associé à l'examen
            $acte = new Acte([
                'nom' => $examen->nom,
                'dateCreation' => $examen->dateCreation,
                // Ajoutez d'autres champs nécessaires
            ]);
            $examen->acte()->save($acte);

            DB::commit();
            
            return $examen;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function updateExamen($id, array $data)
    {
        DB::beginTransaction();

        try {
            // Récupérez l'examen
            $examen = Examen::findOrFail($id);

            // Mettez à jour les champs nécessaires
            $examen->update([
                'nom' => $data['nom'],
                'priseEnChargeStructure' => $data['priseEnChargeStructure'],
                // Ajoutez d'autres champs nécessaires
            ]);

            DB::commit();

            return $examen;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function deleteExamen($id)
    {
        $examen = Examen::find($id);

        if ($examen) {
            return $examen->delete();
        }

        return false;
    }
}