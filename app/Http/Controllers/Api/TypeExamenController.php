<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeExamen;
use App\Http\Controllers\Controller;
use App\Services\TypeExamenService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeExamenController extends Controller
{
    protected $typeExamenService;

    public function __construct(TypeExamenService $typeExamenService)
    {
        $this->typeExamenService = $typeExamenService;
    }

    public function index()
    {
        $typeExamens = $this->typeExamenService->getAllTypeExamens();
        return response()->json($typeExamens);
    }

    public function count()
    {
        $count = $this->typeExamenService->count();
        return response()->json($count);
    }

    public function getByService($service)
    {
        $typeExamens = $this->typeExamenService->getByService($service);
        return response()->json($typeExamens);
    }

    public function show($id)
    {
        $typeExamen = $this->typeExamenService->getTypeExamenById($id);
        if ($typeExamen) {
            return response()->json($typeExamen);
        } else {
            return response()->json(['message' => 'TypeExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $createdTypeExamen = $this->typeExamenService->createTypeExamen($validatedData);
        return response()->json($createdTypeExamen, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $updatedTypeExamen = $this->typeExamenService->updateTypeExamen($id, $validatedData);
        if ($updatedTypeExamen) {
            return response()->json($updatedTypeExamen);
        } else {
            return response()->json(['message' => 'TypeExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->typeExamenService->deleteTypeExamen($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'TypeExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}