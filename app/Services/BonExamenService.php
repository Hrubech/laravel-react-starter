<?php

namespace App\Services;

use App\Models\BonExamen;
use Illuminate\Support\Facades\DB;

class BonExamenService
{
    public function getAllBonExamens()
    {
        return BonExamen::orderByDesc('dateCreation')->get();
    }

    public function getBonExamensByFilters(array $filters)
    {
        // Implémentez la logique pour filtrer les bonExamens selon les critères donnés
    }

    public function count()
    {
        return BonExamen::count();
    }

    public function getBonExamenById($id)
    {
        return BonExamen::find($id);
    }

    public function createBonExamen(array $data)
    {
        $bonExamen = new BonExamen($data);
        $bonExamen->save();

        // Implémentez la logique pour créer les actes associés, si nécessaire

        return $bonExamen;
    }

    public function updateBonExamen($id, array $data)
    {
        $bonExamen = BonExamen::find($id);
        if ($bonExamen) {
            $bonExamen->fill($data);
            $bonExamen->save();

            // Implémentez la logique pour mettre à jour les actes associés, si nécessaire

            return $bonExamen;
        }
        return null;
    }

    public function deleteBonExamen($id)
    {
        $bonExamen = BonExamen::find($id);
        if ($bonExamen) {
            // Implémentez la logique pour supprimer les actes associés, si nécessaire
            $bonExamen->delete();
            return true;
        }
        return false;
    }

    // Implémentez d'autres méthodes spécifiques au service BonExamen...
}