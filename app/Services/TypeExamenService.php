<?php

namespace App\Services;

use App\Models\TypeExamen;

class TypeExamenService
{
    public function getAllTypeExamens()
    {
        return TypeExamen::all();
    }

    public function count()
    {
        return TypeExamen::count();
    }

    public function getTypeExamenById($id)
    {
        return TypeExamen::find($id);
    }

    public function getByService($service)
    {
        return TypeExamen::where('service', $service)->get();
    }

    public function createTypeExamen(array $typeExamenData)
    {
        return TypeExamen::create($typeExamenData);
    }

    public function updateTypeExamen($id, array $updatedTypeExamenData)
    {
        $typeExamen = TypeExamen::find($id);
        if ($typeExamen) {
            $typeExamen->update($updatedTypeExamenData);
            return $typeExamen;
        }
        return null;
    }

    public function deleteTypeExamen($id)
    {
        $typeExamen = TypeExamen::find($id);
        if ($typeExamen) {
            return $typeExamen->delete();
        }
        return false;
    }
}