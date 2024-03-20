<?php

namespace App\Services;

use App\Models\Acte;
use App\Models\Service;
use App\Models\PersonnelMedical;

class ActeService
{
    public function getAllActes()
    {
        return Acte::orderByDesc('created_at')->get();
    }

    public function getActeById($id)
    {
        return Acte::findOrFail($id);
    }

    public function createActe(array $data)
    {
        return Acte::create($data);
    }

    public function updateActe($id, array $data)
    {
        $acte = Acte::findOrFail($id);
        $acte->update($data);
        return $acte;
    }

    public function deleteActe($id)
    {
        $acte = Acte::findOrFail($id);
        $acte->delete();
        return true;
    }

    public function getActesByService($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return $service->actes;
    }

    public function getActesByPeriodeAndServiceAndPersonnel($serviceId, $personnelId, $periode)
    {
        $service = Service::findOrFail($serviceId);
        $personnelMedical = PersonnelMedical::findOrFail($personnelId);
        return Acte::where('periode', $periode)
            ->where('service_id', $service->id)
            ->where('personnel_medical_id', $personnelMedical->id)
            ->get();
    }
}