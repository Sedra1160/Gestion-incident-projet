@extends('layout.template')

@section('content')

<div class="row">   
    <div class="col-sm-12 col-md-6 col-xl-4" style="margin-left: 25%;margin-top: 10%">
       <div class="white_shd full margin_bottom_30 ">
           <div class="d-flex align-items-center justify-content-between mb-4">
               <h4 class="mb-0">inserer votre type d'incident</h4>
           </div>
           @if(session()->has("success"))
           <div class="alert alert-success" >
               {{session()->get('success')}}
           </div>
           @endif    
           <form class="form-inline" method="post" action="{{route('typeIncident.ajout')}}"> 
            @csrf
               <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Password</label>
                  <input type="text" style="width: 250px;" required class="form-control" id="inputPassword2" placeholder="type d'incident" name="nom">
               </div>
               <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
           </form>
            @foreach ($type_incidents as $type_incident)
            <div class="d-flex align-items-center border-bottom py-2">
               <div class="w-100 ms-3">
                     <div class="d-flex w-100 align-items-center justify-content-between">
                        <span>{{$type_incident->nom}}</span>
                           <a class="btn btn-danger" href="{{route('typeIncident.supprimer',['typeIncident'=>$type_incident->id])}}" onclick="return confirm('voulez-vous vraiment supprimer?')" ><i class="fa fa-times"></i></a>
                     </div>
               </div>
            </div>
            @endforeach
       </div>
    </div>
 </div>

 @endsection