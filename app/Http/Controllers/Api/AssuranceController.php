<?php

namespace App\Http\Controllers\Api;

use App\Models\Assurance;
use App\Http\Resources\AssuranceResource;
use App\Http\Controllers\Controller;
use App\Services\AssuranceService;
use App\Http\Requests\StoreAssuranceRequest;
use App\Http\Requests\UpdateAssuranceRequest; 
use Illuminate\Http\Response;

class AssuranceController extends Controller
{
    protected $assuranceService;

    public function __construct(AssuranceService $assuranceService)
    {
        $this->assuranceService = $assuranceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AssuranceResource::collection(Assurance::query()->orderBy('id', 'asc')->paginate(10));
    }

    public function count()
    {
        $count = $this->assuranceService->count();
        return response()->json($count);
    }

    public function show($id)
    {
        $assurance = $this->assuranceService->getAssuranceById($id);
        if ($assurance) {
            return response()->json($assurance);
        } else {
            return response()->json(['message' => 'Assurance not found.'], Response::HTTP_NOT_FOUND);
        }
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAssuranceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssuranceRequest $request)
    {
        $data = $request->validated(); 
        $assurance = Assurance::create($data);

        return response(new AssuranceResource($assurance) , 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAssuranceRequest $request
     * @param \App\Models\Assurance                     $assurance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssuranceRequest $request, Assurance $assurance)
    {
        $data = $request->validated(); 
        $assurance->update($data);

        return new AssuranceResource($assurance);
    }

    public function destroy($id)
    {
        $deleted = $this->assuranceService->deleteAssurance($id);
        if ($deleted) {
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } else {
            return response()->json(['message' => 'Assurance not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}