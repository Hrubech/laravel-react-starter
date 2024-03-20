<?php

namespace App\Http\Controllers\Api;

use App\Models\Recu;
use App\Services\RecuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecuController extends Controller
{
    protected $recuService;

    public function __construct(RecuService $recuService)
    {
        $this->recuService = $recuService;
    }

    public function index()
    {
        $recus = $this->recuService->getAllRecus();
        return response()->json($recus);
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $recus = $this->recuService->getRecusByFilters($filters);
        return response()->json($recus);
    }*/

    public function count()
    {
        $count = $this->recuService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $recu = $this->recuService->getRecuById($id);
        if ($recu) {
            return response()->json($recu);
        } else {
            return response()->json(['message' => 'Recu not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getPatient($id)
    {
        $recu = $this->recuService->getRecuById($id);
        if ($recu) {
            return response()->json($recu->patient);
        } else {
            return response()->json(['message' => 'Recu not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $recu = $this->recuService->createRecu($validatedData);
        return response()->json($recu, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $recu = $this->recuService->updateRecu($id, $validatedData);
        if ($recu) {
            return response()->json($recu);
        } else {
            return response()->json(['message' => 'Recu not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->recuService->deleteRecu($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Recu not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}