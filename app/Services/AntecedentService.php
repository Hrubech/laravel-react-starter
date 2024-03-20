<?php

namespace App\Services;

use App\Models\Antecedent;

class AntecedentService
{
    public function getAllAntecedents()
    {
        return Antecedent::all();
    }

    public function getAntecedentById($id)
    {
        return Antecedent::find($id);
    }

    public function createAntecedent($data)
    {
        return Antecedent::create($data);
    }

    public function updateAntecedent($id, $data)
    {
        $antecedent = Antecedent::find($id);
        if ($antecedent) {
            $antecedent->update($data);
            return $antecedent;
        }
        return null;
    }

    public function deleteAntecedent($id)
    {
        $antecedent = Antecedent::find($id);
        if ($antecedent) {
            $antecedent->delete();
            return true;
        }
        return false;
    }
}