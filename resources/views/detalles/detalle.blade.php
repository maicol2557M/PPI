<!--
* Copyright 2018 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Detalles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.nav')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Planeación Fiscal Estratégica<small></small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
            </ul>
        </div>
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{asset('assets/img/category.png')}}" alt="user" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevas clientes en el proceso planeación Fiscal Estratégica,
                    debes de llenar el siguiente formulario para registrar un nuevo cliente.
                </div>
            </div>
        </div>
        <hr>
        <div style="width: 1230px; height: 160px;">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <div style="text-align: left">
                        <button class="btn-small" onclick="openModal()">Nuevo cliente</button>
                        <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-pdf?type=detalles'">
                            <i class="zmdi zmdi-file-text"></i> PDF
                        </button>
                        <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-csv?type=detalles'">
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
                        <form  role="search" style="text-align: right;">
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
                        <th>Cedula del responsables</th>
                        <th>id proceso</th>
                        <th>observacion</th>
                        <th style="text-align: center;">accion</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <tr>
                        <td>1</td>
                        <td>0912345678</td>
                        <td>101</td>
                        <td>Presentar informe técnico en la próxima audiencia.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>0919876543</td>
                        <td>102</td>
                        <td>Cliente solicitó prórroga para el trámite tributario.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>0912468102</td>
                        <td>103</td>
                        <td>Revisión pendiente de acta judicial emitida el 2025-01-10.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>0911122334</td>
                        <td>104</td>
                        <td>Registrar documentos adicionales solicitados por el juez.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>0915566778</td>
                        <td>105</td>
                        <td>Confirmar asistencia a la audiencia programada.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>0923456789</td>
                        <td>106</td>
                        <td>Revisar documentación fiscal para el próximo mes.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>0934567890</td>
                        <td>107</td>
                        <td>Preparar declaración de impuestos anual.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>0945678901</td>
                        <td>108</td>
                        <td>Analizar viabilidad de recurso de apelación.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>0956789012</td>
                        <td>109</td>
                        <td>Coordinar reunión con el cliente para revisar avances.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>0967890123</td>
                        <td>110</td>
                        <td>Finalizar preparación de argumentos legales.</td>
                        <td class="table-cell action-buttons">
                            <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                            <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                        </td>
                    </tr>
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
                <button class="modal-close" onclick="closeModal()">X</button>
                <form id="userForm">
                    <div id="error" class="error"></div>

                    <label for="nombre">Cedula del Responsables</label><br>
                    <input class="input" type="number" id="cedula" name="nombre" required><br><br>

                    <label for="email">identificador del proceso:</label><br>
                    <input class="input" type="number" id="identificador" name="email" required><br><br>

                    <label for="cedula">Observacion:</label><br>
                    <input class="input" type="text" id="observacion" name="cedula" required><br><br>

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
