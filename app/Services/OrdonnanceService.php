<?php

namespace App\Services;

use App\Models\Ordonnance;
use Illuminate\Support\Facades\DB;

class OrdonnanceService
{
    public function getAllOrdonnances()
    {
        return Ordonnance::orderByDesc('created_at')->get();
    }

    public function getOrdonnancesByFilters(array $filters)
    {
        // Implémentez la logique pour filtrer les ordonnances en fonction des filtres fournis
    }

    public function count()
    {
        return Ordonnance::count();
    }

    public function getOrdonnanceById($id)
    {
        return Ordonnance::find($id);
    }

    public function createOrdonnance(array $data)
    {
        DB::beginTransaction();

        try {
            // Créez une nouvelle ordonnance
            $ordonnance = Ordonnance::create([
                'prescriptions' => $data['prescriptions'] ?? null,
                // Ajoutez d'autres champs si nécessaire
            ]);

            DB::commit();
            
            return $ordonnance;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function updateOrdonnance($id, array $data)
    {
        DB::beginTransaction();

        try {
            // Récupérez l'ordonnance
            $ordonnance = Ordonnance::findOrFail($id);

            // Mettez à jour les champs nécessaires
            $ordonnance->update([
                'prescriptions' => $data['prescriptions'] ?? $ordonnance->prescriptions,
                // Ajoutez d'autres champs si nécessaire
            ]);

            DB::commit();

            return $ordonnance;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function deleteOrdonnance($id)
    {
        $ordonnance = Ordonnance::find($id);

        if ($ordonnance) {
            return $ordonnance->delete();
        }

        return false;
    }
}