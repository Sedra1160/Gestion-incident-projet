@extends('utilisateur.templateUtilisateur')

@section('contentUtilisateur')
<div class="row column1">
    <div class="col-md-2"></div>
    <div class="col-md-8">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Incident</h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                              <div class="profile_img"><img width="180" class="rounded-circle" src="{{asset('img/incident.jpg')}}" alt="#" /></div>
                                <div class="profile_contant">
                                    <div class="contact_inner">
                                        <h3>{{$incidents[0]->nom}}</h3>
                                        <p><strong>Type: </strong>{{$incidents[0]->type}}</p>
                                        <p><strong>Commentaire: </strong>{{$incidents[0]->commentaire}}</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-user"></i> : {{$incidents[0]->nomintervenant}} {{$incidents[0]->prenomintervenant}}</li>
                                            <li><i class="fa fa-calendar"></i> : à commcer le {{$incidents[0]->dateincident}}</li>
                                            <li><i class="fa fa-shopping-cart"></i> : {{$incidents[0]->id}}</li>
                                        </ul>
                                        <div class="shadow-lg p-4 mb-4 bg-white">
                                          <form class="row g-3" method="POST" action="{{route('ajout.fournisseurIncident',['id'=>$incidents[0]->id])}}">
                                              @csrf
                                              <div class="col-auto">
                                                <input type="text" class="form-control" name="fournisseur" placeholder="ajout fournisseur" >
                                              </div>
                                              <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
                                              </div>
                                          </form>
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
</div>


@endsection           