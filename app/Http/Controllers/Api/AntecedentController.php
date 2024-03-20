<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Antecedent;
use App\Services\AntecedentService;
use App\Http\Resources\AntecedentResource;
use Illuminate\Http\Request;

class AntecedentController extends Controller
{
    protected $antecedentService;

    public function __construct(AntecedentService $antecedentService)
    {
        $this->antecedentService = $antecedentService;
    }

    /*public function index()
    {
        $antecedents = $this->antecedentService->getAllAntecedents();
        return response()->json($antecedents);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AntecedentResource::collection(Antecedent::query()->orderBy('id', 'asc')->paginate(10));
    }

    public function show($id)
    {
        $antecedent = $this->antecedentService->getAntecedentById($id);
        return response()->json($antecedent);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Définissez les règles de validation pour les données reçues du formulaire
        ]);

        $antecedent = $this->antecedentService->createAntecedent($data);
        return response()->json($antecedent, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            // Définissez les règles de validation pour les données reçues du formulaire
        ]);

        $antecedent = $this->antecedentService->updateAntecedent($id, $data);
        return response()->json($antecedent);
    }

    public function destroy($id)
    {
        $this->antecedentService->deleteAntecedent($id);
        return response()->json(null, 204);
    }
}