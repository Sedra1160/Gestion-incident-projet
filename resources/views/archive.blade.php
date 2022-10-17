@extends('layout.template')

@section('content')

<div class="row column1">
    <div class="col-md-12">
       <div class="white_shd full margin_bottom_30">
          <div class="full graph_head">
             <div class="heading1 margin_0">
                <h2>Incidents & Projets <small>( Archives )</small></h2>
             </div>
          </div>
          <div class="full price_table padding_infor_info">
             <div class="row">
                <div class="col-lg-12">
                   <div class="table-responsive-sm">
                      <table class="table table-striped projects">
                         <thead class="thead-dark">
                            <tr>
                               <th style="width: 2%">Image</th>
                               <th style="width: 30%">Nom incident</th>
                               <th>Intervenant</th>
                               <th>Type d'incident</th>
                               <th>Date</th>
                            </tr>
                         </thead>
                         <tbody>
                        @foreach ($incidents as $incident)
                            <tr>
                               <td>
                                <ul class="list-inline">
                                    <li>
                                       <img width="40" src="{{asset("img/user.png")}}" class="rounded-circle" alt="#">
                                    </li>
                                 </ul>
                               </td>
                               <td>
                                  <a>{{$incident->nom}}</a>
                               </td>
                               <td>
                                  <a>{{$incident->nomintervenant}}</a>
                               </td>
                               <td class="project_progress">
                                  <a>{{$incident->type}}</a>
                               </td>
                               <td>
                                <a>{{$incident->dateincident}}</a>
                               </td>
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                      <table class="table table-striped projects">
                        <thead class="thead-dark">
                           <tr>
                              <th style="width: 2%">Image</th>
                              <th style="width: 30%">Nom projet</th>
                              <th>Intervenant</th>
                              <th>Dependance</th>
                              <th>Date fin preventive</th>
                           </tr>
                        </thead>
                        <tbody>
                       @foreach ($projets as $projet)
                           <tr>
                              <td>
                               <ul class="list-inline">
                                   <li>
                                      <img width="40" src="{{asset("img/user.png")}}" class="rounded-circle" alt="#">
                                   </li>
                                </ul>
                              </td>
                              <td>
                                 <a>{{$projet->nom}}</a>
                              </td>
                              <td>
                                 <a>{{$projet->nomintervenant}}</a>
                              </td>
                              <td class="project_progress">
                                 <a>{{$projet->dependance}}</a>
                              </td>
                              <td>
                               <a>{{$projet->datefin}}</a>
                              </td>
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
    

@endsection           