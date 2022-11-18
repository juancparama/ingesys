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


    {{-- ======AVISO INCIDENCIAS PENDIENTES========== --}}
    
    @if (count($sinasignar)>0)

    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><strong>¡Atención!</strong></h3>
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
                                    <p style="display: inline">Tienes un total de </p>
                                    <h3 style="display: inline"><span class="badge bg-gray">{{count($sinasignar)}}</span></h3>
                                    <p  style="display: inline"> incidencias pendientes de asignar. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endif
    {{-- ======FIN AVISO INCIDENCIAS PENDIENTES========== --}}




    <section class="content">
    <div class="container-fluid">
    
    <div class="row">

        <div class="col-lg-4 col-12">
            <a href="{{route('admin.incidencias')}}">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{(count($averias)+count($evaluaciones))}}</h3>
                        <p>Total incidencias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <span class="small-box-footer">Información <i class="fas fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>


        <div class="col-lg-4 col-sm-6 col-12">
            <a href="{{route('admin.pendientes')}}">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($sinasignar)}}</h3>
                        <p>Pendientes de asignar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="small-box-footer">Ver incidencias <i class="fas fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-sm-6 col-12">
            <a href="{{route('admin.completadas')}}">
                <div class="small-box @if ($porcentaje>60) bg-success @else bg-danger @endif ">
                {{-- <div class="small-box"> --}}
                    <div class="inner">
                        <h3>{{$porcentaje}}<sup style="font-size: 20px">%</sup></h3>
                        <p>Porcentaje incidencias completadas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <span class="small-box-footer">Ver incidencias <i class="fas fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>



   
    </div>
    
    
    <div class="row">

        
    {{-- GRÁFICO BAR TIPO --}}
    
    <div class="card col-12 col-sm-6 col-lg-4">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i>Tipos de incidencias</h3>
        </div>
    
        <div class="card-body">
            <div class="chart">
                <canvas id="chartTipo" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    
    {{-- FIN GRÁFICO BAR --}}

    
    {{-- Gráfico WHEEL  --}}


    <div class="card col-12 col-sm-6 col-lg-4">
        <div class="card-header box">
            <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Porcentaje completadas</h3>
        </div>
    
        <div class="card-body">
            <div class="chart-container p-0" style="margin: 0 auto; height: 300px">
                    <canvas id="wheel" width="300" height="300"></canvas>
            </div>
        </div>
    </div>

    {{-- FIN Gráfico WHEEL  --}}

        
    {{-- GRÁFICO BAR TRIMESTRE --}}
    
    <div class="card col-12 col-lg-4">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-chart-bar mr-1"></i>Incidencias creadas por trimestre</h3>
        </div>
    
        <div class="card-body">
            <div class="chart-container p-0">
                    <canvas id="barChart" height="300" style="height: 300px;"></canvas>
            </div>
        </div>
    </div>
    
    {{-- FIN GRÁFICO BAR --}}


    
    </div>
    
    </div>
    </section>
    
    
    </div>


    <?php
    $t1 = [1,2,3];
    $t2 = [4,5,6];
    $t3 = [7,8,9];
    $t4 = [10,11,12];

    $incit1 = $incit2 = $incit3 = $incit4=0;
    $evast1 = $evast2 = $evast3 = $evast4=0;
    $i=0;

    foreach ($incidencias as $key => $value) {
        if ($value->type_id) {
            if (in_array ($value->created_at->format('m'), $t1)) {
                    ($value->type_id==1)?$incit1++:$evast1++;
            } elseif (in_array ($value->created_at->format('m'), $t2)) {
                // $incit2++;
                ($value->type_id==1)?$incit2++:$evast2++;
            } elseif (in_array ($value->created_at->format('m'), $t3)) {
                // $incit3++;
                ($value->type_id==1)?$incit3++:$evast3++;
            } else {
                // $incit4++;
                ($value->type_id==1)?$incit4++:$evast4++;
            }
        }
    }
    ?>
    

@stop

@section('css')
@stop

@section('js')
    <script defer src="{{url('/assets/js/chartjs.js')}}" data-t1="{{$incit1}}" data-t2="{{$incit2}}" data-t3="{{$incit3}}" data-t4="{{$incit4}}" data-t1b="{{$evast1}}" data-t2b="{{$evast2}}" data-t3b="{{$evast3}}" data-t4b="{{$evast4}}" data-cerradas="{{count($avSolved)+count($evaSolved)}}" data-pendientes="{{count($avPend)+count($evaPend)}}" data-averias="{{count($averias)}}" data-evaluaciones="{{count($evaluaciones)}}"></script>
    <script defer src="{{url('/assets/js/barchart.js')}}" data-av="{{count($averias)}}" data-ev="{{count($evaluaciones)}}"></script>
    {{-- <script defer src="{{url('/assets/js/barchart.js')}}" data-t1="{{$incit1}}" data-t2="{{$incit2}}" data-t3="{{$incit3}}" data-t4="{{$incit4}}" data-t1b="{{$evast1}}" data-t2b="{{$evast2}}" data-t3b="{{$evast3}}" data-t4b="{{$evast4}}"></script> --}}
@stop