<?php

namespace App\Services;

use App\Models\DossierMedical;
use App\Models\Consultation;
use App\Models\Ordonnance;
use App\Models\BonExamen;
use App\Models\Soin;
use App\Models\Antecedent;

class DossierMedicalService
{
    public function getAllDossierMedicals()
    {
        return DossierMedical::all();
    }

    public function getDossierMedicalById($id)
    {
        return DossierMedical::find($id);
    }

    public function count()
    {
        return DossierMedical::count();
    }

    public function getPatientByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->patient;
        }
        return null;
    }

    public function getConsultationsByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->consultations;
        }
        return [];
    }

    public function getOrdonnancesByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->ordonnances;
        }
        return [];
    }

    public function getBonExamensByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->bonExamens;
        }
        return [];
    }

    public function getSoinsByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->soins;
        }
        return [];
    }

    public function getAntecedentsByDossierMedicalId($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            return $dossierMedical->antecedents;
        }
        return [];
    }

    public function createDossierMedical($data)
    {
        return DossierMedical::create($data);
    }

    public function updateDossierMedical($id, $data)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            $dossierMedical->update($data);
            return $dossierMedical;
        }
        return null;
    }

    public function deleteDossierMedical($id)
    {
        $dossierMedical = DossierMedical::find($id);
        if ($dossierMedical) {
            $dossierMedical->delete();
            return true;
        }
        return false;
    }
}