@extends('layout.template')

@section('content')
@if(session()->has("success"))
<div class="alert alert-success" >
    {{session()->get('success')}}
</div>
@endif
<form method="POST" action="{{route('incident.modifier',['id'=>$incident[0]->id])}}">
  @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nom</label>
      <input type="text" class="form-control" id="exampleFormControlInput1"  name="nom" value="{{$incident[0]->nom}}">
    </div>

    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">type incident</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type">
          <option value="{{$incident[0]->idtypeincident}}">{{$incident[0]->idtypeincident}}</option>
          @foreach ($typeIncidents as $typeIncident)
          @if ($typeIncident->id == $incident[0]->idtypeincident)
          <option value="{{$typeIncident->id}}" selected>{{$typeIncident->nom}}</option>    
          @else
          <option value="{{$typeIncident->id}}" >{{$typeIncident->nom}}</option>
          @endif
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">intervenant</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="intervenant">
          <option value="{{$incident[0]->idintervenant}}">{{$incident[0]->idintervenant}}</option>
          @foreach ($intervenants as $intervenant)
          @if ($intervenant->id == $incident[0]->idintervenant)
          <option value="{{$intervenant->id}}" selected>{{$intervenant->nom." ".$intervenant->prenom}}</option>  
          @else
          <option value="{{$intervenant->id}}">{{$intervenant->nom." ".$intervenant->prenom}}</option> 
          @endif
          @endforeach
        </select>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">votre commentaire</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire" >{{$incident[0]->commentaire}}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Ajout</button>
        <a href="{{route('tableIncident')}}" class="btn btn-danger">Annuler</a>
    </div>
  </form>
 @endsection                