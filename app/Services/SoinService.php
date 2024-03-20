<?php

namespace App\Services;

use App\Models\Soin;
use App\Services\FactureService;
use App\Services\ActeService;

class SoinService
{
    private $factureService;
    private $acteService;

    public function __construct(FactureService $factureService, ActeService $acteService)
    {
        $this->factureService = $factureService;
        $this->acteService = $acteService;
    }

    public function getAllSoins()
    {
        return Soin::orderByDesc('created_at')->get();
    }

    public function getSoinById($id)
    {
        return Soin::find($id);
    }

    public function createSoins(array $newSoins)
    {
        $soins = [];
        $actes = [];
        $factureData = [
            'uuid' => uniqid(),
            // Remplissez les autres champs de la facture selon votre logique
        ];
        $facture = $this->factureService->createFacture($factureData);
        
        foreach ($newSoins as $soin) {
            $soin['facture_id'] = $facture->id;
            $soins[] = $soin;
            $acteData = [
                'observation' => $soin['observation'],
                // Remplissez les autres champs de l'acte selon votre logique
            ];
            $actes[] = $acteData;
        }

        //$this->acteService->createActes($actes);
        return Soin::insert($soins);
    }

    public function updateSoin($id, array $updatedSoin)
    {
        $soin = Soin::find($id);
        if ($soin) {
            $soin->update($updatedSoin);
            return $soin;
        }
        return null;
    }

    public function deleteSoin($id)
    {
        $soin = Soin::find($id);
        if ($soin) {
            return $soin->delete();
        }
        return false;
    }

    public function count()
    {
        return Soin::count();
    }
}