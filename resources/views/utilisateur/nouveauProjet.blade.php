@extends('utilisateur.templateUtilisateur')

@section('contentUtilisateur')
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Projets</h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">
                <div class="col-lg-12">
                   <div class="table-responsive-sm">

                    <table class="table table-striped projects">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom du projet</th>
                                <th scope="col">Dependance</th>
                                <th scope="col">Intervenant</th>
                                <th scope="col">Date de debut</th>
                                <th scope="col">Date fin préventive</th>
                                <th scope="col">Modifier</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projets as $projet)
                            <tr>
                                <td><a style="color: blue" href="{{route('projet.ficheUtilisateur',['id'=>$projet->id])}}" >{{$projet->nom}}</a></td>
                                <td>{{$projet->dependance}}</td>
                                <td>{{$projet->nomintervenant."  ".$projet->prenomintervenant}}</td>
                                <td>{{$projet->datedebut}}</td>
                                <td>{{$projet->datefin}}</td>
                                <td style="width: 50px"><a href="{{route('projet.accept',['id'=>$projet->id])}}"><i class="fa fa-check-square-o green_color" style="font-size:30px"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

 @endsection