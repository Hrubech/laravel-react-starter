<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ServiceResource::collection(Service::query()->orderBy('id', 'asc')->get());
    }

    /*public function filter(Request $request)
    {
        $filters = $request->all();
        $services = $this->serviceService->getServicesByFilters($filters);
        return response()->json($services);
    }*/

    public function count()
    {
        $count = $this->serviceService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $service = $this->serviceService->getServiceById($id);
        if ($service) {
            return response()->json($service);
        } else {
            return response()->json(['message' => 'Service not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getFileLines()
    {
        // Logique pour lire les lignes du fichier spécialites.txt
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $service = $this->serviceService->createService($validatedData);
        return response()->json($service, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Valider les données de la requête selon les besoins
        ]);

        $service = $this->serviceService->updateService($id, $validatedData);
        if ($service) {
            return response()->json($service);
        } else {
            return response()->json(['message' => 'Service not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->serviceService->deleteService($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Service not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}