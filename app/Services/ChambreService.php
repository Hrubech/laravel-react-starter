<?php

namespace App\Services;

use App\Models\Chambre;

class ChambreService
{
    public function getAllChambres()
    {
        return Chambre::all();
    }

    public function getChambreById($id)
    {
        return Chambre::find($id);
    }

    public function createChambre($data)
    {
        return Chambre::create($data);
    }

    public function updateChambre($id, $data)
    {
        $chambre = Chambre::find($id);
        if ($chambre) {
            $chambre->update($data);
            return $chambre;
        }
        return null;
    }

    public function deleteChambre($id)
    {
        $chambre = Chambre::find($id);
        if ($chambre) {
            $chambre->delete();
            return true;
        }
        return false;
    }

    public function count()
    {
        return Chambre::count();
    }
}