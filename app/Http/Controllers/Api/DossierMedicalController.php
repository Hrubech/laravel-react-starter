<?php

namespace App\Http\Controllers\Api;

use App\Models\DossierMedical;
use App\Http\Controllers\Controller;
use App\Services\DossierMedicalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DossierMedicalController extends Controller
{
    private $dossierMedicalService;

    public function __construct(DossierMedicalService $dossierMedicalService)
    {
        $this->dossierMedicalService = $dossierMedicalService;
    }

    public function index()
    {
        return response()->json($this->dossierMedicalService->getAllDossierMedicals());
    }

    /*public function filter(Request $request)
    {
        return response()->json($this->dossierMedicalService->getDossierMedicalByFilters($request->all()));
    }*/

    public function count()
    {
        return response()->json($this->dossierMedicalService->count());
    }

    public function show($id)
    {
        $dossierMedical = $this->dossierMedicalService->getDossierMedicalById($id);
        if ($dossierMedical) {
            return response()->json($dossierMedical);
        } else {
            return response()->json(['error' => 'Dossier médical non trouvé.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function patient($id)
    {
        $dossierMedical = $this->dossierMedicalService->getDossierMedicalById($id);
        if ($dossierMedical) {
            return response()->json($dossierMedical->patient);
        } else {
            return response()->json(['error' => 'Dossier médical non trouvé.'], Response::HTTP_NOT_FOUND);
        }
    }

    // Ajoutez les autres méthodes pour les consultations, ordonnances, etc.

    public function store(Request $request)
    {
        $dossierMedical = $this->dossierMedicalService->createDossierMedical($request->all());
        return response()->json($dossierMedical, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $updatedDossierMedical = $this->dossierMedicalService->updateDossierMedical($id, $request->all());
        if ($updatedDossierMedical) {
            return response()->json($updatedDossierMedical);
        } else {
            return response()->json(['error' => 'Dossier médical non trouvé.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->dossierMedicalService->deleteDossierMedical($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['error' => 'Dossier médical non trouvé.'], Response::HTTP_NOT_FOUND);
        }
    }
}