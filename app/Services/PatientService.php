<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientService
{
    protected $dossierMedicalService;

    public function __construct(DossierMedicalService $dossierMedicalService)
    {
        $this->dossierMedicalService = $dossierMedicalService;
    }

    public function getAllPatients()
    {
        return Patient::orderByDesc('created_at')->get();
    }

    public function getPatientById($id)
    {
        return Patient::find($id);
    }

    public function createPatient($data)
    {
        $patient = Patient::create($data);
        $this->createDossierMedical($patient);
        return $patient;
    }

    public function updatePatient($id, $data)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($data);
        return $patient;
    }

    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return true;
    }

    public function count()
    {
        return Patient::count();
    }

    public function createDossierMedical($patient)
    {
        // Votre logique pour la création du dossier médical
        // Utilisez $this->dossierMedicalService si nécessaire
    }

    public function getPatientStatsBySexe()
    {
        return Patient::select('sexe', DB::raw('COUNT(*) as count'))
            ->groupBy('sexe')
            ->pluck('count', 'sexe')
            ->toArray();
    }
}