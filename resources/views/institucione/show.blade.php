@extends('tablar::page')

@section('title', __('Ver Instituciones'))

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">{{ __('Ver') }}</div>
                    <h2 class="page-title">{{ __('Institución') }}</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @can('instituciones.index')
                            <a href="{{ route('instituciones.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                {{ __('Lista de Instituciones') }}
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Detalles') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <strong>{{ __('Nombre') }}:</strong>
                                {{ $institucione->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('Ubicación') }}:</strong>
                                {{ $institucione->ubicacion }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('Descripción') }}:</strong>
                                {{ $institucione->descripcion }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('Estado') }}:</strong>
                                {{ $institucione->estado }}
                            </div>
                            <div class="form-group">
                                <strong>{{ __('Fecha de Creación') }}:</strong>
                                {{ $institucione->created_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


