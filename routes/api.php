<?php

use App\Http\Controllers\Api\ActeController;
use App\Http\Controllers\Api\AntecedentController;
use App\Http\Controllers\Api\AssuranceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BonExamenController;
use App\Http\Controllers\Api\ChambreController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DossierMedicalController;
use App\Http\Controllers\Api\ExamenController;
use App\Http\Controllers\Api\FactureController;
use App\Http\Controllers\Api\HospitalisationController;
use App\Http\Controllers\Api\OrdonnanceController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PersonnelMedicalController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\RdvController;
use App\Http\Controllers\Api\RecuController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SoinController;
use App\Http\Controllers\Api\SymptomeController;
use App\Http\Controllers\Api\TypeExamenController;
use App\Http\Controllers\Api\TypeSoinController; 
use App\Http\Controllers\Api\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    }); 

    Route::apiResource('/actes', ActeController::class);
    Route::apiResource('/antecedents', AntecedentController::class);
    Route::apiResource('/assurances', AssuranceController::class);
    Route::get('/assurances/count', [AssuranceController::class, 'count']);
    Route::apiResource('/bonexamens', BonExamenController::class);
    Route::apiResource('/chambres', ChambreController::class);
    Route::apiResource('/consultations', ConsultationController::class);
    Route::apiResource('/dossiermedicals', DossierMedicalController::class);
    Route::apiResource('/examens', ExamenController::class);
    Route::apiResource('/factures', FactureController::class);
    Route::apiResource('/hospitalisations', HospitalisationController::class);
    Route::apiResource('/ordonnances', OrdonnanceController::class);
    Route::apiResource('/patients', PatientController::class);
    Route::apiResource('/personnelmedicals', PersonnelMedicalController::class);
    Route::apiResource('/prescriptions', PrescriptionController::class);
    Route::apiResource('/rdvs', RdvController::class);
    Route::apiResource('/recus', RecuController::class);
    Route::apiResource('/services', ServiceController::class);
    Route::apiResource('/soins', SoinController::class);
    Route::apiResource('/symptomes', SymptomeController::class);
    Route::apiResource('/typeexamens', TypeExamenController::class);
    Route::apiResource('/typesoins', TypeSoinController::class); 
    Route::apiResource('/users', UserController::class);   
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);