<?php

namespace App\Http\Controllers\Api;

use App\Models\Prescription;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrescriptionResource;
use App\Services\PrescriptionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrescriptionController extends Controller
{
    protected $prescriptionService;

    public function __construct(PrescriptionService $prescriptionService)
    {
        $this->prescriptionService = $prescriptionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PrescriptionResource::collection(Prescription::query()->orderBy('id', 'asc')->get());
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $prescriptions = $this->prescriptionService->getPrescriptionsByFilters($filters);
        return response()->json($prescriptions);
    }*/

    public function count()
    {
        $count = $this->prescriptionService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $prescription = $this->prescriptionService->getPrescriptionById($id);
        if ($prescription) {
            return response()->json($prescription);
        } else {
            return response()->json(['message' => 'Prescription not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $prescription = $this->prescriptionService->createPrescription($validatedData);
        return response()->json($prescription, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $prescription = $this->prescriptionService->updatePrescription($id, $validatedData);
        if ($prescription) {
            return response()->json($prescription);
        } else {
            return response()->json(['message' => 'Prescription not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->prescriptionService->deletePrescription($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Prescription not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}