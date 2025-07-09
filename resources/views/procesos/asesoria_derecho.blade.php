<!DOCTYPE html>
<html lang="es">

<head>
    <title>Asesoría en Derecho Tributario</title>
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
                    <h1 class="all-tittles">Asesoría en Derecho Tributario<small></small></h1>
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
                            <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-pdf?type=asesoria_derecho'">
                                <i class="zmdi zmdi-file-text"></i> PDF
                            </button>
                            <button class="btn-small" style="margin-left: 8px;" onclick="window.location.href='/reports/export-csv?type=asesoria_derecho'">
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
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo electrónico</th>
                            <th>Número de proceso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <tr>
                            <td>1</td>
                            <td>0756855615</td>
                            <td>Eduardo Mendoza</td>
                            <td>Calle 25 de junio #123</td>
                            <td>0961488328</td>
                            <td>eduardo.mendoza@gmail.com</td>
                            <td>1001</td>
                            <td>Activo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>0998346752</td>
                            <td>Juan Pérez</td>
                            <td>Avenida Quito 45</td>
                            <td>0967362845</td>
                            <td>juan.perez@gmail.com</td>
                            <td>1002</td>
                            <td>Inactivo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>0912345678</td>
                            <td>María González</td>
                            <td>Av. Amazonas 789</td>
                            <td>0987654321</td>
                            <td>maria.gonzalez@gmail.com</td>
                            <td>1003</td>
                            <td>Activo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>0923456789</td>
                            <td>Carlos Rodríguez</td>
                            <td>Calle Guayaquil 456</td>
                            <td>0976543210</td>
                            <td>carlos.rodriguez@gmail.com</td>
                            <td>1004</td>
                            <td>Pendiente</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>0934567890</td>
                            <td>Ana López</td>
                            <td>Av. 6 de Diciembre 321</td>
                            <td>0965432109</td>
                            <td>ana.lopez@gmail.com</td>
                            <td>1005</td>
                            <td>Finalizado</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>0945678901</td>
                            <td>Roberto Silva</td>
                            <td>Calle Ambato 654</td>
                            <td>0954321098</td>
                            <td>roberto.silva@gmail.com</td>
                            <td>1006</td>
                            <td>Activo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>0956789012</td>
                            <td>Patricia Torres</td>
                            <td>Av. Los Shyris 987</td>
                            <td>0943210987</td>
                            <td>patricia.torres@gmail.com</td>
                            <td>1007</td>
                            <td>Inactivo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>0967890123</td>
                            <td>Fernando Herrera</td>
                            <td>Calle Mera 147</td>
                            <td>0932109876</td>
                            <td>fernando.herrera@gmail.com</td>
                            <td>1008</td>
                            <td>Pendiente</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>0978901234</td>
                            <td>Carmen Vega</td>
                            <td>Av. 10 de Agosto 258</td>
                            <td>0921098765</td>
                            <td>carmen.vega@gmail.com</td>
                            <td>1009</td>
                            <td>Activo</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>0989012345</td>
                            <td>Luis Morales</td>
                            <td>Calle Rocafuerte 369</td>
                            <td>0910987654</td>
                            <td>luis.morales@gmail.com</td>
                            <td>1010</td>
                            <td>Finalizado</td>
                            <td class="action-buttons">
                                <button class="btn btn-success" onclick="confirmAction('edit', this)">Editar</button>
                                <button class="btn btn-danger" onclick="confirmAction('delete', this)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="pagination">
                            <li class="page-item"><a class="page-link" href="#" onclick="changePage('prev')">Previous</a></li>
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

                    <form id="userForm" action="#">
                        <div id="error" class="error"></div>

                        <label for="cedula">Cédula:</label><br>
                        <input class="input" type="text" id="cedula" name="cedula" required><br><br>

                        <label for="nombre">Nombre:</label><br>
                        <input class="input" type="text" id="nombre" name="nombre" required><br><br>

                        <label for="direccion">Dirección:</label><br>
                        <input class="input" type="text" id="direccion" name="direccion" required><br><br>

                        <label for="telefono">Teléfono:</label><br>
                        <input class="input" type="text" id="telefono" name="telefono" required><br><br>

                        <label for="email">Correo electrónico:</label><br>
                        <input class="input" type="email" id="email" name="email" required><br><br>

                        <label for="numero_proceso">Número de proceso:</label><br>
                        <input class="input" type="text" id="numero_proceso" name="numero_proceso" required><br><br>

                        <label for="estado">Estado:</label><br>
                        <select class="input" id="estado" name="estado" required>
                            <option value="">Seleccione...</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Finalizado">Finalizado</option>
                        </select><br><br>

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
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui
                            molestias
                            ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam
                            veniam
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
