@extends('layout.template')

@section('content')
@if(session()->has("success"))
<div class="alert alert-success" >
    {{session()->get('success')}}
</div>
@endif
<form method="POST" action="{{route('incident.ajout')}}">
  @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nom</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" required placeholder="nom de l'incident" name="nom">
    </div>

    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">type incident</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type">
          <option value=""></option>
          @foreach ($typeIncidents as $typeIncident)
          <option value="{{$typeIncident->id}}">{{$typeIncident->nom}}</option>    
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">intervenant</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="intervenant">
          <option value=""></option>
          @foreach ($intervenants as $intervenant)
          <option value="{{$intervenant->id}}">{{$intervenant->nom." ".$intervenant->prenom}}</option>    
          @endforeach
        </select>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">votre commentaire</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer </button>
        <a href="{{route('tableIncident')}}" class="btn btn-danger">Annuler</a>
    </div>
  </form>
 @endsection