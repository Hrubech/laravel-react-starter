<?php

namespace App\Services;

use App\Models\Consultation;
use App\Models\DossierMedical;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class ConsultationService
{
    public function getAllConsultations()
    {
        return Consultation::all();
    }

    public function getConsultationsByFilters(array $filters)
    {
        // Implémentez la logique pour filtrer les consultations selon les critères donnés
    }

    public function countConsutationsByEtat($etat)
    {
        return Consultation::where('etat', $etat)->count();
    }

    public function getTodayConsultationCount()
    {
        $today = now()->toDateString();
        return Consultation::whereDate('created_at', $today)->count();
    }

    public function count()
    {
        return Consultation::count();
    }

    public function getConsultationById($id)
    {
        return Consultation::find($id);
    }

    public function getDossierMedicalByConsultationId($id)
    {
        $consultation = Consultation::find($id);
        return $consultation ? $consultation->dossierMedical : null;
    }

    public function getPatientByConsultationId($id)
    {
        $consultation = Consultation::find($id);
        return $consultation ? $consultation->dossierMedical->patient : null;
    }

    public function createConsultation(array $data)
    {
        return Consultation::create($data);
    }

    public function updateConsultation($id, array $data)
    {
        $consultation = Consultation::find($id);
        if ($consultation) {
            $consultation->update($data);
            return $consultation;
        }
        return null;
    }

    public function deleteConsultation($id)
    {
        $consultation = Consultation::find($id);
        if ($consultation) {
            $consultation->delete();
            return true;
        }
        return false;
    }

    // Implémentez d'autres méthodes spécifiques au service Consultation...
}