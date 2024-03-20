<?php

namespace App\Services;

use App\Models\Recu;

class RecuService
{
    public function getAllRecus()
    {
        return Recu::orderByDesc('created_at')->get();
    }

    public function getRecuById($id)
    {
        return Recu::find($id);
    }

    public function createRecu(array $data)
    {
        return Recu::create($data);
    }

    public function updateRecu($id, array $data)
    {
        $recu = Recu::find($id);
        if ($recu) {
            $recu->update($data);
            return $recu;
        }
        return null;
    }

    public function deleteRecu($id)
    {
        $recu = Recu::find($id);
        if ($recu) {
            return $recu->delete();
        }
        return false;
    }

    public function count()
    {
        return Recu::count();
    }
}