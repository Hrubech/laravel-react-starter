<?php

namespace App\Http\Controllers\Api;

use App\Models\PersonnelMedical;
use App\Http\Controllers\Controller;
use App\Services\PersonnelMedicalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonnelMedicalController extends Controller
{
    protected $personnelMedicalService;

    public function __construct(PersonnelMedicalService $personnelMedicalService)
    {
        $this->personnelMedicalService = $personnelMedicalService;
    }

    public function index()
    {
        $personnelMedicals = $this->personnelMedicalService->getAllPersonnelsMedicaux();
        return response()->json($personnelMedicals);
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $personnelMedicals = $this->personnelMedicalService->getPersonnelMedicalByFilters($filters);
        return response()->json($personnelMedicals);
    }*/

    public function count()
    {
        $count = $this->personnelMedicalService->count();
        return response()->json($count);
    }

    public function countByRoleId($roleId)
    {
        $count = $this->personnelMedicalService->countByPersonnelRole($roleId);
        return response()->json($count);
    }

    public function show($id)
    {
        $personnelMedical = $this->personnelMedicalService->getPersonnelMedicalById($id);
        if ($personnelMedical) {
            return response()->json($personnelMedical);
        } else {
            return response()->json(['message' => 'Personnel médical not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getConsultationByPersonnelMedical($personnelMedicalId)
    {
        $consultations = $this->personnelMedicalService->getConsultationsByPersonnelMedical($personnelMedicalId);
        return response()->json($consultations);
    }

    public function getHospitalisationByPersonnelMedical($personnelMedicalId)
    {
        $hospitalisations = $this->personnelMedicalService->getHospitalisationsByPersonnelMedical($personnelMedicalId);
        return response()->json($hospitalisations);
    }

    public function getRdvByPersonnelMedical($personnelMedicalId)
    {
        $rdvs = $this->personnelMedicalService->getRdvByPersonnelMedical($personnelMedicalId);
        return response()->json($rdvs);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        //$this->personnelMedicalService->validerPersonnelMedical($validatedData);
        $personnelMedical = $this->personnelMedicalService->createPersonnelMedical($validatedData);
        return response()->json($personnelMedical, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        //$this->personnelMedicalService->validerPersonnelMedical($validatedData);
        $personnelMedical = $this->personnelMedicalService->updatePersonnelMedical($id, $validatedData);
        if ($personnelMedical) {
            return response()->json($personnelMedical);
        } else {
            return response()->json(['message' => 'Personnel médical not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->personnelMedicalService->deletePersonnelMedical($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Personnel médical not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}