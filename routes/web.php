<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerListeIntervenant;
use App\Http\Controllers\ControllerAjoutIntervenant;
use App\Http\Controllers\ControllerTypeIncident;
use App\Http\Controllers\ControllerAjoutIncident;
use App\Http\Controllers\ControllerListeIncident;
use App\Http\Controllers\ControllerAjoutProjet;
use App\Http\Controllers\ControllerListeProjet;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// -------------------------------------ADMINISTRATEUR---------------------------------------------

Route::get('/', [AdministrateurController::class,'index'])->name("login");
Route::post('login', [AdministrateurController::class,'valide'])->name("login.valide");
Route::get('logout', [AdministrateurController::class,'deconnexion'])->name("deconnexion");

Route::get('listeIntervenant', [ControllerListeIntervenant::class,'index'])->name("listeIntervenant");
Route::get('listeIntervenant/{fiche}', [ControllerListeIntervenant::class,'fiche'])->name("intervenant.fiche");
Route::get('modifierIntervenant/{intervenantEdit}', [ControllerListeIntervenant::class,'edit'])->name("intervenant.edit");
Route::get('listeIntervenant/{intervenant}', [ControllerListeIntervenant::class,'supprimer'])->name("intervenant.supprimer");

Route::get('ajoutIntervenant',[ControllerAjoutIntervenant::class,'index'])->name('ajoutIntervenant');
Route::post('ajoutIntervenant',[ControllerAjoutIntervenant::class,'ajout'])->name("intervenant.ajout");
Route::post('modifierIntervenant/{id}',[ControllerAjoutIntervenant::class,'modifier'])->name("intervenant.modifier");

Route::get('typeIncident',[ControllerTypeIncident::class,'index'])->name('typeIncident');
Route::post('typeIncident',[ControllerTypeIncident::class,'ajout'])->name("typeIncident.ajout");
Route::get('typeIncident/{typeIncident}',[ControllerTypeIncident::class,'supprimer'])->name("typeIncident.supprimer");

Route::get('ajoutIncident',[ControllerAjoutIncident::class,'index'])->name('ajoutIncident');
Route::post('ajoutIncident',[ControllerAjoutIncident::class,'ajout'])->name('incident.ajout');
Route::post('ajoutIncident/{id}',[ControllerAjoutIncident::class,'modifier'])->name('incident.modifier');

Route::get('tableIncident',[ControllerListeIncident::class,'index'])->name('tableIncident');
Route::get('incidents/{page}',[ControllerListeIncident::class,'pagination'])->name('incident.pagination');
Route::get('fiche/{id}',[ControllerListeIncident::class,'fiche'])->name('incident.fiche');
Route::get('incident/{incidentEdit}',[ControllerListeIncident::class,'edit'])->name("incident.edit");
Route::get('incident_delete/{incidentSupp}',[ControllerListeIncident::class,'supprimer'])->name("incident.supprimer");
Route::get('archive/incident/{incidentArchive}',[ControllerListeIncident::class,'archive'])->name("incident.archive");
Route::post('recherche/incident',[ControllerListeIncident::class,'recherche'])->name("incident.recherche");
Route::get('similaire/incident/{id}',[ControllerListeIncident::class,'similaire'])->name("incident.similaire");

Route::get('ajoutProjet',[ControllerAjoutProjet::class,'index'])->name('ajoutProjet');
Route::post('ajoutProjet',[ControllerAjoutProjet::class,'ajout'])->name('projet.ajout');
Route::post('ajoutProjet/{id}',[ControllerAjoutProjet::class,'modifier'])->name('projet.modifier');

Route::get('tableProjet',[ControllerListeProjet::class,'index'])->name('projet.liste');
Route::get('projets/page/{page}',[ControllerListeProjet::class,'pagination'])->name('projet.pagination');
Route::get('projet/modifier/{id}',[ControllerListeProjet::class,'edit'])->name('projet.edit');
Route::get('projet/supprimer/{projetsupp}',[ControllerListeProjet::class,'supprimer'])->name('projet.supprimer');
Route::get('projet/archive/{projetarchive}',[ControllerListeProjet::class,'archive'])->name('projet.archive');
Route::get('projet/fiche/{id}',[ControllerListeProjet::class,'fiche'])->name('projet.fiche');
Route::post('recherche/projet',[ControllerListeProjet::class,'recherche'])->name('projet.recherche');

Route::get('archives',[ControllerListeIncident::class,'listeArchive'])->name('archive.liste');

Route::get('deroulement',[ControllerListeProjet::class,'deroulement'])->name('deroulement');
Route::get('/email',[ControllerListeProjet::class,'envoyemail'])->name('email');

// -----------------------------------UTILISATEUR---------------------------------------------

Route::get('utilisateur/incidents',[ControllerListeIncident::class,'incidentUtilisateur'])->name('incident.util');
Route::get('utilisateur/incidents/modifier/{id}',[ControllerListeIncident::class,'modifierEtatIncident'])->name('incident.modifier.etat');
Route::get('utilisateur/incidents/fiche/{id}',[ControllerListeIncident::class,'ficheIncidentUtil'])->name('utilisateur.incident.fiche');
Route::get('utilisateur/fournisseur/incident/{id}',[ControllerListeIncident::class,'editFournisseur'])->name('incident.fourisseur.edit');
Route::post('utilisateur/incidents/fournisseur/{id}',[ControllerListeIncident::class,'modifierFournisseurs'])->name('incident.modifierFournisseur');

Route::get('utilisateur/nouveau/projets',[ControllerListeProjet::class,'acceptProjet'])->name('nouveauprojet.util');
Route::get('utilisateur/accepter/projets/{id}',[ControllerListeProjet::class,'modifierAccet'])->name('projet.accept');

Route::get('utilisateur/projets',[ControllerListeProjet::class,'projetUtilisateur'])->name('projet.util');
Route::get('utilisateur/projets/fiche/{id}',[ControllerListeProjet::class,'ficheUtilisateur'])->name('projet.ficheUtilisateur');
Route::get('utilisateur/projets/ficheModification/{id}',[ControllerListeProjet::class,'editFournisseur'])->name('projet.fourisseur.edit');
Route::post('utilisateur/modifier/fournisseur/projet/{id}',[ControllerListeProjet::class,'modifierFournisseur'])->name('projet.modifierFournisseur');
Route::get('utilisateur/projets/terminer/{id}',[ControllerListeProjet::class,'projetFini'])->name('projet.terminer');

Route::get('utilisateur/logout',[AdministrateurController::class,'deconnexionUtilisateur'])->name('deconnexionUtilisateur');
