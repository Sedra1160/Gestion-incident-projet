<?php

namespace App\Http\Controllers;


use App\Models\Intervenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ControllerAjoutIntervenant extends Controller
{
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            return view('ajoutIntervenant');
        }
        public function ajout(Request $req){
            if($req->mdp == $req->mdpConf){
                if($req->photo == null){
                    $photo = "user.png";
                        DB::table('intervenants')
                    ->insert([
                        "matricule"=> $req->matricule,
                        "nom"=> $req->nom,
                        "prenom"=> $req->prenom,
                        "email"=> $req->email,
                        "photo"=> $photo,
                        "mdp"=> $req->mdp
                    ]);
                }
                else{
                    $req->photo->store('/public/img');
                    // Storage::putFile('photos', new File('public'));
                    // Storage::put('imageStd.png', 'imageStd.png', 'public');
                    $photo = $req->photo;
                        DB::table('intervenants')
                    ->insert([
                        "matricule"=> $req->matricule,
                        "nom"=> $req->nom,
                        "prenom"=> $req->prenom,
                        "email"=> $req->email,
                        "photo"=> $photo,
                        "mdp"=> $req->mdp
                    ]);
                }
                return back()->with("success","Intervenant ajouté avec succè !");
            }
            else{
                return back()->with("erreur","mot de passe non confirmé !");
            }
        }
        // public function store($image){
            
        // }
        public static function modifier(Request $req,$id){
            DB::table('intervenants')
            ->where("id",$id)
            ->update([
                'matricule'=>$req->matricule,
                'nom'=>$req->nom,
                'prenom'=>$req->prenom,
                'email'=>$req->email,
                // 'photo'=>$req->photo,
                'mdp'=>$req->mdp
            ]);
          return back()->with("success","Intervenant modifié avec succè !");
        }
}
// $requetSql = "update intervenants set matricule = '".$req->matricule."', nom = '".$req->nom."' , prenom = '".$req->prenom."' , email = '".$req->email."', mdp = '".$req->mdp."' where id =".$id."";
// DB::update($requetSql);