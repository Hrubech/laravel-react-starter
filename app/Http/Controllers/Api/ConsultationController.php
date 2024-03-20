<?php

namespace App\Http\Controllers\Api;

use App\Models\Consultation;
use App\Services\ConsultationService;
use App\Http\Resources\ConsultationResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultationController extends Controller
{
    protected $consultationService;

    public function __construct(ConsultationService $consultationService)
    {
        $this->consultationService = $consultationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ConsultationResource::collection(Consultation::query()->orderBy('id', 'asc')->paginate(10));
    } 

    public function count()
    {
        $count = $this->consultationService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $consultation = $this->consultationService->getConsultationById($id);
        if ($consultation) {
            return response()->json($consultation);
        } else {
            return response()->json(['message' => 'Consultation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getDossierMedicalByConsultationId($id)
    {
        $consultation = $this->consultationService->getConsultationById($id);
        if ($consultation) {
            return response()->json($consultation->dossierMedical);
        } else {
            return response()->json(['message' => 'Consultation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getPatientByConsultationId($id)
    {
        $consultation = $this->consultationService->getConsultationById($id);
        if ($consultation) {
            return response()->json($consultation->dossierMedical->patient);
        } else {
            return response()->json(['message' => 'Consultation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $consultation = $this->consultationService->createConsultation($request->all());
        return response()->json($consultation, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $consultation = $this->consultationService->updateConsultation($id, $request->all());
        if ($consultation) {
            return response()->json($consultation);
        } else {
            return response()->json(['message' => 'Consultation not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->consultationService->deleteConsultation($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Consultation not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}