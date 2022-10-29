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
                    <h1>Listado de incidencias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <button type="button" class="d-flex justify-content-center align-items-center btn btn-primary btn-sm" onclick="window.location.href='{{route('admin.create')}}'">
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

    <?php 
    if (count($averias)+count($evaluaciones)) {
        $porcentaje = round((count($avSolved)+count($evaSolved))/(count($averias)+count($evaluaciones))*100);
    } else {
        $porcentaje=0;
    }
    ?>
    
    <section class="content">
    <div class="container-fluid">
    
    <div class="row">

        {{-- TEST --}}

        @if (count($sinasignar)>0)
            <div class="row col-12">
                <blockquote class="quote-info alert-dismissible col-12">
                    <button type="button" class="close" data-dismiss="quote-info" aria-hidden="true">&times;</button>
                    {{-- <span class="badge bg-purple">{{count($sinasignar)}}</span> --}}
                    <h5 id="tip">¡Atención!</h5>
                    <p><span class="badge bg-purple">{{count($sinasignar)}}</span> incidencias pendientes de asignar. </p>
                    <p>Tienes un total de <span class="badge bg-purple">{{count($sinasignar)}}</span> incidencias pendientes de asignar.</p>
                </blockquote>
            </div>
        @endif
        
        @if (count($sinasignar)>0)
            <div class="row col-12">
                <div class="alert alert-info alert-dismissible col-12">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> ¡Atención!</h5>
                    Tienes un total de {{count($sinasignar)}} incidencias pendientes de asignar..
                </div>
            </div>
        @endif

        {{-- TEST --}}



        <div class="col-sm-6 col-12">
            <a href="{{route('admin.pendientes')}}">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($sinasignar)}}</h3>
                        <p>Pendientes de asignar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <span class="small-box-footer">Ver incidencias <i class="fas fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-12">
            <a href="{{route('admin.completadas')}}">
                <div class="small-box @if ($porcentaje>60) bg-success @else bg-danger @endif ">
                {{-- <div class="small-box"> --}}
                    <div class="inner">
                        <h3>{{$porcentaje}}<sup style="font-size: 20px">%</sup></h3>
                        <p>Porcentaje incidencias completadas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <span class="small-box-footer">Ver incidencias <i class="fas fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-12">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{(count($averias)+count($evaluaciones))}}</h3>
                    <p>Total incidencias asignadas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admin.asignadas')}}" class="small-box-footer">Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{count($averias)}}</h3>
                    <p>Total averías</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    
        <div class="col-lg-4 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count($evaluaciones)}}</h3>
                    <p>Total evaluaciones</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    
    </div>
    
    
    <div class="row">


        {{-- https://masteringjs.io/tutorials/chartjs/size --}}
    
    {{-- GRÁFICO BAR --}}
    
    <div class="card col-12 col-lg-6">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i>Tipo de incidencias</h3>
        </div>
    
        <div class="card-body">
            <div class="chart-container p-0">
                    <canvas id="chTipo" height="300" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
    
    {{-- FIN GRÁFICO SALES --}}

    
    {{-- Gráfico WHEEL  --}}


    <div class="card col-12 col-lg-6">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Porcentaje completadas</h3>
        </div>
    
        <div class="card-body">
            <div class="chart-container p-0" style="width:200px;height:200px;">
                    {{-- <canvas id="wheel" width="400" height="400"></canvas> --}}
                    <canvas id="wheel"></canvas>
            </div>
        </div>
    </div>

    {{-- FIN Gráfico test  --}}


    <div class="col-12 col-lg-8">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{count($sinasignar)}}</h3>
                <p>Pendientes de asignar</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.pendientes')}}" class="small-box-footer">Ver incidencias <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>



    {{-- ============= --}}
    

    
    </div>
    
    </div>
    </section>
    
    
    </div>


    {{-- ================== --}}



    <div class="wrapper">

        
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
        
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Area Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                </div>
            </div>
        </div>
        
        
        <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Donut Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        </div>
        
        </div>
        
        
        <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Pie Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        </div>
        
        </div>
        
        </div>
        
        <div class="col-md-4">
        
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Line Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        </div>
        </div>
        
        </div>
        
        
        <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Bar Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        </div>
        </div>
        
        </div>
        
        
        <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Stacked Bar Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        {{-- <canvas id="chPercent" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        </div>
        </div>
        
        </div>
        
        </div>
        
        </div>
        
        </div>
        </section>
        
        {{-- </div> --}}
        
        
        </div>



    {{-- ================== --}}
    

@stop

@section('css')
@stop

@section('js')
    <script defer src="{{url('/assets/js/chartjs.js')}}" data-cerradas="{{count($avSolved)+count($evaSolved)}}" data-pendientes="{{count($avPend)+count($evaPend)}}" data-averias="{{count($averias)}}" data-evaluaciones="{{count($evaluaciones)}}"></script>
@stop