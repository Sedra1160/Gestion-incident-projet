@extends('utilisateur.templateUtilisateur')

@section('contentUtilisateur')
<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Incidents</h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive-sm">
                        
                            <table class="table table-striped projects">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Incident</th>
                                        <th scope="col">Type incident</th>
                                        <th scope="col">Intervenant</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Fournisseur</th>
                                        <th scope="col">Modifier fournisseur</th>
                                        <th scope="col">Résolu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidents as $incident)
                                            <tr>
                                                <td><a style="color:blue" href="{{route('utilisateur.incident.fiche',['id'=>$incident->id])}}">{{$incident->nom}}</a></td>
                                                <td>{{$incident->type}}</td>    
                                                <td>{{$incident->nomintervenant}}</td>
                                                <td>{{$incident->dateincident}}</td>
                                                <td>{{$incident->fournisseurs}}</td>
                                                <td style="width: 50px"><a href="{{route('incident.fourisseur.edit',['id'=>$incident->id])}}"><i class="fa fa-pencil-square-o green_color" style="font-size:30px"></i></a></td>
                                                <td style="width: 50px"><a href="{{route('incident.modifier.etat',['id'=>$incident->id])}}" onclick="return confirm('voulez-vous vraiment modifier?')" ><i class="fa fa-gears red_color" style="font-size:30px"></i></a></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <?php for ($i=1; $i <= $countpage ; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="{{route('incident.pagination',['page'=>$i])}}"><?php echo $i?></a></li>&nbsp;
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