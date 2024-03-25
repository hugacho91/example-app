@extends('tablar::page')


@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Expedientes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="expedientesTable">
                            <thead>
                                <tr>
                                    <th>Número Expediente</th>
                                    <th>Fecha Entrada</th>
                                    <th>Iniciador</th>
                                    <th>Contraparte</th>
                                    <th>Delegación</th>
                                    <th>Sección</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expedientes as $expediente)
                                <tr data-url="{{ route('expedientes.edit', $expediente->id) }}">
                                    <td>{{ $expediente->numero_expediente }}</td>
                                    <td>{{ $expediente->fecha_entrada }}</td>
                                    <td>{{ $expediente->iniciador }}</td>
                                    <td>{{ $expediente->contraparte }}</td>
                                    <td>{{ $expediente->delegacione ? $expediente->delegacione->nombre : '' }}</td>
                                    <td>{{ $expediente->seccione ? $expediente->seccione->nombre : '' }}</td>
                                    <td>{{ $expediente->estado }}</td>
                                    <td>{{ $expediente->user ? $expediente->user->name : '' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer">
                    {!! $expedientes->links('tablar::pagination') !!}
                </div>
            </div>
        </div>
    </div>

    <br><br>

<div class="row">
    <div class="col-md-6">
                <div class="box box-info p-4"> <!-- Agregado p-4 para el relleno -->
                    <div class="box-header with-border">
                        <h4 class="box-title" id="expedientesTitle">Expedientes Año</h4>
                    </div>
                    <div class="box-body">
                        <canvas id="expedientesLineChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
        <div class="box box-warning p-4">
            <div class="box-header with-border">
                <h4 class="box-title">Motivo de Expedientes</h4>
            </div>
            <div class="box-body">
                <canvas id="motivoPieChart" style="height:230px"></canvas>
            </div>
        </div>
    </div>

       

        
            
        
    </div>
    <br><br>
    <div class="row">
        <!--<div class="col-md-6">
            <div class="box box-success p-4"> 
                <div class="box-header with-border">
                    <h4 class="box-title">Instituciones</h4>
                </div>
                <div class="box-body">
                    <canvas id="institucionesRadarChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>-->

        <div class="col-md-6">
            <div class="box box-primary p-4">
                <div class="box-header with-border">
                    <h4 class="box-title">Expedientes por Estado</h4>
                </div>
                <div class="box-body">
                    <canvas id="expedientesEstadoBarChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop



@section('js')
    <!-- Asegúrate de que jQuery esté cargado -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Asegúrate de que Chart.js esté cargado -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Agrega este script en tu HTML para incluir el plugin chartjs-plugin-datalabels -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    $(document).ready(function() {
        $('#expedientesTable tbody tr').click(function() {
            var href = $(this).find('a').attr('href');
            if (href) {
                window.location = href;
            }
        });

        $('#expedientesTable tbody tr').css('cursor', 'pointer');
    });
</script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var rows = document.querySelectorAll("#expedientesTable tbody tr");
        rows.forEach(function(row) {
            row.addEventListener("click", function() {
                var url = this.getAttribute("data-url");
                window.location.href = url;
            });
        });
    });
    </script>

    <script>
        $(function () {
            // Datos de ejemplo para el gráfico de barras (Usuarios)
           // Obtener los datos para el gráfico de expedientes por estado
           var expedientesEstadoData = {
        labels: {!! $expedientesPorEstado->pluck('estado')->toJson() !!},
        datasets: [
            {
                label: 'Cantidad de Expedientes por Estado',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: {!! $expedientesPorEstado->pluck('total')->toJson() !!},
            },
        ],
    };

    var expedientesEstadoOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
    };

    var expedientesEstadoChartCanvas = $('#expedientesEstadoBarChart').get(0).getContext('2d');
    new Chart(expedientesEstadoChartCanvas, {
        type: 'bar',
        data: expedientesEstadoData,
        options: expedientesEstadoOptions,
    });


            // Datos de ejemplo para el gráfico de radar (Instituciones)
           /* var institucionesRadarData = {
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
            });*/

            // Obtener los datos de los expedientes por motivo desde el controlador
// Obtener los datos de los expedientes por motivo desde el controlador
var expedientesPorMotivo = {!! json_encode($expedientesPorMotivo) !!};

// Mapear los datos para obtener las etiquetas con motivo y cantidad
var labels = expedientesPorMotivo.map(function(motivo) {
    return `${motivo.motivo} (${motivo.total})`;
});

// Configuración del gráfico de pastel (Motivo)
var motivoPieData = {
    labels: labels,
    datasets: [
        {
            data: expedientesPorMotivo.map(motivo => motivo.total),
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                // Agrega más colores si es necesario
            ],
        },
    ],
};

// Configuración del gráfico de pastel (Motivo)
var motivoPieOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        datalabels: {
            color: '#fff',
            formatter: function(value, context) {
                return value; // Mostrar el valor de los datos
            }
        }
    }
};

// Crear el gráfico de pastel (Motivo)
var motivoPieChartCanvas = $('#motivoPieChart').get(0).getContext('2d');
new Chart(motivoPieChartCanvas, {
    type: 'pie',
    data: motivoPieData,
    options: motivoPieOptions,
});
            // Obtener el año actual
var currentYear = new Date().getFullYear();

// Concatenar el año actual al título del gráfico
document.getElementById('expedientesTitle').innerText = 'Expedientes ' + currentYear;


          // Mapear números de mes a nombres de mes
const meses = {
    1: 'Enero',
    2: 'Febrero',
    3: 'Marzo',
    4: 'Abril',
    5: 'Mayo',
    6: 'Junio',
    7: 'Julio',
    8: 'Agosto',
    9: 'Septiembre',
    10: 'Octubre',
    11: 'Noviembre',
    12: 'Diciembre',
};

// Obtener los datos para el gráfico de líneas (Expedientes)
var expedientesPorMes = {!! json_encode($expedientesPorMes) !!};

// Mapear los datos para obtener la cantidad de expedientes por mes
var expedientesPorMesArray = Object.keys(expedientesPorMes).map(function(mesNumero) {
    return expedientesPorMes[mesNumero];
});

// Obtener las etiquetas (labels) para el gráfico de líneas (Expedientes)
var labels = Object.keys(expedientesPorMes).map(function(mesNumero) {
    return meses[mesNumero];
});

// Configuración del gráfico de líneas (Expedientes)
var expedientesLineData = {
    labels: labels,
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
            data: expedientesPorMesArray,
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

        });
    </script>
@stop
