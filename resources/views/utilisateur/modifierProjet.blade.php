@extends('utilisateur.templateUtilisateur')

@section('contentUtilisateur')
<div class="row">   
    <div class="col-sm-12 col-md-6 col-xl-4">
       <div class="white_shd full margin_bottom_30 ">
         <h6 class="mb-4">Modifier fournisseur projet</h6>
            @if(session()->has("success"))
            <div class="alert alert-success" >
                {{session()->get('success')}}
            </div>
            @endif
            @if(session()->has("erreur"))
            <div class="alert alert-danger" >
                {{session()->get('erreur')}}
            </div>
            @endif
         <form method="POST" action="{{route('projet.modifierFournisseur',['id'=>$projet[0]->id])}}" >
            @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Nom</label>
                 <input type="text" @disabled(true) class="form-control" required id="exampleInputEmail1" name="nom" value="{{$projet[0]->nom}} "> 
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Dependance</label>
                 <input type="text" @disabled(true) class="form-control" required id="exampleInputEmail1" name="dependance" value="{{$projet[0]->dependance}}">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">description</label>
                 <input type="text" @disabled(true) class="form-control" required id="exampleInputEmail1" name="description" value="{{$projet[0]->description}}">
             </div>
             
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Fournisseur</label >
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="fournisseur" value="{{$projet[0]->fournisseur}}">
             </div>
             <button type="submit" class="btn btn-primary">Enregistrer</button>
             <a href="{{route('projet.util')}}" class="btn btn-danger">Annuler</a>
         </form>
       </div>
    </div>
 </div>
 @endsection