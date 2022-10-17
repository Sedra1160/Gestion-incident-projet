

@extends('layout.template')

@section('content')
<div class="white_shd full margin_bottom_30">
<div class="full graph_head">
    <div class="heading1 margin_0">
        <h2>Tableau d'intervenant</h2>
    </div>
</div>
@if(session()->has("success"))
<div class="alert alert-success" >
    {{session()->get('success')}}
</div>
@endif    
<div class="mt-4">
    <div style="float: right" class="mb-4" >
        <a href="{{route('ajoutIntervenant')}}" class="btn btn-primary"><i class="fa fa-plus-circle "></i> Ajouter un nouvel intervenant </a>
    </div>
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($intervenants as $intervenant)
                
            <tr>
                <td><ul class="list-inline">
                    <li>
                       <img width="40" src="{{asset("img/".$intervenant->photo)}}" class="rounded-circle" alt="#">
                    </li>
                 </ul></td>
                <td><a style="color: blue" href="{{route('intervenant.fiche',['fiche'=>$intervenant->id])}}" >{{$intervenant->matricule}}</a></td>
                <td>{{$intervenant->nom}}</td>
                <td>{{$intervenant->prenom}}</td>
                <td>{{$intervenant->email}}</td>
                <td style="width: 50px"><a href="{{route('intervenant.edit',['intervenantEdit'=>$intervenant->id])}}" ><i class="fa fa-pencil-square-o green_color" style="font-size:30px"></i></a></td>
                <td style="width: 50px"><a href="{{route('intervenant.supprimer',['intervenant'=>$intervenant->id])}}" onclick="return confirm('voulez-vous vraiment supprimer?')"><i class="fa fa-trash red_color" style="font-size:30px"></i></a></td>
                
                {{-- onclick="if(confirm('voulez-vous vraiment supprimer {{$intervenant->nom}} ?')){
                    document.getElementById('form-{{$intervenant->id}}').submit() }" --}}
                {{-- <form id="form-{{$intervenant->id}}" action="{{route('intervenant.supprimer',['intervenant'=>$intervenant->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                 </form> --}}

                 {{-- <td><a href="{{route('intervenant.fiche',['fiche'=>$intervenant->id])}}" class="btn btn-primary" >voir</a></td>
                <td style="width: 50px"><a href="{{route('intervenant.edit',['intervenantEdit'=>$intervenant->id])}}" ><i class="fa fa-pencil-square-o green_color" style="font-size:30px"></i></a></td>
                <td style="width: 50px"><a href="{{route('intervenant.supprimer',['intervenant'=>$intervenant->id])}}" onclick="return confirm('voulez-vous vraiment supprimer?')"><i class="fa fa-trash red_color" style="font-size:30px"></i></a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection