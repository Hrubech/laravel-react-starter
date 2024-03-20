<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeSoin;
use App\Services\TypeSoinService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeSoinResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeSoinController extends Controller
{
    protected $typeSoinService;

    public function __construct(TypeSoinService $typeSoinService)
    {
        $this->typeSoinService = $typeSoinService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TypeSoinResource::collection(TypeSoin::query()->orderBy('id', 'asc')->get());
    }

    public function count()
    {
        $count = $this->typeSoinService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $typeSoin = $this->typeSoinService->getTypeSoinById($id);
        if ($typeSoin) {
            return response()->json($typeSoin);
        } else {
            return response()->json(['message' => 'TypeSoin not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $createdTypeSoin = $this->typeSoinService->createTypeSoin($validatedData);
        return response()->json($createdTypeSoin, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $updatedTypeSoin = $this->typeSoinService->updateTypeSoin($id, $validatedData);
        if ($updatedTypeSoin) {
            return response()->json($updatedTypeSoin);
        } else {
            return response()->json(['message' => 'TypeSoin not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->typeSoinService->deleteTypeSoin($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'TypeSoin not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}