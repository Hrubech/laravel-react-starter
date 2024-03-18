<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Http\Resources\PatientResource;
use App\Services\PatientService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    protected $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /*public function index()
    {
        return $this->patientService->getAllPatients();
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PatientResource::collection(Patient::query()->orderBy('id', 'desc')->paginate(10));
    }

    public function show($id)
    {
        $patient = $this->patientService->getPatientById($id);
        if ($patient) {
            return $patient;
        } else {
            return response()->json(['message' => 'Patient not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Définissez ici les règles de validation pour les données du patient
        ]);

        $createdPatient = $this->patientService->createPatient($data);
        return response()->json($createdPatient, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            // Définissez ici les règles de validation pour les données du patient
        ]);

        $updatedPatient = $this->patientService->updatePatient($id, $data);
        if ($updatedPatient) {
            return response()->json($updatedPatient);
        } else {
            return response()->json(['message' => 'Patient not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->patientService->deletePatient($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Patient not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    // Ajoutez ici les autres méthodes du contrôleur selon vos besoins
}