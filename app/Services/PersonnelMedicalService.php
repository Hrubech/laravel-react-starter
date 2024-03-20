<?php

namespace App\Services;

use App\Models\PersonnelMedical;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class PersonnelMedicalService
{
    public function getAllPersonnelsMedicaux()
    {
        return PersonnelMedical::orderByDesc('created_at')->get();
    }

    public function count()
    {
        return PersonnelMedical::count();
    }

    public function countByPersonnelRole($roleId)
    {
        $role = Role::find($roleId);
        if ($role) {
            return $role->personnelMedicals()->count();
        }
        return null;
    }

    public function getPersonnelMedicalById($id)
    {
        return PersonnelMedical::find($id);
    }

    public function createPersonnelMedical(array $data)
    {
        DB::beginTransaction();

        try {
            // Créez un nouveau personnel médical
            $personnelMedical = new PersonnelMedical();
            $personnelMedical->fill($data);
            $personnelMedical->save();

            DB::commit();

            return $personnelMedical;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function updatePersonnelMedical($id, array $data)
    {
        DB::beginTransaction();

        try {
            // Récupérez le personnel médical
            $personnelMedical = PersonnelMedical::findOrFail($id);

            // Mettez à jour les champs nécessaires
            $personnelMedical->fill($data);
            $personnelMedical->save();

            DB::commit();

            return $personnelMedical;
        } catch (\Exception $e) {
            DB::rollback();
            // Gérez les erreurs ici
        }
    }

    public function deletePersonnelMedical($id)
    {
        $personnelMedical = PersonnelMedical::find($id);

        if ($personnelMedical) {
            return $personnelMedical->delete();
        }

        return false;
    }

    public function getConsultationsByPersonnelMedical($personnelMedicalId)
    {
        $personnelMedical = PersonnelMedical::findOrFail($personnelMedicalId);
        return $personnelMedical->consultations;
    }

    public function getHospitalisationsByPersonnelMedical($personnelMedicalId)
    {
        $personnelMedical = PersonnelMedical::findOrFail($personnelMedicalId);
        return $personnelMedical->hospitalisations;
    }

    public function getRdvByPersonnelMedical($personnelMedicalId)
    {
        $personnelMedical = PersonnelMedical::findOrFail($personnelMedicalId);
        return $personnelMedical->rdv;
    }

    public function validerPersonnelMedical(PersonnelMedical $personnelMedical)
    {
        // Implémentez la logique de validation si nécessaire
    }
}