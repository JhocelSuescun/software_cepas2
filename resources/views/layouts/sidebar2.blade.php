<div class="sidebar" >
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a class="simple-text logo-mini">
                    
                </a>
                <a class="simple-text logo-normal">
                    Majumba
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset (Auth::user()->imagen)}}" />
                    </div>
                    <div class="info">
                        <a href="{{ url('admin/datos_personales') }}">
                            <span>
                                {{ Auth::user()->name}}
                                
                            </span>
                            
                        </a>
                        
                    </div>
                </div>
                <ul class="nav">
                   
                    <li>
                        <a href="{{ url('admin/caracteristicas') }}">
                            <i class="material-icons">bubble_chart</i>
                            <p> Caracteristicas </p>
                        </a>
                    </li>
                     <li>
                        <a href="{{ url('admin/cepa') }}">
                            <i class="material-icons">bug_report</i>
                            <p> Cepas </p>
                        </a>
                    </li>
                     <li>
                        <a href="{{ url('admin/proyectos') }}">
                            <i class="material-icons">business</i>
                            <p> Proyectos </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/investigadores') }}">
                            <i class="material-icons">supervisor_account</i>
                            <p> Investigadores </p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#acontecimiento">
                            <i class="material-icons">developer_board</i>
                            <p> Acontecimiento
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="acontecimiento">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('admin/noticias') }}">
                                        <span class="sidebar-mini"> N </span>
                                        <span class="sidebar-normal"> Noticia </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> A </span>
                                        <span class="sidebar-normal"> Actividad </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/novedades') }}">
                                        <span class="sidebar-mini"> No </span>
                                        <span class="sidebar-normal"> Novedad </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                       <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">cancel</i>
                            <p> Cerrar Sesión </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                    
                </ul>
            </div>
        </div>