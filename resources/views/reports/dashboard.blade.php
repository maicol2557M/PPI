@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Dashboard de Reportes</h1>
        </div>
    </div>

    <!-- Estadísticas principales -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Usuarios</h5>
                    <h2>{{ $statistics['total_usuarios'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Procesos</h5>
                    <h2>{{ $statistics['total_procesos'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Responsables</h5>
                    <h2>{{ $statistics['total_responsables'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Personal</h5>
                    <h2>{{ $statistics['total_personal'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas financieras -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Estadísticas Financieras</h5>
                </div>
                <div class="card-body">
                    <p><strong>Valor Promedio de Mantenimiento:</strong> ${{ number_format($statistics['avg_valor_mantenimiento'], 2) }}</p>
                    <p><strong>Valor Total de Mantenimiento:</strong> ${{ number_format($statistics['sum_valor_mantenimiento'], 2) }}</p>
                    <p><strong>Procesos Recientes (30 días):</strong> {{ $statistics['procesos_recientes'] }}</p>
                    <p><strong>Administradores:</strong> {{ $statistics['administradores'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Acciones de Reportes</h5>
                </div>
                <div class="card-body">
                    <div class="btn-group-vertical w-100">
                        <button class="btn btn-primary mb-2" onclick="generateReport('usuarios')">Generar Reporte Usuarios</button>
                        <button class="btn btn-success mb-2" onclick="generateReport('procesos')">Generar Reporte Procesos</button>
                        <button class="btn btn-warning mb-2" onclick="generateReport('responsables')">Generar Reporte Responsables</button>
                        <button class="btn btn-info mb-2" onclick="generateReport('personal')">Generar Reporte Personal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos y tablas -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Procesos por Tipo</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistics['procesos_por_tipo'] as $proceso)
                            <tr>
                                <td>{{ $proceso->tipo->nombre_tipos ?? 'Sin tipo' }}</td>
                                <td>{{ $proceso->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Usuarios por Tipo</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($statistics['usuarios_por_tipo'] as $usuario)
                            <tr>
                                <td>{{ $usuario->tipo->nombre_tipos ?? 'Sin tipo' }}</td>
                                <td>{{ $usuario->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function generateReport(type) {
    fetch(`/api/reports/generate?type=${type}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`Reporte de ${type} generado exitosamente`);
            } else {
                alert('Error al generar reporte');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al generar reporte');
        });
}
</script>
@endsection 