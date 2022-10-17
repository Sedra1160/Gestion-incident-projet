@extends('layout.template')

@section('content')
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Projet</h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">

                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                            <div class="profile_img"><img width="180" class="rounded-circle" src="{{asset('img/projet.png')}}" alt="#" /></div>
                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h3>{{$projets[0]->nom}}</h3>
                                    <p><strong>Dependance: </strong>{{$projets[0]->dependance}}</p>
                                    <p><strong>Observation: </strong>{{$projet[0]->observation}}</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-user"></i> : {{$projets[0]->nomintervenant}} {{$projets[0]->prenomintervenant}}</li>
                                        <li><i class="fa fa-calendar"></i> : à commcer le {{$projets[0]->datedebut}}</li>
                                        <li><i class="fa fa-calendar"></i> : fin préventive {{$projets[0]->datefin}}</li>
                                    </ul>
                                </div>
                                <div class="user_progress_bar">
                                    <div class="progress_bar">
                                        <!-- Skill Bars -->
                                        <span class="skill" style="width:85%;">Statut      :  
                                            <?php if($deroulement[0]->statut == 1) { ?>
                                            <span class="badge badge-pill badge-primary">en cours</span>
                                            <?php } ?>
                                            <?php if($deroulement[0]->statut == 2) { ?>
                                             <span class="badge badge-pill badge-warning">en developpement</span>
                                             <?php } ?>
                                             <?php if($deroulement[0]->statut == 3) { ?>
                                                <span class="badge badge-pill badge-success">projet fini</span>
                                             <?php } ?></span>                   
                                        <div class="progress skill-bar ">
                                            <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: {{$deroulement[0]->pourcentagefait}}%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shadow-lg p-4 mb-4 bg-white">
                                    <a href="{{route('projet.liste')}}" class="btn btn-danger">retour</a>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection           