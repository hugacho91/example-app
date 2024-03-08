@extends('tablar::page')

@section('title', 'Ver Expediente')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Ver
                    </div>
                    <h2 class="page-title">
                        {{ __('Expediente ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('expedientes.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Listado de Expedientes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalles</h3>
                        </div>
                        <div class="card-body">
                            
<div class="form-group">
<strong>Número Expediente:</strong>
{{ $expediente->numero_expediente }}
</div>
<div class="form-group">
<strong>Fecha de Entrada:</strong>
{{ $expediente->fecha_entrada }}
</div>
<div class="form-group">
<strong>Iniciador:</strong>
{{ $expediente->iniciador }}
</div>
<div class="form-group">
<strong>Extracto:</strong>
{{ $expediente->extracto}}
</div>
<div class="form-group">
<strong>Antecedentes:</strong>
{{ $expediente->cuit_empleado }}
</div>
<div class="form-group">
<strong>Agregados:</strong>
{{ $expediente->agregados }}
</div>


                        </div>
                    </div>
                </div>
            </div>
            <br>
            @if ($expediente->archivos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ruta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expediente->archivos as $archivo)
                                <tr id="archivo-{{ $archivo->id }}">
                                    <td>{{ $archivo->nombre }}</td>
                                    <td>{{ $archivo->ruta }}</td>
                                     <td>
                                        <a href="{{ route('archivos.ver', $archivo->id) }}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('archivos.descargar', $archivo->id) }}" target="_blank" class="btn btn-success btn-sm">Descargar</a>
                                        <button class="btn btn-danger btn-sm delete-file" data-id="{{ $archivo->id }}">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No se encontraron archivos relacionados.</p>
            @endif

        </div>

    </div>

    <!-- Agrega el script JavaScript -->
    <script>
       $(document).ready(function() {
            // Maneja el evento de clic en el botón "Eliminar"
            $('.delete-file').click(function() {
                var archivoId = $(this).data('id');
                var confirmacion = confirm('¿Estás seguro de que deseas eliminar este archivo?');
                if (confirmacion) {
                    $.ajax({
                        url: "{{ route('archivos.eliminar', ':id') }}".replace(':id', archivoId),
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                // Elimina la fila de archivo correspondiente de la tabla
                                $('#archivo-' + archivoId).remove();
                                //alert('Archivo eliminado correctamente.');
                            } else {
                                alert('Error al eliminar el archivo.');
                            }
                        },
                        error: function(xhr) {
                            alert('Se produjo un error al eliminar el archivo.');
                        }
                    });
                }
            });
        });

    </script>
    

@endsection


