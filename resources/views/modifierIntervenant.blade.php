
@extends('layout.template')

@section('content')

<div class="row">   
    <div class="col-sm-8 col-md-8 col-xl-8">
       <div class="white_shd full margin_bottom_30 ">
             <h6 class="mb-4">inserer intervenant</h6>
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
        {{-- <h1>{{$intervenant->nom}}</h1> --}}
             <form method="post" action="{{route('intervenant.modifier',['id'=>$intervenant[0]->id])}}">                
                @csrf
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Id</label>
                    <input type="text"  value="{{$intervenant[0]->id}}" name="matricule">
                </div> --}}
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Matricule</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" value="{{$intervenant[0]->matricule}}" name="matricule">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Nom</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" value="{{$intervenant[0]->nom}}" name="nom">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Prenom</label>
                     <input type="text" required class="form-control" id="exampleInputEmail1" value="{{$intervenant[0]->prenom}}" name="prenom">
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1" class="form-label">Email</label>
                     <input type="email" required class="form-control" id="exampleInputEmail1" value="{{$intervenant[0]->email}}" name="email">
                 </div>
                 <label for="exampleInputEmail1" class="form-label">Photo de profile</label>
                 <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" value="{{$intervenant[0]->photo}}" name="photo">
                    <label class="custom-file-label" for="validatedCustomFile">{{$intervenant[0]->photo}}</label>
                  </div>
                 <div class="form-group">  
                     <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                     <input type="password" required class="form-control" id="exampleInputPassword1" value="{{$intervenant[0]->mdp}}" name="mdp">
                 </div>
                 <button type="submit" class="btn btn-primary">Enregistrer</button>
                 <a href="{{route('listeIntervenant')}}" class="btn btn-danger">Annuler</a>
             </form>
       </div>
    </div>
 </div>


@endsection