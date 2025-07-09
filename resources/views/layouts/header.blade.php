<div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile nav-lateral-scroll">
            <div class="logo full-reset all-tittles">
                inicio
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="{{asset('assets/icons/logo asesoro mediano.webp')}}" alt="Biblioteca"
                        class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">Estudio Juridico Tributario</p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="{{route('inicio')}}"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Prosesos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="{{route('asesoria')}}"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Asesoria en derecho Tributario</a></li>
                            <li><a href="{{route('consulta_juridica_empresarial')}}"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Consultoria juridica empresarial</a></li>
                            <li><a href="{{route('planeacion')}}"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Planeacion fiscal</a></li>
                            <li><a href="{{route('defensa')}}"><i class="zmdi zmdi-shield-security zmdi-hc-fw"></i>&nbsp;&nbsp; Defensa fiscal y represntacion juridica</a></li>
                            <li><a href="{{route('auditoria')}}"><i class="zmdi zmdi-search-in-file zmdi-hc-fw"></i>&nbsp;&nbsp; Auditroria fiscal preventica trubutaria</a></li>
                            <li><a href="{{route('consulta_tributaria')}}"><i class="zmdi zmdi-comment-text-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Consultoria en trubutacion internacional</a></li>
                            <li><a href="{{route('capacitacion')}}"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Capacitacion en legislacion tributaria</a></li>
                            <li><a href="{{route('regulacion')}}"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i>&nbsp;&nbsp; Regularizacion fiscal</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp;Registro de usuarios <i
                            class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="{{route('usuario')}}"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Usuarios</a></li>
                            <li><a href="{{route('personal')}}"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Personal administrativo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-box zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Responsables <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="{{route('responsables')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Responsables</a></li>
                        </ul>

                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Detalles<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="{{route('detalle')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Detalles</a></li>
                        </ul>
                    </li>
                    <!--<li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Préstamos y reservaciones <i
                                class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.html"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los
                                    préstamos</a></li>
                            <li>
                                <a href="loanpending.html"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Devoluciones pendientes <span
                                        class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                            <li>
                                <a href="loanreservation.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp;
                                    Reservaciones <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                        </ul>
                    </li>
                                            <li><a href="{{ route('reports.dashboard') }}"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y
                            estadísticas</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power"></i>&nbsp;&nbsp; Cerrar Sesión
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp;
                            Configuraciones avanzadas</a></li>-->
                </ul>
            </div>
        </div>
    </div>
