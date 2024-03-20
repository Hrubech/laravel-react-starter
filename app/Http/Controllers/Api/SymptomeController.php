<?php

namespace App\Http\Controllers\Api;

use App\Models\Symptome;
use App\Services\SymptomeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SymptomeController extends Controller
{
    protected $symptomeService;

    public function __construct(SymptomeService $symptomeService)
    {
        $this->symptomeService = $symptomeService;
    }

    public function index()
    {
        $symptomes = $this->symptomeService->getAllSymptomes();
        return response()->json($symptomes);
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $symptomes = $this->symptomeService->getSymptomesByFilters($filters);
        return response()->json($symptomes);
    }*/

    public function count()
    {
        $count = $this->symptomeService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $symptome = $this->symptomeService->getSymptomeById($id);
        if ($symptome) {
            return response()->json($symptome);
        } else {
            return response()->json(['message' => 'Symptome not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $createdSymptome = $this->symptomeService->createSymptome($validatedData);
        return response()->json($createdSymptome, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $updatedSymptome = $this->symptomeService->updateSymptome($id, $validatedData);
        if ($updatedSymptome) {
            return response()->json($updatedSymptome);
        } else {
            return response()->json(['message' => 'Symptome not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->symptomeService->deleteSymptome($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Symptome not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}