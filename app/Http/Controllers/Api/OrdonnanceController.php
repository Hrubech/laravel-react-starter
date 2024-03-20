<?php

namespace App\Http\Controllers\Api;

use App\Models\Ordonnance;
use App\Http\Controllers\Controller;
use App\Services\OrdonnanceService;
use App\Http\Resources\OrdonnanceResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrdonnanceController extends Controller
{
    protected $ordonnanceService;

    public function __construct(OrdonnanceService $ordonnanceService)
    {
        $this->ordonnanceService = $ordonnanceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return OrdonnanceResource::collection(Ordonnance::query()->orderBy('id', 'asc')->get());
    }

    public function filter(Request $request)
    {
        $filters = $request->all();
        $ordonnances = $this->ordonnanceService->getOrdonnancesByFilters($filters);
        return response()->json($ordonnances);
    }

    public function count()
    {
        $count = $this->ordonnanceService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $ordonnance = $this->ordonnanceService->getOrdonnanceById($id);
        if ($ordonnance) {
            return response()->json($ordonnance);
        } else {
            return response()->json(['message' => 'Ordonnance not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $ordonnance = $this->ordonnanceService->createOrdonnance($validatedData);
        return response()->json($ordonnance, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $ordonnance = $this->ordonnanceService->updateOrdonnance($id, $validatedData);
        if ($ordonnance) {
            return response()->json($ordonnance);
        } else {
            return response()->json(['message' => 'Ordonnance not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->ordonnanceService->deleteOrdonnance($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Ordonnance not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}