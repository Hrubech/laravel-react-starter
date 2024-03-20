<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospitalisation;
use App\Http\Controllers\Controller;
use App\Services\HospitalisationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HospitalisationController extends Controller
{
    protected $hospitalisationService;

    public function __construct(HospitalisationService $hospitalisationService)
    {
        $this->hospitalisationService = $hospitalisationService;
    }

    public function index()
    {
        $hospitalisations = $this->hospitalisationService->getAllHospitalisations();
        return response()->json($hospitalisations);
    }

    public function filter(Request $request)
    {
        $filters = $request->all();
        $hospitalisations = $this->hospitalisationService->getHospitalisationsByFilters($filters);
        return response()->json($hospitalisations);
    }

    public function count()
    {
        $count = $this->hospitalisationService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $hospitalisation = $this->hospitalisationService->getHospitalisationById($id);
        if ($hospitalisation) {
            return response()->json($hospitalisation);
        } else {
            return response()->json(['message' => 'Hospitalisation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $hospitalisation = $this->hospitalisationService->createHospitalisation($validatedData);
        return response()->json($hospitalisation, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $hospitalisation = $this->hospitalisationService->updateHospitalisation($id, $validatedData);
        if ($hospitalisation) {
            return response()->json($hospitalisation);
        } else {
            return response()->json(['message' => 'Hospitalisation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->hospitalisationService->deleteHospitalisation($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Hospitalisation not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}