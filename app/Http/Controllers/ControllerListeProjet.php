<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ControllerListeProjet extends Controller
{
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = 0;
            $isa = DB::select('select * from projetactif where statut < 3 and archive = 0 and supprimer = 0');
            $countpage = ceil(count($isa) / $limit) ;
            $projets = DB::select("select * from projetactif where statut < 3 and archive = 0 and supprimer = 0 LIMIT ? OFFSET ?",[$limit,$offset]);
            return view('listeProjet',compact('projets','countpage'));
        }
        public static function pagination($page){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = ($page - 1) * $limit;
            $isa = DB::select('select * from projetactif where statut < 3 and archive = 0 and supprimer = 0');
            $countpage = ceil(count($isa) / $limit);
            $projets = DB::select("select * from projetactif where statut < 3 and archive = 0 and supprimer = 0 LIMIT ? OFFSET ?",[$limit,$offset]);
            return view('listeProjet',compact('projets','countpage'));
        }
        public function supprimer($id){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "supprimer"=>1
            ]);
            DB::table('projetsupprimer')
            ->insert([
                "idprojet"=>$id
            ]);
            return back()->with("success","Projet supprimé avec succè !");
        }
        public function archive($id){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "archive"=>1
            ]);
            DB::table('projetarchive')
            ->insert([
                "idprojet"=>$id
            ]);
            return back()->with("success","Projet archivé avec succè !");
        }
        public function deroulement(){
            $projets = DB::select("select * from deroulementprojet where pourcentagefait < 400");
            return view('deroulement',compact("projets"));
        }
        public function envoyemail(){
            Mail::to('bibilava3221@protonm.com')->send(new Email());
            return view('email');
        }
        public function fiche($id){
            if(session('admin')==false)return AdministrateurController::index();
            $projet = DB::select("select * from projet where id = ? ",[$id]);
            $projets = DB::select("select * from projetactif where id = ? ",[$id]);
            $deroulement = DB::select("select * from deroulementprojet where id = ? ",[$id]);
            return view('ficheProjet',compact("projets","projet","deroulement"));
        }
        public function edit($id){
            $priorites = DB::select("select * from Priorite");
            $statuts = DB::select("select * from Statut");
            $intervenants = DB::select('select * from intervenants ');
            $projet = DB::select("select * from projet where id = ? ",[$id]);
            return view('modifierProjet',compact("projet","priorites","statuts","intervenants"));
        }
        public function recherche(Request $req){
            if(session('admin')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = 0;
            $nom = "%".$req->projet."%";
            $isa = DB::select('select * from projetactif where statut < 3 and archive = 0 and supprimer = 0 and nom LIKE ?',[$nom]);
            $countpage = ceil(count($isa) / $limit) ;
            $projets = DB::select("select * from projetactif where statut < 3 and archive = 0 and supprimer = 0 and nom LIKE ? LIMIT ? OFFSET ?",[$nom,$limit,$offset]);
            return view('listeProjet',compact('projets','countpage'));
        }
        public function projetUtilisateur(){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $limit = 3;
            $offset = 0;
            $user = session()->get('nomUtilisateur');
            $isa = DB::select('select * from projetactif where statut = 2 and archive = 0 and supprimer = 0 and nomintervenant = ?',[$user]);
            $countpage = ceil(count($isa) / $limit) ;
            $projets = DB::select("select * from projetactif where statut = 2 and archive = 0 and supprimer = 0 and nomintervenant = ? LIMIT ? OFFSET ?",[$user,$limit,$offset]);
            return view('utilisateur.projetUtilisateur',compact('projets','countpage'));           
        }
        public function ficheUtilisateur($id){
            if(session('utilisateur')==false)return AdministrateurController::index();
            $projet = DB::select("select * from projet where id = ? ",[$id]);
            $projets = DB::select("select * from projetactif where id = ? ",[$id]);
            $deroulement = DB::select("select * from deroulementprojet where id = ? ",[$id]);
            return view('utilisateur.ficheProjetUtilisateur',compact("projets","projet","deroulement"));
        }
        public function ajoutFournisseur($id,Request $req){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "fournisseur"=>$req->fournisseur
            ]);
            return back()->with("success","Fournisseur enregistrer avec succè !");
        }
        public function acceptProjet(){
            $user = session()->get('nomUtilisateur');
            $projets = DB::select("select * from projetactif where statut = 1 and archive = 0 and supprimer = 0 and nomintervenant = ? ",[$user]);
            return view ('utilisateur.nouveauProjet',compact('projets'));
        }
        public function modifierAccet($id){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "idstatut"=>2
            ]);
            return back()->with("success","Projet accepter avec succè !");
        }
        public function editFournisseur($id){
            $priorites = DB::select("select * from Priorite");
            $statuts = DB::select("select * from Statut");
            $intervenants = DB::select('select * from intervenants ');
            $projet = DB::select("select * from projet where id = ? ",[$id]);
            return view('utilisateur.modifierProjet',compact("projet","priorites","statuts","intervenants"));
        }
        public function modifierFournisseur($id,Request $req){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "fournisseur"=>$req->fournisseur
            ]);
            return back()->with("success","Fournisseur enregistrer avec succè !");
        }
        public function projetFini($id){
            DB::table('projet')
            ->where("id",$id)
            ->update([
                "idstatut"=>3
            ]);
            return back()->with("success","Projet terminer avec succè !");
        }
}