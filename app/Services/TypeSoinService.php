<?php

namespace App\Services;

use App\Models\TypeSoin;

class TypeSoinService
{
    public function getAllTypeSoins()
    {
        return TypeSoin::all();
    }

    public function count()
    {
        return TypeSoin::count();
    }

    public function getTypeSoinById($id)
    {
        return TypeSoin::find($id);
    }

    public function createTypeSoin(array $typeSoinData)
    {
        return TypeSoin::create($typeSoinData);
    }

    public function updateTypeSoin($id, array $updatedTypeSoinData)
    {
        $typeSoin = TypeSoin::find($id);
        if ($typeSoin) {
            $typeSoin->update($updatedTypeSoinData);
            return $typeSoin;
        }
        return null;
    }

    public function deleteTypeSoin($id)
    {
        $typeSoin = TypeSoin::find($id);
        if ($typeSoin) {
            return $typeSoin->delete();
        }
        return false;
    }
}