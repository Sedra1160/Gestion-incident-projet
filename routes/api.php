<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceIncident;
use App\Http\Controllers\ServiceProjet;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('incidents',[ServiceIncident::class,'incidents']);
Route::get('modifier/incindent/{id}',[ServiceIncident::class,'modifierStatut']);

Route::get('projets',[ServiceProjet::class,'projets']);
Route::get('accpeter/projet/{id}',[ServiceProjet::class,'accpeterProjet']);
Route::post('fournisseur/projet/{id}',[ServiceProjet::class,'ajoutFournisseur']);
