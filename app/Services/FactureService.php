<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\Consultation;
use App\Models\BonExamen;
use Illuminate\Support\Facades\DB;

class FactureService
{
    public function getAllFactures()
    {
        return Facture::all();
    }

    public function getFacturesByFilters(array $filters)
    {
        // Implémentez la logique pour filtrer les factures en fonction des filtres fournis
    }

    public function count()
    {
        return Facture::count();
    }

    public function countFacturesByEtat($etat)
    {
        return Facture::where('etat', $etat)->count();
    }

    public function getFactureById($id)
    {
        return Facture::find($id);
    }

    public function getConsultationByFactureId($id)
    {
        $facture = Facture::find($id);
        return $facture->consultation;
    }

    public function getBonExamenByFactureId($id)
    {
        $facture = Facture::find($id);
        return $facture->bonExamen;
    }

    public function createFacture(array $data)
    {
        DB::beginTransaction();

        try {
            // Créez une nouvelle facture
            $facture = Facture::create([
                // Ajoutez les champs nécessaires
            ]);

            DB::commit();
            
            return $facture;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function updateFacture($id, array $data)
    {
        DB::beginTransaction();

        try {
            // Récupérez la facture
            $facture = Facture::findOrFail($id);

            // Mettez à jour les champs nécessaires
            $facture->update([
                // Ajoutez les champs nécessaires
            ]);

            DB::commit();

            return $facture;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function deleteFacture($id)
    {
        $facture = Facture::find($id);

        if ($facture) {
            return $facture->delete();
        }

        return false;
    }
}