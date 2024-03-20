<?php

namespace App\Http\Controllers\Api;

use App\Models\Acte;
use App\Services\ActeService;
use App\Http\Resources\ActeResource;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ActeController extends Controller
{
    protected $acteService;

    public function __construct(ActeService $acteService)
    {
        $this->acteService = $acteService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ActeResource::collection(Acte::query()->orderBy('id', 'asc')->paginate(10));
    }

    public function show($id)
    {
        $acte = $this->acteService->getActeById($id);
        return response()->json($acte);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Définissez les règles de validation pour les données reçues du formulaire
        ]);

        $acte = $this->acteService->createActe($data);
        return response()->json($acte, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            // Définissez les règles de validation pour les données reçues du formulaire
        ]);

        $acte = $this->acteService->updateActe($id, $data);
        return response()->json($acte);
    }

    public function destroy($id)
    {
        $this->acteService->deleteActe($id);
        return response()->json(null, 204);
    }
}
