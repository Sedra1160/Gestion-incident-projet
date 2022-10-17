@extends('layout.template')

@section('content')
<div class="row">   
    <div class="col-sm-12 col-md-6 col-xl-4">
       <div class="white_shd full margin_bottom_30 ">
         <h6 class="mb-4">Modifier projet</h6>
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
         <form method="POST" action="{{route('projet.modifier',['id'=>$projet[0]->id])}}" >
            @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Nom</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="nom" value="{{$projet[0]->nom}}"> 
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Dependance</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="dependance" value="{{$projet[0]->dependance}}">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">description</label>
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="description" value="{{$projet[0]->description}}">
             </div>
              <label for="exampleInputEmail1" class="form-label">Signe de prorité</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="priorite" value="{{$projet[0]->idpriorite}}">
                    @foreach ($priorites as $priorite)
                    @if($priorite->id == $projet[0]->idpriorite)
                    <option value="{{$priorite->id}}" selected>{{$priorite->nom}}</option>
                    @else
                    <option value="{{$priorite->id}}">{{$priorite->nom}}</option>
                    @endif
                    @endforeach
                  </select>
                </select>
             </div>
             <label for="exampleInputEmail1" class="form-label">Intervenant</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="intervenant" "> 
                    @foreach ($intervenants as $intervenant)
                    @if ($intervenant->id == $projet[0]->idintervenant)
                    <option value="{{$intervenant->id}}" selected>{{$intervenant->nom." ".$intervenant->prenom}}</option>  
                    @else
                    <option value="{{$intervenant->id}}">{{$intervenant->nom." ".$intervenant->prenom}}</option> 
                    @endif
                    @endforeach
                  </select>
                </select>
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">date debut</label>
                 <input type="date" class="form-control" required id="exampleInputEmail1" name="dateDebut" value="{{$projet[0]->datedebut}}">
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">date fin préventive</label>
                 <input type="date" class="form-control" required id="exampleInputEmail1" name="dateFin" value="{{$projet[0]->datefin}}"> 
             </div>
             <label for="exampleInputEmail1" class="form-label">Statu</label>
             <div class="form-floating mb-3">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="statut" value="{{$projet[0]->idstatut}}">
                    @foreach ($statuts as $statut)
                    @if($statut->id == $projet[0]->idstatut)
                    <option value="{{$statut->id}}" selected>{{$statut->nom}}</option>
                    @else
                    <option value="{{$statut->id}}" >{{$statut->nom}}</option>
                    @endif
                    @endforeach
                  </select>
                </select>
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Observation</label >
                 <input type="text" class="form-control" required id="exampleInputEmail1" name="observation" value="{{$projet[0]->observation}}">
             </div>
             <button type="submit" class="btn btn-primary">Enregistrer</button>
             <a href="{{route('projet.liste')}}" class="btn btn-danger">Annuler</a>
         </form>
       </div>
    </div>
 </div>
 @endsection