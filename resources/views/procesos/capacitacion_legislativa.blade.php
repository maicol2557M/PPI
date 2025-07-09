<!--
* Copyright 2018 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Capacitacion en legislacion tributaria</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css')}}">
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.nav')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Capacitacion en legislacion tributaria<small></small></h1>
            </div>
        </div>
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/user04.png')}}" alt="user" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead" style="text-align: center;">
                    Bienvenido a la sección donde se encuentra el listado de clientes. Puedes actualizar o
                    eliminar los datos del cliente, <br>
                    si hay procesos asociados al cliente no podrás eliminarlo.
                </div>
            </div>
        </div>
        <hr>
        <div style="width: 1230px; height: 160px;">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <div>
                        <button class="btn-small" onclick="openModal()">Nuevo cliente</button>
                    </div>
                    <br>
                    <div class="col-xs-12 lead">
                        <select id="rowLimit" class=" letra-selec" onchange="showRows(); updateRowsPerPage()">
                            <option value="all">Todas</option>
                            <option value="5">Mostrar 5 filas</option>
                            <option value="10">Mostrar 10 filas</option>
                            <option value="15">Mostrar 15 filas</option>
                            <option value="20">Mostrar 20 filas</option>
                        </select>
                        <form role="search" style="text-align: right;">
                            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchTable()">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
            </nav>
        </div>
        <div class="container-fluid ">
            <table class="table table-striped" border="1" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Control de Activos</th>
                        <th>Fecha de Adquisición</th>
                        <th>Depreciación</th>
                        <th>Fecha Último Mantenimiento</th>
                        <th>Fecha Próximo Mantenimiento</th>
                        <th>Proveedor Mantenimiento</th>
                        <th>Valor Mantenimiento</th>
                        <th>ID Tipo</th>
                        <th>ID Cédula</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Las filas se llenarán dinámicamente por JS -->
                </tbody>
            </table>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="pagination">
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage('prev')">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(1)">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(2)">2</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage(3)">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" onclick="changePage('next')">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="userModal" class="modal">
            <div class="modal-content">

                <form id="userForm">
                    <div id="error" class="error"></div>
                    <label for="control_activos">Control de Activos:</label><br>
                    <input class="input" type="text" id="control_activos" name="control_activos"><br><br>
                    <label for="fecha_adquisicion">Fecha de Adquisición:</label><br>
                    <input class="input" type="date" id="fecha_adquisicion" name="fecha_adquisicion"><br><br>
                    <label for="depreciacion">Depreciación:</label><br>
                    <input class="input" type="number" id="depreciacion" name="depreciacion"><br><br>
                    <label for="fecha_ultimo_mantenimiento">Fecha Último Mantenimiento:</label><br>
                    <input class="input" type="date" id="fecha_ultimo_mantenimiento" name="fecha_ultimo_mantenimiento"><br><br>
                    <label for="fecha_proximo_mantenimiento">Fecha Próximo Mantenimiento:</label><br>
                    <input class="input" type="date" id="fecha_proximo_mantenimiento" name="fecha_proximo_mantenimiento"><br><br>
                    <label for="proveedor_mantenimiento">Proveedor Mantenimiento:</label><br>
                    <input class="input" type="text" id="proveedor_mantenimiento" name="proveedor_mantenimiento"><br><br>
                    <label for="valor_mantenimiento">Valor Mantenimiento:</label><br>
                    <input class="input" type="number" id="valor_mantenimiento" name="valor_mantenimiento"><br><br>
                    <label for="id_tipos">ID Tipo:</label><br>
                    <input class="input" type="number" id="id_tipos" name="id_tipos"><br><br>
                    <label for="id_cedula">ID Cédula:</label><br>
                    <input class="input" type="number" id="id_cedula" name="id_cedula"><br><br>
                    <button type="submit">Guardar</button>
                    <button class="modal-close" onclick="closeModal()">X</button>
                </form>
            </div>
        </div>
        <div id="alertModal" class="alert-modal">
            <div class="alert-content">
                <p id="alertMessage">¿Está seguro?</p>
                <div class="alert-buttons">
                    <button id="alertConfirm">Sí</button>
                    <button onclick="closeAlert()">No</button>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>
