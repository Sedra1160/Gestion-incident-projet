@extends('layout.template')

@section('content')

<div class="card" style="width: 50%;">
    <img class="card-img-top" src="{{asset("img/".$intervenant[0]->photo)}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Matricule {{$intervenant[0]->matricule}}</h5>
      <p class="card-text">Nom :{{$intervenant[0]->nom}} </p>
      <p class="card-text">prénom : {{$intervenant[0]->prenom}} </p>
      <p class="card-text">email : {{$intervenant[0]->email}} </p>
      <a href="{{route('intervenant.edit',['intervenantEdit'=>$intervenant[0]->id])}}" class="btn btn-primary">Modifier</a>
    </div>
</div>

@endsection           