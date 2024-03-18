@extends('tablar::page')

@section('title')
    Actividades
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Listado
                    </div>
                    <h2 class="page-title">
                        {{ __('Actividades ') }}
                    </h2>
                </div>
            </div>
        </div>


    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Expedientes</h3>

                            <div class="ms-auto text-muted">
    <form action="{{ route('actividades.index') }}" method="GET" class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="fecha_desde" class="visually-hidden">Fecha Desde</label>
            <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" placeholder="Fecha Desde" value="{{ old('fecha_desde', Session::get('fecha_desde')) }}">
        </div>
        <div class="col-auto">
            <label for="fecha_hasta" class="visually-hidden">Fecha Hasta</label>
            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" placeholder="Fecha Hasta" value="{{ old('fecha_hasta', Session::get('fecha_hasta')) }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
</div>


                        </div>
                        
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Ver
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="10" size="3"
                                               aria-label="Invoices count">
                                    </div>
                                    entradas
                                </div>
                                <div class="ms-auto text-muted">
                                    buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                           aria-label="Select all invoices"></th>
                                    <th class="w-1">No.
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <polyline points="6 15 12 9 18 15"/>
                                        </svg>
                                    </th>
                                    
										<th>Número Expediente</th>
										<th>Fecha Entrada</th>
										<th>Iniciador</th>
										<th>Delegación</th>
										<th>Sección</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($expedientes as $expediente)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select expediente"></td>
                                        <td>{{ ++$i }}</td>
                                        
											<td>{{ $expediente->numero_expediente }}</td>
											<td>{{ $expediente->fecha_entrada }}</td>
											<td>{{ $expediente->iniciador }}</td>
											<td>{{ $expediente->delegacione ? $expediente->delegacione->nombre : '' }}</td>
                                            <td>{{ $expediente->seccione ? $expediente->seccione->nombre : '' }}</td>

                                        
                                    </tr>
                                @empty
                                    <td>No hay datos</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                       <div class="card-footer d-flex align-items-center">
                            {!! $expedientes->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

