<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chambre;
use App\Http\Resources\ChambreResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ChambreService;

class ChambreController extends Controller
{
    protected $chambreService;

    public function __construct(ChambreService $chambreService)
    {
        $this->chambreService = $chambreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ChambreResource::collection(Chambre::query()->orderBy('id', 'asc')->paginate(10));
    } 

    public function count()
    {
        $count = $this->chambreService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $chambre = $this->chambreService->getChambreById($id);
        if ($chambre) {
            return response()->json($chambre);
        } else {
            return response()->json(['message' => 'Chambre not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $chambre = $this->chambreService->createChambre($request->all());
        return response()->json($chambre, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $chambre = $this->chambreService->updateChambre($id, $request->all());
        if ($chambre) {
            return response()->json($chambre);
        } else {
            return response()->json(['message' => 'Chambre not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->chambreService->deleteChambre($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Chambre not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
