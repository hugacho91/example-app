@extends('tablar::page')

@section('title', 'Ver Expediente')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
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
<strong>Fecha:</strong>
{{ $expediente->fecha }}
</div>
<div class="form-group">
<strong>Fecha Cierre:</strong>
{{ $expediente->fecha_cierre }}
</div>
<div class="form-group">
<strong>Empleador:</strong>
{{ $expediente->empleador }}
</div>
<div class="form-group">
<strong>Empleado:</strong>
{{ $expediente->empleado }}
</div>
<div class="form-group">
<strong>Cuit Empleado:</strong>
{{ $expediente->cuit_empleado }}
</div>
<div class="form-group">
<strong>Dni Empleado:</strong>
{{ $expediente->dni_empleado }}
</div>
<div class="form-group">
<strong>Estado:</strong>
{{ $expediente->estado }}
</div>
<div class="form-group">
<strong>Descripcion:</strong>
{{ $expediente->descripcion }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

