<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Administration</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset("images/fevicon.png")}}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset("css/style.css")}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset("css/responsive.css")}}" />
      <!-- color css -->
      <!-- <link rel="stylesheet" href="css/colors.css" /> -->
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset("css/bootstrap-select.css")}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset("css/perfect-scrollbar.css")}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset("css/custom.css")}}" />
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{asset("img/user.png")}}" alt="#" /></a>
                     </div>
                  </div>
                     <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                           <div class="user_img"><img class="img-responsive" src="{{asset("img/user.png")}}" alt="#" /></div>
                           <div class="user_info">
                              <h6>{{session()->get('nomAdmin')}}</h6>
                              <p><span class="online_animation"></span> Online</p>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Menu</h4>
                  <ul class="list-unstyled components">  
                     {{-- <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user yellow_color"></i> <span>Intervenant</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="{{route('ajoutIntervenant')}}">> <span>Ajout intervenant</span></a></li>
                           <li><a href="{{route('listeIntervenant')}}">> <span>Table intervenant</span></a></li>
                        </ul>
                     </li>
                     <li><a href="{{route('typeIncident')}}"><i class="fa fa-flash red_color"></i> <span>Type d'incident</span></a></li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-flash red_color"></i> <span>Incident</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="ajoutIncident">> <span>Ajout incident</span></a></li>
                           <li><a href="tableIncident">> <span>Table incident</span></a></li>
                        </ul>
                     </li> --}}
                     <li><a href="{{route('listeIntervenant')}}"><i class="fa fa-user yellow_color"></i> <span>Intervenants</span></a></li>
                     <li><a href="{{route('tableIncident')}}"><i class="fa fa-flash red_color"></i> <span>Incidents</span></a></li>
                     <li><a href="{{route('projet.liste')}}"><i class="fa fa-folder-o blue2_color"></i> <span>Projets</span></a></li>
                     <li><a href="{{route('archive.liste')}}"><i class="fa fa-archive yellow_color" ></i> <span>Archives</span></a></li>
                     <li><a href="{{route('typeIncident')}}"><i class="fa fa-plus-square orange_color"></i> <span>Type d'incident</span></a></li>
                     <li><a href="{{route('deroulement')}}"><i class="fa fa-table purple_color2"></i> <span>Deroulement de projet</span></a></li>

                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="/"></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset("img/user.png")}}" alt="#" /><span class="name_user">{{session()->get('nomAdmin')}}</span></a>
                                    <div class="dropdown-menu">
                                       {{-- <a class="dropdown-item" href="">Mon Profile</a> --}}
                                       <a class="dropdown-item" href="{{route('deconnexion')}}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

               <!-- dashboard inner -->

               @yield('content')
            
               <!-- end dashboard inner -->
         
               
      <!-- jQuery -->
      <script src="{{asset("js/jquery.min.js")}}"></script>
      <script src="{{asset("js/popper.min.js")}}"></script>
      <script src="{{asset("js/bootstrap.min.js")}}"></script>
      <!-- wow animation -->
      <script src="{{asset("js/animate.js")}}"></script>
      <!-- select country -->
      <script src="{{asset("js/bootstrap-select.js")}}"></script>
      <!-- owl carousel -->
      <script src="{{asset("js/owl.carousel.js")}}"></script> 
      <!-- chart js -->
      <script src="{{asset("js/Chart.min.js")}}"></script>
      <script src="{{asset("js/Chart.bundle.min.js")}}"></script>
      <script src="{{asset("js/utils.js")}}"></script>
      <script src="{{asset("js/analyser.js")}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset("js/perfect-scrollbar.min.js")}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <!-- custom js -->
      <script src="{{asset("js/custom.js")}}"></script>
   </body>
</html>