@extends('adminlte::page')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Usuarios</h4>
                    <!--<h3 class="box-title">Gráfico de Barras (Usuarios)</h3>-->
                </div>
                <div class="box-body">
                    <canvas id="usuariosBarChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h4 class="box-title">Expedientes</h4>
                    <!--<h3 class="box-title">Gráfico de Líneas (Expedientes)</h3>-->
                </div>
                <div class="box-body">
                    <canvas id="expedientesLineChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">Instituciones</h4>
                    <!--<h3 class="box-title">Gráfico de Radar (Instituciones)</h3>-->
                </div>
                <div class="box-body">
                    <canvas id="institucionesRadarChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">Solución de Fallas</h4>
                    <!--<h3 class="box-title">Gráfico de Pastel (Solución Fallas)</h3>-->
                </div>
                <div class="box-body">
                    <canvas id="solucionFallasPieChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(function () {
            // Datos de ejemplo para el gráfico de barras (Usuarios)
            var usuariosBarData = {
                labels: ['Administrador', 'Asesor', 'Editor','Letrado'],
                datasets: [
                    {
                        label: 'Cantidad de Usuarios',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [10,5,8,3],
                    },
                ],
            };

            // Configuración del gráfico de barras (Usuarios)
            var usuariosBarOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
            };

            // Crear el gráfico de barras (Usuarios)
            var usuariosBarChartCanvas = $('#usuariosBarChart').get(0).getContext('2d');
            new Chart(usuariosBarChartCanvas, {
                type: 'bar',
                data: usuariosBarData,
                options: usuariosBarOptions,
            });

            // Datos de ejemplo para el gráfico de líneas (Expedientes)
            var expedientesLineData = {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [
                    {
                        label: 'Cantidad de Expedientes',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [15, 20, 12, 18, 25, 30, 22, 28, 35, 40, 32, 38],
                    },
                ],
            };

            // Configuración del gráfico de líneas (Expedientes)
            var expedientesLineOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
            };

            // Crear el gráfico de líneas (Expedientes)
            var expedientesLineChartCanvas = $('#expedientesLineChart').get(0).getContext('2d');
            new Chart(expedientesLineChartCanvas, {
                type: 'line',
                data: expedientesLineData,
                options: expedientesLineOptions,
            });

            // Datos de ejemplo para el gráfico de radar (Instituciones)
            var institucionesRadarData = {
                labels: ['Institución A', 'Institución B', 'Institución C', 'Institución D', 'Institución E'],
                datasets: [
                    {
                        label: 'Cantidad de Instituciones',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [8, 5, 10, 7, 12],
                    },
                ],
            };

            // Configuración del gráfico de radar (Instituciones)
            var institucionesRadarOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
            };

            // Crear el gráfico de radar (Instituciones)
            var institucionesRadarChartCanvas = $('#institucionesRadarChart').get(0).getContext('2d');
            new Chart(institucionesRadarChartCanvas, {
                type: 'radar',
                data: institucionesRadarData,
                options: institucionesRadarOptions,
            });

            // Datos de ejemplo para el gráfico de pastel (Solución Fallas)
            var solucionFallasPieData = {
                labels: ['Solución A', 'Solución B', 'Solución C', 'Solución D', 'Solución E'],
                datasets: [
                    {
                        data: [30, 15, 20, 25, 10],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                        ],
                    },
                ],
            };

            // Configuración del gráfico de pastel (Solución Fallas)
            var solucionFallasPieOptions = {
                responsive: true,
                maintainAspectRatio: false,
            };

            // Crear el gráfico de pastel (Solución Fallas)
            var solucionFallasPieChartCanvas = $('#solucionFallasPieChart').get(0).getContext('2d');
            new Chart(solucionFallasPieChartCanvas, {
                type: 'pie',
                data: solucionFallasPieData,
                options: solucionFallasPieOptions,
            });
        });
    </script>
@stop

