@extends('adminlte::page')

@section('plugins.Chartjs', true)


@section('title', 'Inicio')

{{-- @section('content_header')
    <h3>Estadísticas</h3>
@stop --}}

@section('content')

<div class="wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bienvenido/a, {{Auth::user()->name}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{route('ticket.create')}}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                </svg>
                                <span class="text-sm ms-2 p-1">Crear nueva incidencia</span>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
    <div class="container-fluid">
    
    <div class="row">

        <div class="col-sm-6 col-12 px-2">
            <a href="{{route('ticket.completadas')}}">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count($avSolved)+count($evaSolved)}}</h3>
                    <p>Incidencias completadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <span class="small-box-footer">Ver incidencias completadas<i class="px-2 fas fa-arrow-circle-right"></i></span>
            </div>
            </a>
            <a href="{{route('ticket.misincidencias')}}">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{count($misincidencias)}}</h3>
                    <p>Mis incidencias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <span class="small-box-footer">Ver mis incidencias<i class="px-2 fas fa-arrow-circle-right"></i>
            </div>
            </a>
        </div>

        <div class="col-sm-6 col-12 px-2">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Tipos de incidencias</h3>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="chartTipo" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
    </div>
    </section>
    
    </div>

@stop

@section('css')
@stop

@section('js')
    <script defer src="{{url('/assets/js/barchart.js')}}" data-av="{{count($averias)}}" data-ev="{{count($evaluaciones)}}"></script>
@stop