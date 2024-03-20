<?php

namespace App\Services;

use App\Models\Prescription;

class PrescriptionService
{
    public function getAllPrescriptions()
    {
        return Prescription::orderByDesc('created_at')->get();
    }

    public function getPrescriptionById($id)
    {
        return Prescription::find($id);
    }

    public function createPrescription(array $data)
    {
        return Prescription::create($data);
    }

    public function updatePrescription($id, array $data)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            $prescription->update($data);
            return $prescription;
        }
        return null;
    }

    public function deletePrescription($id)
    {
        $prescription = Prescription::find($id);
        if ($prescription) {
            return $prescription->delete();
        }
        return false;
    }

    public function count()
    {
        return Prescription::count();
    }
}