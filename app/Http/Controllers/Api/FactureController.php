<?php

namespace App\Http\Controllers\Api;

use App\Models\Facture;
use App\Http\Controllers\Controller;
use App\Services\FactureService;
use App\Http\Resources\FactureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FactureController extends Controller
{
    protected $factureService;

    public function __construct(FactureService $factureService)
    {
        $this->factureService = $factureService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FactureResource::collection(Facture::query()->orderBy('id', 'asc')->get());
    }

    public function filter(Request $request)
    {
        $filters = $request->all();
        $factures = $this->factureService->getFacturesByFilters($filters);
        return response()->json($factures);
    }

    public function count()
    {
        $count = $this->factureService->count();
        return response()->json($count);
    }

    public function countFacturesByEtat($etat)
    {
        $count = $this->factureService->countFacturesByEtat($etat);
        return response()->json($count);
    }

    public function show($id)
    {
        $facture = $this->factureService->getFactureById($id);
        if ($facture) {
            return response()->json($facture);
        } else {
            return response()->json(['message' => 'Facture not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getConsultationByFactureId($id)
    {
        $consultation = $this->factureService->getConsultationByFactureId($id);
        return response()->json($consultation);
    }

    public function getBonExamenByFactureId($id)
    {
        $bonExamen = $this->factureService->getBonExamenByFactureId($id);
        return response()->json($bonExamen);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $facture = $this->factureService->createFacture($validatedData);
        return response()->json($facture, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $facture = $this->factureService->updateFacture($id, $validatedData);
        if ($facture) {
            return response()->json($facture);
        } else {
            return response()->json(['message' => 'Facture not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->factureService->deleteFacture($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Facture not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}