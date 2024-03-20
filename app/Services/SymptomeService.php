<?php

namespace App\Services;

use App\Models\Symptome;
use Illuminate\Support\Facades\DB;

class SymptomeService
{
    public function getAllSymptomes()
    {
        return Symptome::all();
    }

    public function getSymptomeById($id)
    {
        return Symptome::find($id);
    }

    public function createSymptome(array $symptomeData)
    {
        return Symptome::create($symptomeData);
    }

    public function updateSymptome($id, array $updatedSymptomeData)
    {
        $symptome = Symptome::find($id);
        if ($symptome) {
            $symptome->update($updatedSymptomeData);
            return $symptome;
        }
        return null;
    }

    public function deleteSymptome($id)
    {
        $symptome = Symptome::find($id);
        if ($symptome) {
            return $symptome->delete();
        }
        return false;
    }

    public function count()
    {
        return Symptome::count();
    }

    // Vous pouvez implémenter d'autres méthodes de filtrage si nécessaire
}