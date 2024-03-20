<?php

namespace App\Http\Controllers\Api;

use App\Models\Examen;
use App\Services\ExamenService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ExamenController extends Controller
{
    protected $examenService;

    public function __construct(ExamenService $examenService)
    {
        $this->examenService = $examenService;
    }

    public function index()
    {
        $examens = $this->examenService->getAllExamens();
        return response()->json($examens);
    }

    public function filter(Request $request)
    {
        $filters = $request->all();
        $examens = $this->examenService->getExamensByFilters($filters);
        return response()->json($examens);
    }

    public function count()
    {
        $count = $this->examenService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $examen = $this->examenService->getExamenById($id);
        if ($examen) {
            return response()->json($examen);
        } else {
            return response()->json(['message' => 'Examen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getFile()
    {
        $fileContent = File::get(storage_path('app/public/examens.txt'));
        $lines = explode("\n", $fileContent);
        return response()->json($lines);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Define validation rules here
        ]);

        $examen = $this->examenService->createExamen($validatedData);
        return response()->json($examen, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Define validation rules here
        ]);

        $examen = $this->examenService->updateExamen($id, $validatedData);
        if ($examen) {
            return response()->json($examen);
        } else {
            return response()->json(['message' => 'Examen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->examenService->deleteExamen($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Examen not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}