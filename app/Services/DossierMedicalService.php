<?php

namespace App\Services;

use App\Models\DossierMedical;
use Illuminate\Support\Facades\DB;

class DossierMedicalService
{
    public function getAllDossierMedicals()
    {
        return DossierMedical::orderByDesc('created_at')->get();
    }

    public function getDossierMedicalById($id)
    {
        return DossierMedical::find($id);
    }

    public function createDossierMedical($data)
    {
        return DossierMedical::create($data);
    }

    public function updateDossierMedical($id, $data)
    {
        $dossierMedical = DossierMedical::findOrFail($id);
        $dossierMedical->update($data);
        return $dossierMedical;
    }

    public function deleteDossierMedical($id)
    {
        $dossierMedical = DossierMedical::findOrFail($id);
        $dossierMedical->delete();
        return true;
    }

    public function count()
    {
        return DossierMedical::count();
    }

    public function getConsultationsByDossierMedical($dossierMedicalId)
    {
        // Votre logique pour récupérer les consultations par le dossier médical
    }

    public function getOrdonnancesByDossierMedical($dossierMedicalId)
    {
        // Votre logique pour récupérer les ordonnances par le dossier médical
    }

    public function getBonExamensByDossierMedical($dossierMedicalId)
    {
        // Votre logique pour récupérer les bons d'examens par le dossier médical
    }

    public function getAntecedentsByDossierMedical($dossierMedicalId)
    {
        // Votre logique pour récupérer les antécédents par le dossier médical
    }

    public function getSoinsByDossierMedical($dossierMedicalId)
    {
        // Votre logique pour récupérer les soins par le dossier médical
    }
}