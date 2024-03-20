<?php

namespace App\Services;

use App\Models\Rdv;
use Carbon\Carbon;

class RdvService
{
    public function getAllRdv()
    {
        return Rdv::orderBy('date')->orderBy('heure')->get();
    }

    public function getRdvById($id)
    {
        return Rdv::find($id);
    }

    public function createRdv(array $data)
    {
        return Rdv::create($data);
    }

    public function updateRdv($id, array $data)
    {
        $rdv = Rdv::find($id);
        if ($rdv) {
            $rdv->update($data);
            return $rdv;
        }
        return null;
    }

    public function deleteRdv($id)
    {
        $rdv = Rdv::find($id);
        if ($rdv) {
            return $rdv->delete();
        }
        return false;
    }

    public function count()
    {
        return Rdv::count();
    }

    public function getTodayRdvCount()
    {
        $today = Carbon::today();
        return Rdv::whereDate('date', $today)->count();
    }

    public function cancelExpiredRdv($currentTime)
    {
        $rdv = Rdv::where('etat', 'EN_ATTENTE')->where('date', '<', $currentTime)->get();
        foreach ($rdv as $r) {
            // Mettre à jour l'état en "annulé"
            $r->etat = 'ANNULEE';
            $r->save();
        }
    }
}