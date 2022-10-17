@extends('layout.template')

@section('content')

<div class="row">   
    <div class="col-sm-8 col-md-8 col-xl-8" style="margin-left: 10%">
       <div class="white_shd full margin_bottom_30 ">
             <h4 class="mb-4">intervenant</h4>
             @if(session()->has("erreur"))
                <div class="alert alert-danger" >
                    {{session()->get('erreur')}}
                </div>
            @endif
            @if(session()->has("success"))
            <div class="alert alert-success" >
                {{session()->get('success')}}
            </div>
        @endif
             <form method="post" action="{{route('intervenant.ajout')}}">                
                @csrf
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Matricule</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="matricule">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Nom</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Prenom</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="prenom">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Email</label>
                     <input type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                 </div>
                 <label for="exampleInputEmail1" class="form-label">Photo de profile</label>
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="photo">
                    <label class="custom-file-label" for="validatedCustomFile">Choisir photo</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
                 <div class="form-group">  
                     <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                     <input type="password" required class="form-control" id="exampleInputPassword1" name="mdp">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputPassword1" class="form-label">Confirmation mot de passe</label>
                     <input type="password" required class="form-control" id="exampleInputPassword1" name="mdpConf">
                 </div>
                 <button type="submit" class="btn btn-primary">Enregistrer</button>
                 <a href="{{route('listeIntervenant')}}" class="btn btn-danger">Annuler</a>
             </form>
       </div>
    </div>
 </div>


@endsection