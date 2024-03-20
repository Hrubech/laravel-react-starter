<?php

namespace App\Http\Controllers\Api;

use App\Models\Rdv;
use App\Services\RdvService;
use App\Http\Controllers\Controller;
use App\Http\Resources\RdvResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RdvController extends Controller
{
    protected $rdvService;

    public function __construct(RdvService $rdvService)
    {
        $this->rdvService = $rdvService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RdvResource::collection(Rdv::query()->orderBy('id', 'asc')->get());
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $rdvs = $this->rdvService->getRdvByFilters($filters);
        return response()->json($rdvs);
    }*/

    public function count()
    {
        $count = $this->rdvService->count();
        return response()->json($count);
    }

    public function todayCount()
    {
        $count = $this->rdvService->getTodayRdvCount();
        return response()->json($count);
    }

    public function show($id)
    {
        $rdv = $this->rdvService->getRdvById($id);
        if ($rdv) {
            return response()->json($rdv);
        } else {
            return response()->json(['message' => 'Rdv not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getPersonnelMedical($id)
    {
        $rdv = $this->rdvService->getRdvById($id);
        if ($rdv) {
            return response()->json($rdv->personnelMedical);
        } else {
            return response()->json(['message' => 'Rdv not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $rdv = $this->rdvService->createRdv($validatedData);
        return response()->json($rdv, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $rdv = $this->rdvService->updateRdv($id, $validatedData);
        if ($rdv) {
            return response()->json($rdv);
        } else {
            return response()->json(['message' => 'Rdv not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->rdvService->deleteRdv($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Rdv not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}