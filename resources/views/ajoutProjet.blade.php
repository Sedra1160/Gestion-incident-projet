@extends('layout.template')

@section('content')
<div class="row">   
    <div class="col-sm-12 col-md-6 col-xl-4">
       <div class="white_shd full margin_bottom_30 ">
         <h6 class="mb-4">inserer nouveau projet</h6>
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
         <form method="POST" action="{{route('projet.ajout')}}" >
            @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Nom</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="nom">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Dependance</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="dependance">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">description</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="description">
             </div>
              <label for="exampleInputEmail1" class="form-label">Signe de prorité</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="priorite">
                    @foreach ($priorites as $priorite)
                    <option value="{{$priorite->id}}">{{$priorite->nom}}</option>
                    @endforeach
                  </select>
                </select>
             </div>
             <label for="exampleInputEmail1" class="form-label">Intervenant</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="intervenant"> 
                    @foreach ($intervenants as $intervenant)
                    <option value="{{$intervenant->id}}">{{$intervenant->nom}}</option>
                    @endforeach
                  </select>
                </select>
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">date debut</label>
                 <input type="date" class="form-control" required id="exampleInputEmail1" name="dateDebut">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">date fin préventive</label>
                 <input type="date" class="form-control" required id="exampleInputEmail1" name="dateFin">
             </div>
             <label for="exampleInputEmail1" class="form-label">Statu</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="statut">
                    @foreach ($statuts as $statut)
                    <option value="{{$statut->id}}">{{$statut->nom}}</option>
                    @endforeach
                  </select>
                </select>
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Observation</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="observation">
             </div>
             <button type="submit" class="btn btn-primary">Enregistrer</button>
             <a href="{{route('projet.liste')}}" class="btn btn-danger">Annuler</a>
         </form>
       </div>
    </div>
 </div>
 @endsection