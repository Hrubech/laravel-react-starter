<?php

namespace App\Http\Controllers\Api;

use App\Models\Soin;
use App\Services\SoinService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SoinResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SoinController extends Controller
{
    protected $soinService;

    public function __construct(SoinService $soinService)
    {
        $this->soinService = $soinService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SoinResource::collection(Soin::query()->orderBy('id', 'asc')->get());
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $soins = $this->soinService->getSoinsByFilters($filters);
        return response()->json($soins);
    }*/

    public function count()
    {
        $count = $this->soinService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $soin = $this->soinService->getSoinById($id);
        if ($soin) {
            return response()->json($soin);
        } else {
            return response()->json(['message' => 'Soin not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function createSoins(Request $request)
    {
        $soinsData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $createdSoins = $this->soinService->createSoins($soinsData);
        return response()->json($createdSoins, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $updatedSoin = $this->soinService->updateSoin($id, $validatedData);
        if ($updatedSoin) {
            return response()->json($updatedSoin);
        } else {
            return response()->json(['message' => 'Soin not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getFileLines()
    {
        // Logique pour lire les lignes du fichier soins.txt
    }

    public function destroy($id)
    {
        $deleted = $this->soinService->deleteSoin($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Soin not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}