@extends('layout.template')

@section('content')

<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Projets <small>( déroulement )</small></h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">
                <div class="col-lg-12">
                   <div class="table-responsive-sm">
                      <table class="table table-striped projects">
                         <thead class="thead-dark">
                            <tr>
                               <th style="width: 2%">#</th>
                               <th style="width: 30%">Nom des projets</th>
                               <th>Intervenants</th>
                               <th>Date fin préventive</th>
                               <th>Status</th>
                            </tr>
                         </thead>
                         <tbody>
                           <?php for ($i=0; $i < count($projets) ; $i++) { ?>
                            <tr>
                               <td>{{$i + 1}}</td>
                               <td>
                                  <a>{{$projets[$i]->nom}}</a>
                               </td>
                               <td>
                                  <ul class="list-inline">
                                     <li>
                                        <img width="40" src="{{asset("img/user.png")}}" class="rounded-circle" alt="#">
                                        {{$projets[$i]->nomintervenant."  ".$projets[$i]->prenomintervenant}}
                                     </li>
                                  </ul>
                               </td>
                               <td class="project_progress">
                                  <div class="progress progress_sm">
                                     <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" style="width: {{$projets[$i]->pourcentagefait}}%;"></div>
                                  </div>
                                  <small>{{$projets[$i]->datefin}}</small>
                               </td>
                               <td>
                                 <?php if($projets[$i]->statut == 1) { ?>
                                <span class="badge badge-pill badge-primary">en cours</span>
                                <?php } ?>
                                <?php if($projets[$i]->statut == 2) { ?>
                                 <span class="badge badge-pill badge-warning">en developpement</span>
                                 <?php } ?>
                                 <?php if($projets[$i]->statut == 3) { ?>
                                    <span class="badge badge-pill badge-success">projet fini</span>
                                 <?php } ?>
                               </td>
                            </tr>
                            <?php } ?>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

@endsection           