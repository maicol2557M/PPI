<!--
* Copyright 2018 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>RESPONSABLES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.nav')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Responsable<small></small></h1>
            </div>
        </div>

        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/user04.png')}}" alt="user" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Conoce a los profesionales clave que garantizan el éxito de nuestros servicios. Su compromiso con la
                    excelencia y la
                    ética profesional es el pilar sobre el que se construye la confianza que nuestros clientes depositan
                    en nosotros.
                </div>
            </div>
        </div>
        <hr>
        <div style="width: 1230px; height: 160px;">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <div>
                        <button class="btn-small" onclick="openModal()">Nuevo cliente</button>
                        <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-pdf?type=responsables'">
                            <i class="zmdi zmdi-file-text"></i> PDF
                        </button>
                        <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-csv?type=responsables'">
                            <i class="zmdi zmdi-collection-text"></i> CSV
                        </button>
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
            <table class="table table-striped" border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Área</th>
                        <th>Contacto</th>
                        <th style="text-align: center;">Acción</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Las filas se llenarán dinámicamente por JS -->
                </tbody>
            </table>
        </div>
        <div id="userModal" class="modal-personal">
            <div class="modal-content">
                <button class="modal-close" onclick="closeModal()">X</button>
                <form id="userForm">
                    <div id="error" class="error"></div>
                    <label for="numero">Cédula:</label><br>
                    <input class="input" type="text" id="numero" name="cedula" required><br><br>
                    <label for="nombre">Nombres:</label><br>
                    <input class="input" type="text" id="nombre" name="nombre" required><br><br>
                    <label for="area">Área:</label><br>
                    <input class="input" type="text" id="area" name="area" required><br><br>
                    <label for="contacto">Contacto:</label><br>
                    <input class="input" type="text" id="contacto" name="contacto" required><br><br>
                    <button type="submit">Guardar</button>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias
                        ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam
                        ipsa accusamus error. Animi mollitia corporis iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    @include('layouts.script')
</body>

</html>
