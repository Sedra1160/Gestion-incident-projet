@extends('layout.template')

@section('content')
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
                    <div style="float: left" class="mb-4">
                        <form class="form-inline" method="POST" action="{{route('projet.recherche')}}">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                              <input type="text" class="form-control" name="projet" placeholder="mot clé">
                            </div>
                            <button type="submit" class="btn btn-dark mb-2"><i class="fa fa-search "></i></button>
                          </form>
                    </div>
                    <div style="float: right" class="mb-4" >
                        <a href="{{route('ajoutProjet')}}" class="btn btn-primary"><i class="fa fa-plus-circle "></i> Ajouter nouveau projet </a>
                    </div>
                    <table class="table table-striped projects">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom du projet</th>
                                <th scope="col">Dependance</th>
                                <th scope="col">Intervenant</th>
                                <th scope="col">Date de debut</th>
                                <th scope="col">Date fin préventive</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">Archiver</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projets as $projet)
                            <tr>
                                <td><a style="color: blue" href="{{route('projet.fiche',['id'=>$projet->id])}}" >{{$projet->nom}}</a></td>
                                <td>{{$projet->dependance}}</td>
                                <td>{{$projet->nomintervenant."  ".$projet->prenomintervenant}}</td>
                                <td>{{$projet->datedebut}}</td>
                                <td>{{$projet->datefin}}</td>
                                <td style="width: 50px"><a href="{{route('projet.edit',['id'=>$projet->id])}}"><i class="fa fa-pencil-square-o green_color" style="font-size:30px"></i></a></td>
                                <td style="width: 50px" style="width: 50px"><a href="{{route('projet.supprimer',['projetsupp'=>$projet->id])}}" onclick="return confirm('voulez-vous vraiment supprimer ?')" ><i class="fa fa-trash red_color" style="font-size:30px"></i></a></td>
                                <td style="width: 50px"><a href="{{route('projet.archive',['projetarchive'=>$projet->id])}}" onclick="return confirm('voulez-vous vraiment archiver?')" ><i class="fa fa-archive yellow_color" style="font-size:30px"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                    <?php for ($i=1; $i <= $countpage ; $i++) { ?>
                        <li class="page-item"><a class="page-link" href="{{route('projet.pagination',['page'=>$i])}}"><?php echo $i?></a></li>&nbsp;
                    <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
</div>

 @endsection