<?php

namespace App\Http\Controllers\Api;

use App\Models\BonExamen;
use App\Services\BonExamenService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BonExamenController extends Controller
{
    protected $bonExamenService;

    public function __construct(BonExamenService $bonExamenService)
    {
        $this->bonExamenService = $bonExamenService;
    }

    public function index()
    {
        $bonExamens = $this->bonExamenService->getAllBonExamens();
        return response()->json($bonExamens);
    }

    public function getBonExamensByFilters(Request $request)
    {
        $filters = $request->all();
        $bonExamens = $this->bonExamenService->getBonExamensByFilters($filters);
        return response()->json($bonExamens);
    }

    public function count()
    {
        $count = $this->bonExamenService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $bonExamen = $this->bonExamenService->getBonExamenById($id);
        if ($bonExamen) {
            return response()->json($bonExamen);
        } else {
            return response()->json(['message' => 'BonExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $bonExamen = $this->bonExamenService->createBonExamen($request->all());
        return response()->json($bonExamen, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $bonExamen = $this->bonExamenService->updateBonExamen($id, $request->all());
        if ($bonExamen) {
            return response()->json($bonExamen);
        } else {
            return response()->json(['message' => 'BonExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->bonExamenService->deleteBonExamen($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'BonExamen not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
