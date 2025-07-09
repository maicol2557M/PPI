<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        .summary {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Generado el: {{ date('d/m/Y H:i:s') }}</p>
        <p>Total de registros: {{ count($data) }}</p>
    </div>

    @if($title == 'Reporte de Usuarios')
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todos los usuarios registrados en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Cédula</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                <tr>
                    <td>{{ $user->id_cedula }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->direccion_domicilio }}</td>
                    <td>{{ $user->numero_telefonico }}</td>
                    <td>{{ $user->correo_electronico }}</td>
                    <td>{{ $user->tipo->nombre_tipos ?? 'Sin tipo' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($title == 'Reporte de Procesos')
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todos los procesos registrados en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Control Activos</th>
                    <th>Fecha Adquisición</th>
                    <th>Depreciación</th>
                    <th>Proveedor</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $proceso)
                <tr>
                    <td>{{ $proceso->id_procesos }}</td>
                    <td>{{ $proceso->control_activos }}</td>
                    <td>{{ $proceso->fecha_adquisicion }}</td>
                    <td>{{ $proceso->depreciacion }}</td>
                    <td>{{ $proceso->proveedor_mantenimiento }}</td>
                    <td>${{ number_format($proceso->valor_mantenimiento, 2) }}</td>
                    <td>{{ $proceso->tipo->nombre_tipos ?? 'Sin tipo' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($title == 'Reporte de Responsables')
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todos los responsables registrados en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Administrador</th>
                    <th>ID Cédula</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $responsable)
                <tr>
                    <td>{{ $responsable->id_responsables }}</td>
                    <td>{{ $responsable->administrador ? 'Sí' : 'No' }}</td>
                    <td>{{ $responsable->id_cedula }}</td>
                    <td>{{ $responsable->usuario->nombre ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($title == 'Reporte de Personal')
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todo el personal administrativo registrado en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $personal)
                <tr>
                    <td>{{ $personal->id_personal }}</td>
                    <td>{{ $personal->cedula }}</td>
                    <td>{{ $personal->nombres }}</td>
                    <td>{{ $personal->apellidos }}</td>
                    <td>{{ $personal->telefono }}</td>
                    <td>{{ $personal->cargo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($title == 'Reporte de Detalles')
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todos los detalles registrados en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Responsable</th>
                    <th>Responsable</th>
                    <th>ID Proceso</th>
                    <th>Proceso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $detalle)
                <tr>
                    <td>{{ $detalle->id_detalles }}</td>
                    <td>{{ $detalle->id_responsables }}</td>
                    <td>{{ $detalle->responsable->usuario->nombre ?? '' }}</td>
                    <td>{{ $detalle->id_procesos }}</td>
                    <td>{{ $detalle->proceso->control_activos ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(Str::startsWith($type ?? '', ['asesoria_derecho','auditoria_fiscal','capacitacion_legislativa','consulta_juridica_empresarial','consulta_tributaria','defensa_fiscal','planeacion_fiscal','regulacion_fiscal']))
        <div class="summary">
            <strong>Resumen:</strong> Este reporte muestra todos los procesos del tipo correspondiente registrados en el sistema.
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Control Activos</th>
                    <th>Fecha Adquisición</th>
                    <th>Depreciación</th>
                    <th>Proveedor</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $proceso)
                <tr>
                    <td>{{ $proceso->id_procesos }}</td>
                    <td>{{ $proceso->control_activos }}</td>
                    <td>{{ $proceso->fecha_adquisicion }}</td>
                    <td>{{ $proceso->depreciacion }}</td>
                    <td>{{ $proceso->proveedor_mantenimiento }}</td>
                    <td>${{ number_format($proceso->valor_mantenimiento, 2) }}</td>
                    <td>{{ $proceso->tipo->nombre_tipos ?? 'Sin tipo' }}</td>
                    <td>{{ $proceso->usuario->nombre ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="footer">
        <p>Reporte generado automáticamente por el sistema</p>
        <p>Página 1 de 1</p>
    </div>
</body>
</html>
