<?php

namespace App\Http\Controllers;

use App\Models\TypeIncident;
use App\Models\Intervenant;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ControllerListeIncident extends Controller
{      
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = 0;
            $isa = DB::select('select * from incidentactif where etat = 0 and archive = 0');
            $countpage = ceil(count($isa) / $limit) ;
            $incidents = DB::select('select * from incidentactif where etat = 0 and archive = 0 and supprimer = 0  LIMIT ? OFFSET ?',[$limit,$offset]);
            return view('listeIncident',compact('incidents','countpage'));
        }
        public function pagination($page){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = ($page - 1) * $limit;
            $isa = DB::select('select * from incidentactif where etat = 0 and archive = 0');
            $countpage = ceil(count($isa) / $limit) ;
            $incidents = DB::select('select * from incidentactif where etat = 0 and archive = 0 and supprimer = 0 LIMIT ? OFFSET ?',[$limit,$offset]);
            return view('listeIncident',compact('incidents','countpage'));
        }
        public function supprimer($id){
            if(session('admin')==false)return AdministrateurController::index();
            DB::table('incident')
            ->where("id",$id)
            ->update([
                "supprimer"=>1
            ]);
            DB::table('incidentsupprimer')
            ->insert([
                "idincident"=>$id
            ]);
            return back()->with("success","incident supprimmé");
        }
        public function edit($id){
            if(session('admin')==false)return AdministrateurController::index();
            $incident = DB::select('select * from incident where id = ?',[$id]);
            $typeIncidents = TypeIncident::all();
            $intervenants = Intervenant::all();
            return view('modifierIncident',compact('incident','typeIncidents','intervenants'));
        }
        public function archive($id){
            if(session('admin')==false)return AdministrateurController::index();
            DB::table('incident')
            ->where("id",$id)
            ->update([
                "archive"=>1
            ]);
            DB::table('incidentarchive')
            ->insert([
                "idincident"=>$id
            ]);
            return back()->with("success","Incident archivé avec succè !");
        }
        public function fiche($id){
            if(session('admin')==false)return AdministrateurController::index();
            $incidents = DB::select('select * from incidentActif where id =?',[$id]);
            return view('ficheIncident',compact('incidents'));
        }
        public function recherche(Request $req){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = 0;
            $nom = "%".$req->incident."%";
            $isa = DB::select('select * from incidentactif where etat = 0 and archive = 0 and nom LIKE ?',[$nom]);
            $countpage = ceil(count($isa) / $limit) ;
            $incidents = DB::select('select * from incidentactif where etat = 0 and archive = 0 and nom LIKE ? LIMIT ? OFFSET ?',[$nom,$limit,$offset]);
            return view('listeIncident',compact('incidents','countpage'));
        }
        public function similaire($id){
            if(session('admin')==false)return AdministrateurController::index();
            $incident = DB::select('select * from incident where id = ?',[$id]);
            $nom = $incident[0]->nom;
            $nomParse = str_word_count($nom,1);
            $nomUtil = "%".$nomParse[0]."%";
            $incidents = DB::select('select * from incidentactif where nom LIKE ?',[$nomUtil]);
            $limit = 3;
            $offset = 0;
            $isa = DB::select('select * from incidentactif where nom LIKE ?',[$nomUtil]);
            $countpage = ceil(count($isa) / $limit) ;
            return view('listeIncident',compact('incidents','countpage'));
        }
        public static function incidentUtilisateur(){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $user = session()->get('nomUtilisateur');
            $limit = 3;
            $offset = 0;
            $isa = DB::select('select * from incidentactif where etat = 0 and archive = 0 and nomintervenant = ? ',[$user]);
            $countpage = ceil(count($isa) / $limit) ;
            $incidents = DB::select('select * from incidentactif where etat = 0 and archive = 0 and nomintervenant = ?  LIMIT ? OFFSET ?',[$user,$limit,$offset]);
            return view('utilisateur.incidentUtilisateur',compact('incidents','countpage'));
        }
        public function modifierEtatIncident($id){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $dateToDay = date('d-m-y h:i:s');
            DB::table('incident')
            ->where("id",$id)
            ->update([
                "etat"=>1,
                "datefin"=>$dateToDay
            ]);
            return back()->with("success","Incident résolu avec succè !");
        }
        public function ficheIncidentUtil($id){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $incidents = DB::select('select * from incidentActif where id =?',[$id]);
            return view('utilisateur.ficheIncidentUtilisateur',compact('incidents'));
        }
        public function modifierFournisseurs(Request $req,$id){
            if(session('utilisateur')==false)return AdministrateurController::index();
            DB::table('incident')
                ->where("id", $id)
                ->update([
                "fournisseurs"=>$req->fournisseur
            ]);
            return back()->with("success","Fournisseur enregistrer avec succè !");
        }
        public function listeArchive(){
            if(session('admin')==false)return AdministrateurController::index();
            $incidents = DB::select('select * from incidentactif where archive = 1');
            $projets = DB::select('select * from projetactif where archive = 1 and supprimer = 0');
            return view('archive',compact('incidents','projets'));
        }
        public function editFournisseur($id){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $incident = DB::select('select * from incident where id = ?',[$id]);
            $typeIncidents = TypeIncident::all();
            $intervenants = Intervenant::all();
            return view('utilisateur.modifierIncident',compact('incident','typeIncidents','intervenants'));
        }
}